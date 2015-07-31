<?php 
namespace TYPO3\Flow\Security\Authorization;

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
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Security\Authorization\Privilege\PrivilegeInterface;
use TYPO3\Flow\Security\Context;
use TYPO3\Flow\Security\Policy\Role;

/**
 * An access decision voter manager
 *
 * @Flow\Scope("singleton")
 */
class PrivilegeManager_Original implements PrivilegeManagerInterface {

	/**
	 * @var ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @var Context
	 */
	protected $securityContext;

	/**
	 * If set to TRUE access will be granted for objects where all voters abstain from decision.
	 *
	 * @Flow\InjectConfiguration("security.authorization.allowAccessIfAllVotersAbstain")
	 * @var boolean
	 */
	protected $allowAccessIfAllAbstain = FALSE;

	/**
	 * @param ObjectManagerInterface $objectManager The object manager
	 * @param Context $securityContext The current security context
	 */
	public function __construct(ObjectManagerInterface $objectManager, Context $securityContext) {
		$this->objectManager = $objectManager;
		$this->securityContext = $securityContext;
	}

	/**
	 * Returns TRUE, if the given privilege type is granted for the given subject based
	 * on the current security context.
	 *
	 * @param string $privilegeType The type of privilege that should be evaluated
	 * @param mixed $subject The subject to check privileges for
	 * @param string $reason This variable will be filled by a message giving information about the reasons for the result of this method
	 * @return boolean
	 */
	public function isGranted($privilegeType, $subject, &$reason = '') {
		return $this->isGrantedForRoles($this->securityContext->getRoles(), $privilegeType, $subject, $reason);
	}

	/**
	 * Returns TRUE, if the given privilege type would be granted for the given roles and subject
	 *
	 * @param array<Role> $roles The roles that should be evaluated
	 * @param string $privilegeType The type of privilege that should be evaluated
	 * @param mixed $subject The subject to check privileges for
	 * @param string $reason This variable will be filled by a message giving information about the reasons for the result of this method
	 * @return boolean
	 */
	public function isGrantedForRoles(array $roles, $privilegeType, $subject, &$reason = '') {
		$effectivePrivilegeIdentifiersWithPermission = array();
		$accessGrants = 0;
		$accessDenies = 0;
		$accessAbstains = 0;
		/** @var Role $role */
		foreach ($roles as $role) {
			/** @var PrivilegeInterface[] $availablePrivileges */
			$availablePrivileges = $role->getPrivilegesByType($privilegeType);
			/** @var PrivilegeInterface[] $effectivePrivileges */
			$effectivePrivileges = array();
			foreach ($availablePrivileges as $privilege) {
				if ($privilege->matchesSubject($subject)) {
					$effectivePrivileges[] = $privilege;
				}
			}

			foreach ($effectivePrivileges as $effectivePrivilege) {
				$privilegeName = $effectivePrivilege->getPrivilegeTargetIdentifier();
				$parameterStrings = array();
				foreach ($effectivePrivilege->getParameters() as $parameter) {
					$parameterStrings[] = sprintf('%s: "%s"', $parameter->getName(), $parameter->getValue());
				}
				if ($parameterStrings !== array()) {
					$privilegeName .= ' (with parameters: ' . implode(', ', $parameterStrings) . ')';
				}

				$effectivePrivilegeIdentifiersWithPermission[] = sprintf('"%s": %s', $privilegeName, strtoupper($effectivePrivilege->getPermission()));
				if ($effectivePrivilege->isGranted()) {
					$accessGrants ++;
				} elseif ($effectivePrivilege->isDenied()) {
					$accessDenies ++;
				} else {
					$accessAbstains ++;
				}
			}
		}

		if (count($effectivePrivilegeIdentifiersWithPermission) === 0) {
			$reason = sprintf('No privilege of type "%s" matched.', $privilegeType);
			return TRUE;
		} else {
			$reason = sprintf('Evaluated following %d privilege target(s):' . chr(10) . '%s' . chr(10) . '(%d granted, %d denied, %d abstained)', count($effectivePrivilegeIdentifiersWithPermission), implode(chr(10), $effectivePrivilegeIdentifiersWithPermission), $accessGrants, $accessDenies, $accessAbstains);
		}
		if ($accessDenies > 0) {
			return FALSE;
		}
		if ($accessGrants > 0) {
			return TRUE;
		}

		return FALSE;
	}

	/**
	 * Returns TRUE if access is granted on the given privilege target in the current security context
	 *
	 * @param string $privilegeTargetIdentifier The identifier of the privilege target to decide on
	 * @param array $privilegeParameters Optional array of privilege parameters (simple key => value array)
	 * @return boolean TRUE if access is granted, FALSE otherwise
	 */
	public function isPrivilegeTargetGranted($privilegeTargetIdentifier, array $privilegeParameters = array()) {
		return $this->isPrivilegeTargetGrantedForRoles($this->securityContext->getRoles(), $privilegeTargetIdentifier, $privilegeParameters);
	}

