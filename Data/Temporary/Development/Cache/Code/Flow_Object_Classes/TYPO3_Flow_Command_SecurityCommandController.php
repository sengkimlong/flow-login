<?php 
namespace TYPO3\Flow\Command;

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
use TYPO3\Flow\Cache\CacheManager;
use TYPO3\Flow\Cache\Frontend\VariableFrontend;
use TYPO3\Flow\Cli\CommandController;
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Reflection\ReflectionService;
use TYPO3\Flow\Security\Cryptography\RsaWalletServicePhp;
use TYPO3\Flow\Security\Exception\NoSuchRoleException;
use TYPO3\Flow\Security\Policy\PolicyService;
use TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegeInterface;
use TYPO3\Flow\Security\Authorization\Privilege\PrivilegeInterface;
use TYPO3\Flow\Security\Policy\Role;
use TYPO3\Flow\Utility\Arrays;

/**
 * Command controller for tasks related to security
 *
 * @Flow\Scope("singleton")
 */
class SecurityCommandController_Original extends CommandController {

	/**
	 * @Flow\Inject
	 * @var ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @Flow\Inject
	 * @var ReflectionService
	 */
	protected $reflectionService;

	/**
	 * @Flow\Inject
	 * @var RsaWalletServicePhp
	 */
	protected $rsaWalletService;

	/**
	 * @Flow\Inject
	 * @var PolicyService
	 */
	protected $policyService;

	/**
	 * @var VariableFrontend
	 */
	protected $methodPermissionCache;

	/**
	 * Injects the Cache Manager because we cannot inject an automatically factored cache during compile time.
	 *
	 * @param CacheManager $cacheManager
	 * @return void
	 */
	public function injectCacheManager(CacheManager $cacheManager) {
		$this->methodPermissionCache = $cacheManager->getCache('Flow_Security_Authorization_Privilege_Method');
	}

	/**
	 * Import a public key
	 *
	 * Read a PEM formatted public key from stdin and import it into the
	 * RSAWalletService.
	 *
	 * @return void
	 * @see typo3.flow:security:importprivatekey
	 */
	public function importPublicKeyCommand() {
		$keyData = '';
		// no file_get_contents here because it does not work on php://stdin
		$fp = fopen('php://stdin', 'rb');
		while (!feof($fp)) {
			$keyData .= fgets($fp, 4096);
		}
		fclose($fp);

		$uuid = $this->rsaWalletService->registerPublicKeyFromString($keyData);

		$this->outputLine('The public key has been successfully imported. Use the following uuid to refer to it in the RSAWalletService: ' . PHP_EOL . PHP_EOL . $uuid . PHP_EOL);
	}

	/**
	 * Import a private key
	 *
	 * Read a PEM formatted private key from stdin and import it into the
	 * RSAWalletService. The public key will be automatically extracted and stored
	 * together with the private key as a key pair.
	 *
	 * @param boolean $usedForPasswords If the private key should be used for passwords
	 * @return void
	 * @see typo3.flow:security:importpublickey
	 */
	public function importPrivateKeyCommand($usedForPasswords = FALSE) {
		$keyData = '';
		// no file_get_contents here because it does not work on php://stdin
		$fp = fopen('php://stdin', 'rb');
		while (!feof($fp)) {
			$keyData .= fgets($fp, 4096);
		}
		fclose($fp);

		$uuid = $this->rsaWalletService->registerKeyPairFromPrivateKeyString($keyData, $usedForPasswords);

		$this->outputLine('The keypair has been successfully imported. Use the following uuid to refer to it in the RSAWalletService: ' . PHP_EOL . PHP_EOL . $uuid . PHP_EOL);
	}

