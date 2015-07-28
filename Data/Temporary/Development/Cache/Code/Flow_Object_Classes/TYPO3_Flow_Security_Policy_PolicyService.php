<?php 
namespace TYPO3\Flow\Security\Policy;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Configuration\ConfigurationManager;
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Security\Authorization\Privilege\Parameter\PrivilegeParameterDefinition;
use TYPO3\Flow\Security\Authorization\Privilege\PrivilegeTarget;
use TYPO3\Flow\Security\Exception\NoSuchRoleException;
use TYPO3\Flow\Security\Exception as SecurityException;
use TYPO3\Flow\Security\Authorization\Privilege\PrivilegeInterface;

/**
 * The policy service reads the policy configuration. The security advice asks
 * this service which methods have to be intercepted by a security interceptor.
 *
 * The access decision voters get the roles and privileges configured (in the
 * security policy) for a specific method invocation from this service.
 *
 * @Flow\Scope("singleton")
 */
class PolicyService_Original {

	/**
	 * @var boolean
	 */
	protected $initialized = FALSE;

	/**
	 * @var ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @var array
	 */
	protected $policyConfiguration;

	/**
	 * @var PrivilegeTarget[]
	 */
	protected $privilegeTargets = array();

	/**
	 * @var Role[]
	 */
	protected $roles = array();

	/**
	 * @var ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * This object is created very early so we can't rely on AOP for the property injection
	 *
	 * @param ConfigurationManager $configurationManager The configuration manager
	 * @return void
	 */
	public function injectConfigurationManager(ConfigurationManager $configurationManager) {
		$this->configurationManager = $configurationManager;
	}

	/**
	 * This object is created very early so we can't rely on AOP for the property injection
	 *
	 * @param ObjectManagerInterface $objectManager
	 * @return void
	 */
	public function injectObjectManager(ObjectManagerInterface $objectManager) {
		$this->objectManager = $objectManager;
	}

	/**
	 * Parses the global policy configuration and initializes roles and privileges accordingly
	 *
	 * @return void
	 * @throws SecurityException
	 */
	protected function initialize() {
		if ($this->initialized) {
			return;
		}

		$this->policyConfiguration = $this->configurationManager->getConfiguration(ConfigurationManager::CONFIGURATION_TYPE_POLICY);
		$this->emitConfigurationLoaded($this->policyConfiguration);

		$this->initializePrivilegeTargets();

		$privilegeTargetsForEverybody = $this->privilegeTargets;

		$this->roles = array();
		$everybodyRole = new Role('TYPO3.Flow:Everybody');
		$everybodyRole->setAbstract(TRUE);
		if (isset($this->policyConfiguration['roles'])) {
			foreach ($this->policyConfiguration['roles'] as $roleIdentifier => $roleConfiguration) {

				if ($roleIdentifier === 'TYPO3.Flow:Everybody') {
					$role = $everybodyRole;
				} else {
					$role = new Role($roleIdentifier);
					if (isset($roleConfiguration['abstract'])) {
						$role->setAbstract((boolean)$roleConfiguration['abstract']);
					}
				}

				if (isset($roleConfiguration['privileges'])) {
					foreach ($roleConfiguration['privileges'] as $privilegeConfiguration) {
						$privilegeTargetIdentifier = $privilegeConfiguration['privilegeTarget'];
						if (!isset($this->privilegeTargets[$privilegeTargetIdentifier])) {
							throw new SecurityException(sprintf('privilege target "%s", referenced in role configuration "%s" is not defined!', $privilegeTargetIdentifier, $roleIdentifier), 1395869320);
						}
						$privilegeTarget = $this->privilegeTargets[$privilegeTargetIdentifier];
						if (!isset($privilegeConfiguration['permission'])) {
							throw new SecurityException(sprintf('No permission set for privilegeTarget "%s" in Role "%s"', $privilegeTargetIdentifier, $roleIdentifier), 1395869331);
						}
						$privilegeParameters = isset($privilegeConfiguration['parameters']) ? $privilegeConfiguration['parameters'] : array();
						try {
							$privilege = $privilegeTarget->createPrivilege($privilegeConfiguration['permission'], $privilegeParameters);
						} catch (\Exception $exception) {
							throw new SecurityException(sprintf('Error for privilegeTarget "%s" in Role "%s": %s', $privilegeTargetIdentifier, $roleIdentifier, $exception->getMessage()), 1401886654, $exception);
						}
						$role->addPrivilege($privilege);

						if ($roleIdentifier === 'TYPO3.Flow:Everybody') {
							unset($privilegeTargetsForEverybody[$privilegeTargetIdentifier]);
						}
					}
				}

				$this->roles[$roleIdentifier] = $role;
			}
		}

		// create ABSTAIN privilege for all uncovered privilegeTargets
		/** @var PrivilegeTarget $privilegeTarget */
		foreach ($privilegeTargetsForEverybody as $privilegeTarget) {
			if ($privilegeTarget->hasParameters()) {
				continue;
			}
			$everybodyRole->addPrivilege($privilegeTarget->createPrivilege(PrivilegeInterface::ABSTAIN));
		}
		$this->roles['TYPO3.Flow:Everybody'] = $everybodyRole;

		// Set parent roles
		/** @var Role $role */
		foreach ($this->roles as $role) {
			if (isset($this->policyConfiguration['roles'][$role->getIdentifier()]['parentRoles'])) {
				foreach ($this->policyConfiguration['roles'][$role->getIdentifier()]['parentRoles'] as $parentRoleIdentifier) {
					$role->addParentRole($this->roles[$parentRoleIdentifier]);
				}
			}
		}

		$this->emitRolesInitialized($this->roles);

		$this->initialized = TRUE;
	}