	/**
	 * Returns TRUE if access is granted on the given privilege target in the current security context
	 *
	 * @param array<Role> $roles The roles that should be evaluated
	 * @param string $privilegeTargetIdentifier The identifier of the privilege target to decide on
	 * @param array $privilegeParameters Optional array of privilege parameters (simple key => value array)
	 * @return boolean TRUE if access is granted, FALSE otherwise
	 */
	public function isPrivilegeTargetGrantedForRoles(array $roles, $privilegeTargetIdentifier, array $privilegeParameters = array()) {
		$privilegeFound = FALSE;
		$accessGrants = 0;
		$accessDenies = 0;
		/** @var Role $role */
		foreach ($roles as $role) {
			$privilege = $role->getPrivilegeForTarget($privilegeTargetIdentifier, $privilegeParameters);
			if ($privilege === NULL) {
				continue;
			}

			$privilegeFound = TRUE;

			if ($privilege->isGranted()) {
				$accessGrants++;
			} elseif ($privilege->isDenied()) {
				$accessDenies++;
			}
		}

		if ($accessDenies === 0 && $accessGrants > 0) {
			return TRUE;
		}

		if ($accessDenies === 0 && $accessGrants === 0 && $privilegeFound === TRUE && $this->allowAccessIfAllAbstain === TRUE) {
			return TRUE;
		}

		return FALSE;
	}
}
namespace TYPO3\Flow\Security\Authorization;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * An access decision voter manager
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class PrivilegeManager extends PrivilegeManager_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {

	private $Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array();

	private $Flow_Aop_Proxy_groupedAdviceChains = array();

	private $Flow_Aop_Proxy_methodIsInAdviceMode = array();


	/**
	 * Autogenerated Proxy Method
	 * @param ObjectManagerInterface $objectManager The object manager
	 * @param Context $securityContext The current security context
	 */
	public function __construct() {
		$arguments = func_get_args();

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\PrivilegeManager') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\PrivilegeManager', $this);
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\PrivilegeManager') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\PrivilegeManagerInterface', $this);

		if (!array_key_exists(0, $arguments)) $arguments[0] = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface');
		if (!array_key_exists(1, $arguments)) $arguments[1] = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Context');
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $objectManager in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
		if (!array_key_exists(1, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $securityContext in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
		call_user_func_array('parent::__construct', $arguments);
		if ('TYPO3\Flow\Security\Authorization\PrivilegeManager' === get_class($this)) {
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
			'isPrivilegeTargetGranted' => array(
				'TYPO3\Flow\Aop\Advice\AfterAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterAdvice('TYPO3\Flow\Security\Aspect\LoggingAspect', 'logPrivilegeAccessDecisions', $objectManager, NULL),
				),
			),
		);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\PrivilegeManager') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\PrivilegeManager', $this);
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\PrivilegeManager') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\PrivilegeManagerInterface', $this);

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
	 * @param string $privilegeTargetIdentifier The identifier of the privilege target to decide on
	 * @param array $privilegeParameters Optional array of privilege parameters (simple key => value array)
	 * @return boolean TRUE if access is granted, FALSE otherwise
	 */
	 public function isPrivilegeTargetGranted($privilegeTargetIdentifier, array $privilegeParameters = array()) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['isPrivilegeTargetGranted'])) {
		$result = parent::isPrivilegeTargetGranted($privilegeTargetIdentifier, $privilegeParameters);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['isPrivilegeTargetGranted'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['privilegeTargetIdentifier'] = $privilegeTargetIdentifier;
				$methodArguments['privilegeParameters'] = $privilegeParameters;
			
		$result = NULL;
		$afterAdviceInvoked = FALSE;
		try {

				$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Security\Authorization\PrivilegeManager', 'isPrivilegeTargetGranted', $methodArguments);
				$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
				$methodArguments = $joinPoint->getMethodArguments();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['isPrivilegeTargetGranted']['TYPO3\Flow\Aop\Advice\AfterAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['isPrivilegeTargetGranted']['TYPO3\Flow\Aop\Advice\AfterAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Security\Authorization\PrivilegeManager', 'isPrivilegeTargetGranted', $methodArguments, NULL, $result);
					$afterAdviceInvoked = TRUE;
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

			} catch (\Exception $exception) {

				if (!$afterAdviceInvoked && isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['isPrivilegeTargetGranted']['TYPO3\Flow\Aop\Advice\AfterAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['isPrivilegeTargetGranted']['TYPO3\Flow\Aop\Advice\AfterAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Security\Authorization\PrivilegeManager', 'isPrivilegeTargetGranted', $methodArguments, NULL, NULL, $exception);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}
				}

				throw $exception;
		}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['isPrivilegeTargetGranted']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['isPrivilegeTargetGranted']);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Security\Authorization\PrivilegeManager');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Security\Authorization\PrivilegeManager', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Security\Authorization\PrivilegeManager', $propertyName, 'var');
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
		$this->allowAccessIfAllAbstain = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager')->getConfiguration('Settings', 'TYPO3.Flow.security.authorization.allowAccessIfAllVotersAbstain');
$this->Flow_Injected_Properties = array (
  0 => 'allowAccessIfAllAbstain',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Security/Authorization/PrivilegeManager.php
#