	/**
	 * Shows a list of all defined privilege targets and the effective permissions
	 *
	 * @param string $privilegeType The privilege type ("entity", "method" or the FQN of a class implementing PrivilegeInterface)
	 * @param string $roles A comma separated list of role identifiers. Shows policy for an unauthenticated user when left empty.
	 */
	public function showEffectivePolicyCommand($privilegeType, $roles = '') {
		$systemRoleIdentifiers = array('TYPO3.Flow:Everybody', 'TYPO3.Flow:Anonymous', 'TYPO3.Flow:AuthenticatedUser');

		if(strpos($privilegeType, '\\') === FALSE) {
			$privilegeType = sprintf('\TYPO3\Flow\Security\Authorization\Privilege\%s\%sPrivilegeInterface', ucfirst($privilegeType), ucfirst($privilegeType));
		}
		if(!class_exists($privilegeType) && !interface_exists($privilegeType)) {
			$this->outputLine('The privilege type "%s" was not defined.', array($privilegeType));
			$this->quit(1);
		}
		if (!is_subclass_of($privilegeType, PrivilegeInterface::class)) {
			$this->outputLine('"%s" does not refer to a valid Privilege', array($privilegeType));
			$this->quit(1);
		}

		$requestedRoles = array();
		foreach (Arrays::trimExplode(',', $roles) as $roleIdentifier) {
			try {
				if(in_array($roleIdentifier, $systemRoleIdentifiers)) {
					continue;
				}
				$currentRole = $this->policyService->getRole($roleIdentifier);
				$requestedRoles[$roleIdentifier] = $currentRole;
				foreach ($currentRole->getAllParentRoles() as $currentParentRole) {
					if (!in_array($currentParentRole, $requestedRoles)) {
						$requestedRoles[$currentParentRole->getIdentifier()] = $currentParentRole;
					}
				}
			} catch (NoSuchRoleException $exception) {
				$this->outputLine('The role %s was not defined.', array($roleIdentifier));
				$this->quit(1);
			}
		}
		if(count($requestedRoles) > 0) {
			$requestedRoles['TYPO3.Flow:AuthenticatedUser'] = $this->policyService->getRole('TYPO3.Flow:AuthenticatedUser');
		} else {
			$requestedRoles['TYPO3.Flow:Anonymous'] = $this->policyService->getRole('TYPO3.Flow:Anonymous');
		}
		$requestedRoles['TYPO3.Flow:Everybody'] = $this->policyService->getRole('TYPO3.Flow:Everybody');

		$this->outputLine('Effective Permissions for the roles <b>%s</b> ', array(implode(', ', $requestedRoles)));
		$this->outputLine(str_repeat('-', $this->output->getMaximumLineLength()));

		$definedPrivileges = $this->policyService->getAllPrivilegesByType($privilegeType);
		$permissions = array();

		/** @var PrivilegeInterface $definedPrivilege */
		foreach($definedPrivileges as $definedPrivilege) {

			$accessGrants = 0;
			$accessDenies = 0;

			$permission = 'ABSTAIN';

			/** @var Role $requestedRole */
			foreach($requestedRoles as $requestedRole) {
				$privilegeType = $requestedRole->getPrivilegeForTarget($definedPrivilege->getPrivilegeTarget()->getIdentifier());

				if ($privilegeType === NULL) {
					continue;
				}

				if ($privilegeType->isGranted()) {
					$accessGrants++;
				} elseif ($privilegeType->isDenied()) {
					$accessDenies++;
				}
			}

			if ($accessDenies > 0) {
				$permission = '<error>DENY</error>';
			}
			if ($accessGrants > 0 && $accessDenies === 0) {
				$permission = '<success>GRANT</success>';
			}

			$permissions[$definedPrivilege->getPrivilegeTarget()->getIdentifier()] = $permission;
		}

		ksort($permissions);

		foreach($permissions as $privilegeTargetIdentifier => $permission) {
			$formattedPrivilegeTargetIdentifier = wordwrap($privilegeTargetIdentifier, $this->output->getMaximumLineLength() - 10, PHP_EOL . str_repeat(' ', 10), TRUE);
			$this->outputLine('%-70s %s', array($formattedPrivilegeTargetIdentifier, $permission));
		}
	}

	/**
	 * Lists all public controller actions not covered by the active security policy
	 *
	 * @return void
	 */
	public function showUnprotectedActionsCommand() {
		$methodPrivileges = array();
		foreach ($this->policyService->getRoles(TRUE) as $role) {
			$methodPrivileges = array_merge($methodPrivileges, $role->getPrivilegesByType('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegeInterface'));
		}

		$controllerClassNames = $this->reflectionService->getAllSubClassNamesForClass('TYPO3\Flow\Mvc\Controller\AbstractController');
		$allActionsAreProtected = TRUE;
		foreach ($controllerClassNames as $controllerClassName) {
			if ($this->reflectionService->isClassAbstract($controllerClassName)) {
				continue;
			}

			$methodNames = get_class_methods($controllerClassName);
			$foundUnprotectedAction = FALSE;
			foreach ($methodNames as $methodName) {
				if (preg_match('/.*Action$/', $methodName) === 0 || $this->reflectionService->isMethodPublic($controllerClassName, $methodName) === FALSE) {
					continue;
				}
				/** @var MethodPrivilegeInterface $methodPrivilege */
				foreach ($methodPrivileges as $methodPrivilege) {
					if ($methodPrivilege->matchesMethod($controllerClassName, $methodName)) {
						continue 2;
					}
				}

				if ($foundUnprotectedAction === FALSE) {
					$this->outputLine(PHP_EOL . '<b>' . $controllerClassName . '</b>');
					$foundUnprotectedAction = TRUE;
					$allActionsAreProtected = FALSE;
				}
				$this->outputLine('  ' . $methodName);
			}
		}

		if ($allActionsAreProtected === TRUE) {
			$this->outputLine('All public controller actions are covered by your security policy. Good job!');
		}
	}