	/**
	 * Initialized all configured privilege targets from the policy definitions
	 *
	 * @return void
	 * @throws SecurityException
	 */
	protected function initializePrivilegeTargets() {
		if (!isset($this->policyConfiguration['privilegeTargets'])) {
			return;
		}
		foreach ($this->policyConfiguration['privilegeTargets'] as $privilegeClassName => $privilegeTargetsConfiguration) {
			foreach ($privilegeTargetsConfiguration as $privilegeTargetIdentifier => $privilegeTargetConfiguration) {
				if (!isset($privilegeTargetConfiguration['matcher'])) {
					throw new SecurityException(sprintf('No "matcher" configured for privilegeTarget "%s"', $privilegeTargetIdentifier), 1401795388);
				}
				$parameterDefinitions = array();
				$privilegeParameterConfiguration = isset($privilegeTargetConfiguration['parameters']) ? $privilegeTargetConfiguration['parameters'] : array();
				foreach ($privilegeParameterConfiguration as $parameterName => $parameterValue) {
					if (!isset($privilegeTargetConfiguration['parameters'][$parameterName])) {
						throw new SecurityException(sprintf('No parameter definition found for parameter "%s" in privilegeTarget "%s"', $parameterName, $privilegeTargetIdentifier), 1395869330);
					}
					if (!isset($privilegeTargetConfiguration['parameters'][$parameterName]['className'])) {
						throw new SecurityException(sprintf('No "className" defined for parameter "%s" in privilegeTarget "%s"', $parameterName, $privilegeTargetIdentifier), 1396021782);
					}
					$parameterDefinitions[$parameterName] = new PrivilegeParameterDefinition($parameterName, $privilegeTargetConfiguration['parameters'][$parameterName]['className']);
				}
				$privilegeTarget = new PrivilegeTarget($privilegeTargetIdentifier, $privilegeClassName, $privilegeTargetConfiguration['matcher'], $parameterDefinitions);
				$privilegeTarget->injectObjectManager($this->objectManager);
				$this->privilegeTargets[$privilegeTargetIdentifier] = $privilegeTarget;
			}
		}
	}

	/**
	 * Checks if a role exists
	 *
	 * @param string $roleIdentifier The role identifier, format: (<PackageKey>:)<Role>
	 * @return boolean
	 */
	public function hasRole($roleIdentifier) {
		$this->initialize();
		return isset($this->roles[$roleIdentifier]);
	}