	/**
	 * Shows the methods represented by the given security privilege target
	 *
	 * If the privilege target has parameters those can be specified separated by a colon
	 * for example "parameter1:value1" "parameter2:value2".
	 * But be aware that this only works for parameters that have been specified in the policy
	 *
	 * @param string $privilegeTarget The name of the privilegeTarget as stated in the policy
	 * @return void
	 */
	public function showMethodsForPrivilegeTargetCommand($privilegeTarget) {
		$privilegeTargetInstance = $this->policyService->getPrivilegeTargetByIdentifier($privilegeTarget);
		if ($privilegeTargetInstance === NULL) {
			$this->outputLine('The privilegeTarget "%s" is not defined', array($privilegeTarget));
			$this->quit(1);
		}
		$privilegeParameters = array();
		foreach ($this->request->getExceedingArguments() as $argument) {
			list($argumentName, $argumentValue) = explode(':', $argument, 2);
			$privilegeParameters[$argumentName] = $argumentValue;
		}
		$privilege = $privilegeTargetInstance->createPrivilege(PrivilegeInterface::GRANT, $privilegeParameters);
		if (!$privilege instanceof MethodPrivilegeInterface) {
			$this->outputLine('The privilegeTarget "%s" does not refer to a MethodPrivilege but to a privilege of type "%s"', array($privilegeTarget, $privilege->getPrivilegeTarget()->getPrivilegeClassName()));
			$this->quit(1);
		}

		$matchedClassesAndMethods = array();
		foreach ($this->reflectionService->getAllClassNames() as $className) {
			try {
				$reflectionClass = new \ReflectionClass($className);
			} catch (\ReflectionException $exception) {
				continue;
			}
			foreach ($reflectionClass->getMethods() as $reflectionMethod) {
				$methodName = $reflectionMethod->getName();
				if ($privilege->matchesMethod($className, $methodName)) {
					$matchedClassesAndMethods[$className][$methodName] = $methodName;
				}
			}
		}

		if (count($matchedClassesAndMethods) === 0) {
			$this->outputLine('The given Resource did not match any method or is unknown.');
			$this->quit(1);
		}


		foreach ($matchedClassesAndMethods as $className => $methods) {
			$this->outputLine($className);
			foreach ($methods as $methodName) {
				$this->outputLine('  ' . $methodName);
			}
			$this->outputLine();
		}
	}
}
namespace TYPO3\Flow\Command;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Command controller for tasks related to security
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class SecurityCommandController extends SecurityCommandController_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Command\SecurityCommandController') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Command\SecurityCommandController', $this);
		parent::__construct();
		if ('TYPO3\Flow\Command\SecurityCommandController' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Command\SecurityCommandController') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Command\SecurityCommandController', $this);

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
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Command\SecurityCommandController');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Command\SecurityCommandController', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Command\SecurityCommandController', $propertyName, 'var');
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
		$this->injectCacheManager(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Cache\CacheManager'));
		$this->injectReflectionService(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService'));
		$objectManager_reference = &$this->objectManager;
		$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Object\ObjectManagerInterface');
		if ($this->objectManager === NULL) {
			$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('0c3c44be7be16f2a287f1fb2d068dde4', $objectManager_reference);
			if ($this->objectManager === NULL) {
				$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('0c3c44be7be16f2a287f1fb2d068dde4',  $objectManager_reference, 'TYPO3\Flow\Object\ObjectManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'); });
			}
		}
		$rsaWalletService_reference = &$this->rsaWalletService;
		$this->rsaWalletService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Security\Cryptography\RsaWalletServicePhp');
		if ($this->rsaWalletService === NULL) {
			$this->rsaWalletService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('47cd054dfc0feacf9b3f977ab72e0fd8', $rsaWalletService_reference);
			if ($this->rsaWalletService === NULL) {
				$this->rsaWalletService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('47cd054dfc0feacf9b3f977ab72e0fd8',  $rsaWalletService_reference, 'TYPO3\Flow\Security\Cryptography\RsaWalletServicePhp', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Cryptography\RsaWalletServicePhp'); });
			}
		}
		$policyService_reference = &$this->policyService;
		$this->policyService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Security\Policy\PolicyService');
		if ($this->policyService === NULL) {
			$this->policyService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('16231078e783810895dba92e364c25f7', $policyService_reference);
			if ($this->policyService === NULL) {
				$this->policyService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('16231078e783810895dba92e364c25f7',  $policyService_reference, 'TYPO3\Flow\Security\Policy\PolicyService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Policy\PolicyService'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'cacheManager',
  1 => 'reflectionService',
  2 => 'objectManager',
  3 => 'rsaWalletService',
  4 => 'policyService',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Command/SecurityCommandController.php
#