	/**
	 * Returns a Role object configured in the PolicyService
	 *
	 * @param string $roleIdentifier The role identifier of the role, format: (<PackageKey>:)<Role>
	 * @return Role
	 * @throws NoSuchRoleException
	 */
	public function getRole($roleIdentifier) {
		if ($this->hasRole($roleIdentifier)) {
			return $this->roles[$roleIdentifier];
		}
		throw new NoSuchRoleException();
	}

	/**
	 * Returns an array of all configured roles
	 *
	 * @param boolean $includeAbstract If TRUE the result includes abstract roles, otherwise those will be skipped
	 * @return Role[] Array of all configured roles, indexed by role identifier
	 */
	public function getRoles($includeAbstract = FALSE) {
		$this->initialize();
		if (!$includeAbstract) {
			return array_filter($this->roles, function (Role $role) {
				return $role->isAbstract() !== TRUE;
			});
		}
		return $this->roles;
	}

	/**
	 * Returns all privileges of the given type
	 *
	 * @param string $type Full qualified class or interface name
	 * @return array
	 */
	public function getAllPrivilegesByType($type) {
		$this->initialize();
		$privileges = array();
		foreach ($this->roles as $role) {
			$privileges = array_merge($privileges, $role->getPrivilegesByType($type));
		}
		return $privileges;
	}

	/**
	 * Returns all configured privilege targets
	 *
	 * @return PrivilegeTarget[]
	 */
	public function getPrivilegeTargets() {
		$this->initialize();
		return $this->privilegeTargets;
	}

	/**
	 * Returns the privilege target identified by the given string
	 *
	 * @param string $privilegeTargetIdentifier Identifier of a privilege target
	 * @return PrivilegeTarget
	 */
	public function getPrivilegeTargetByIdentifier($privilegeTargetIdentifier) {
		$this->initialize();
		return isset($this->privilegeTargets[$privilegeTargetIdentifier]) ? $this->privilegeTargets[$privilegeTargetIdentifier] : NULL;
	}

	/**
	 * Resets the PolicyService to behave transparently during
	 * functional testing.
	 *
	 * @return void
	 */
	public function reset() {
		$this->initialized = FALSE;
		$this->roles = array();
	}

	/**
	 * Emits a signal when the policy configuration has been loaded
	 *
	 * This signal can be used to add roles and/or privilegeTargets during runtime. In the slot make sure to receive the
	 * $policyConfiguration array by reference so you can alter it.
	 *
	 * @param array $policyConfiguration The policy configuration
	 * @return void
	 * @Flow\Signal
	 */
	protected function emitConfigurationLoaded(array &$policyConfiguration) {}

	/**
	 * Emits a signal when roles have been initialized
	 *
	 * This signal can be used to register roles during runtime. In the slot make sure to receive the $roles array by
	 * reference so you can alter it.
	 *
	 * @param array<Role> $roles All initialized roles (even abstract roles)
	 * @return void
	 * @Flow\Signal
	 */
	protected function emitRolesInitialized(array &$roles) {}
}
namespace TYPO3\Flow\Security\Policy;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * The policy service reads the policy configuration. The security advice asks
 * this service which methods have to be intercepted by a security interceptor.
 * 
 * The access decision voters get the roles and privileges configured (in the
 * security policy) for a specific method invocation from this service.
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class PolicyService extends PolicyService_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {

	private $Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array();

	private $Flow_Aop_Proxy_groupedAdviceChains = array();

	private $Flow_Aop_Proxy_methodIsInAdviceMode = array();


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
		if (get_class($this) === 'TYPO3\Flow\Security\Policy\PolicyService') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Policy\PolicyService', $this);
		if ('TYPO3\Flow\Security\Policy\PolicyService' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 protected function Flow_Aop_Proxy_buildMethodsAndAdvicesArray() {
		if (method_exists(get_parent_class($this), 'Flow_Aop_Proxy_buildMethodsAndAdvicesArray') && is_callable('parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray')) parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

		$objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager;
		$this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array(
			'emitConfigurationLoaded' => array(
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\SignalSlot\SignalAspect', 'forwardSignalToDispatcher', $objectManager, NULL),
				),
			),
			'emitRolesInitialized' => array(
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\SignalSlot\SignalAspect', 'forwardSignalToDispatcher', $objectManager, NULL),
				),
			),
		);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
		if (get_class($this) === 'TYPO3\Flow\Security\Policy\PolicyService') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Policy\PolicyService', $this);

	if (property_exists($this, 'Flow_Persistence_RelatedEntities') && is_array($this->Flow_Persistence_RelatedEntities)) {
		$persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		foreach ($this->Flow_Persistence_RelatedEntities as $entityInformation) {
			if($entityInformation['entityType'] === 'TYPO3\Flow\Resource\ResourcePointer') continue;
			$entity = $persistenceManager->getObjectByIdentifier($entityInformation['identifier'], $entityInformation['entityType'], TRUE);
			if (isset($entityInformation['entityPath'])) {
				$this->$entityInformation['propertyName'] = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$entityInformation['propertyName'], $entityInformation['entityPath'], $entity);
			} else {
				$this->$entityInformation['propertyName'] = $entity;
			}
		}
		unset($this->Flow_Persistence_RelatedEntities);
	}
				$this->Flow_Proxy_injectProperties();
		$result = NULL;
		if (method_exists(get_parent_class($this), '__wakeup') && is_callable('parent::__wakeup')) parent::__wakeup();
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies() {
		if (!isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices) || empty($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices)) {
			$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
			if (is_callable('parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies')) parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixInjectedPropertiesForDoctrineProxies() {
		if (!$this instanceof \Doctrine\ORM\Proxy\Proxy || isset($this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies)) {
			return;
		}
		$this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies = TRUE;
		if (is_callable(array($this, 'Flow_Proxy_injectProperties'))) {
			$this->Flow_Proxy_injectProperties();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Aop_Proxy_getAdviceChains($methodName) {
		$adviceChains = array();
		if (isset($this->Flow_Aop_Proxy_groupedAdviceChains[$methodName])) {
			$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
		} else {
			if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName])) {
				$groupedAdvices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName];
				if (isset($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice'])) {
					$this->Flow_Aop_Proxy_groupedAdviceChains[$methodName]['TYPO3\Flow\Aop\Advice\AroundAdvice'] = new \TYPO3\Flow\Aop\Advice\AdviceChain($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice']);
					$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
				}
			}
		}
		return $adviceChains;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_invokeJoinPoint(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint) {
		if (__CLASS__ !== $joinPoint->getClassName()) return parent::Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode[$joinPoint->getMethodName()])) {
			return call_user_func_array(array('self', $joinPoint->getMethodName()), $joinPoint->getMethodArguments());
		}
	}

	/**
	 * Autogenerated Proxy Method
	 * @param array $policyConfiguration The policy configuration
	 * @return void
	 * @\TYPO3\Flow\Annotations\Signal
	 */
	 protected function emitConfigurationLoaded(array &$policyConfiguration) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitConfigurationLoaded'])) {
		$result = parent::emitConfigurationLoaded($policyConfiguration);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['emitConfigurationLoaded'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['policyConfiguration'] = &$policyConfiguration;
			
				$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Security\Policy\PolicyService', 'emitConfigurationLoaded', $methodArguments);
				$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
				$methodArguments = $joinPoint->getMethodArguments();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitConfigurationLoaded']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitConfigurationLoaded']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Security\Policy\PolicyService', 'emitConfigurationLoaded', $methodArguments, NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitConfigurationLoaded']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitConfigurationLoaded']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 * @param array<Role> $roles All initialized roles (even abstract roles)
	 * @return void
	 * @\TYPO3\Flow\Annotations\Signal
	 */
	 protected function emitRolesInitialized(array &$roles) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitRolesInitialized'])) {
		$result = parent::emitRolesInitialized($roles);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['emitRolesInitialized'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['roles'] = &$roles;
			
				$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Security\Policy\PolicyService', 'emitRolesInitialized', $methodArguments);
				$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
				$methodArguments = $joinPoint->getMethodArguments();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitRolesInitialized']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitRolesInitialized']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Security\Policy\PolicyService', 'emitRolesInitialized', $methodArguments, NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitRolesInitialized']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitRolesInitialized']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Security\Policy\PolicyService');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Security\Policy\PolicyService', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
		if (is_array($this->$propertyName) || (is_object($this->$propertyName) && ($this->$propertyName instanceof \ArrayObject || $this->$propertyName instanceof \SplObjectStorage ||$this->$propertyName instanceof \Doctrine\Common\Collections\Collection))) {
			if (count($this->$propertyName) > 0) {
				foreach ($this->$propertyName as $key => $value) {
					$this->searchForEntitiesAndStoreIdentifierArray((string)$key, $value, $propertyName);
				}
			}
		}
		if (is_object($this->$propertyName) && !$this->$propertyName instanceof \Doctrine\Common\Collections\Collection) {
			if ($this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($this->$propertyName);
			} else {
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Security\Policy\PolicyService', $propertyName, 'var');
				if (count($varTagValues) > 0) {
					$className = trim($varTagValues[0], '\\');
				}
				if (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->isRegistered($className) === FALSE) {
					$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($this->$propertyName));
				}
			}
			if ($this->$propertyName instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($this->$propertyName) || $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
				if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
					$this->Flow_Persistence_RelatedEntities = array();
					$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
				}
				$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($this->$propertyName);
				if (!$identifier && $this->$propertyName instanceof \Doctrine\ORM\Proxy\Proxy) {
					$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($this->$propertyName, '_identifier', TRUE));
				}
				$this->Flow_Persistence_RelatedEntities[$propertyName] = array(
					'propertyName' => $propertyName,
					'entityType' => $className,
					'identifier' => $identifier
				);
				continue;
			}
			if ($className !== FALSE && (\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getScope($className) === \TYPO3\Flow\Object\Configuration\Configuration::SCOPE_SINGLETON || $className === 'TYPO3\Flow\Object\DependencyInjection\DependencyProxy')) {
				continue;
			}
		}
		$this->Flow_Object_PropertiesToSerialize[] = $propertyName;
	}
	$result = $this->Flow_Object_PropertiesToSerialize;
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function searchForEntitiesAndStoreIdentifierArray($path, $propertyValue, $originalPropertyName) {

		if (is_array($propertyValue) || (is_object($propertyValue) && ($propertyValue instanceof \ArrayObject || $propertyValue instanceof \SplObjectStorage))) {
			foreach ($propertyValue as $key => $value) {
				$this->searchForEntitiesAndStoreIdentifierArray($path . '.' . $key, $value, $originalPropertyName);
			}
		} elseif ($propertyValue instanceof \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface && !\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->isNewObject($propertyValue) || $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
			if (!property_exists($this, 'Flow_Persistence_RelatedEntities') || !is_array($this->Flow_Persistence_RelatedEntities)) {
				$this->Flow_Persistence_RelatedEntities = array();
				$this->Flow_Object_PropertiesToSerialize[] = 'Flow_Persistence_RelatedEntities';
			}
			if ($propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$className = get_parent_class($propertyValue);
			} else {
				$className = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getObjectNameByClassName(get_class($propertyValue));
			}
			$identifier = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface')->getIdentifierByObject($propertyValue);
			if (!$identifier && $propertyValue instanceof \Doctrine\ORM\Proxy\Proxy) {
				$identifier = current(\TYPO3\Flow\Reflection\ObjectAccess::getProperty($propertyValue, '_identifier', TRUE));
			}
			$this->Flow_Persistence_RelatedEntities[$originalPropertyName . '.' . $path] = array(
				'propertyName' => $originalPropertyName,
				'entityType' => $className,
				'identifier' => $identifier,
				'entityPath' => $path
			);
			$this->$originalPropertyName = \TYPO3\Flow\Utility\Arrays::setValueByPath($this->$originalPropertyName, $path, NULL);
		}
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Proxy_injectProperties() {
		$this->injectConfigurationManager(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager'));
		$this->injectObjectManager(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'));
$this->Flow_Injected_Properties = array (
  0 => 'configurationManager',
  1 => 'objectManager',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Security/Policy/PolicyService.php
#