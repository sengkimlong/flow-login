<?php 
namespace TYPO3\Fluid\ViewHelpers\Security;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Fluid".           *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */


use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Security\Account;
use TYPO3\Flow\Security\Context;
use TYPO3\Flow\Security\Policy\PolicyService;
use TYPO3\Flow\Security\Policy\Role;
use TYPO3\Fluid\Core\ViewHelper\AbstractConditionViewHelper;

/**
 * This view helper implements an ifHasRole/else condition.
 *
 * = Examples =
 *
 * <code title="Basic usage">
 * <f:security.ifHasRole role="Administrator">
 *   This is being shown in case you have the Administrator role (aka role) defined in the
 *   current package according to the controllerContext
 * </f:security.ifHasRole>
 * </code>
 *
 * <code title="Usage with packageKey attribute">
 * <f:security.ifHasRole role="Administrator" packageKey="Acme.MyPackage">
 *   This is being shown in case you have the Acme.MyPackage:Administrator role (aka role).
 * </f:security.ifHasRole>
 * </code>
 *
 * <code title="Usage with full role identifier in role attribute">
 * <f:security.ifHasRole role="Acme.MyPackage:Administrator">
 *   This is being shown in case you have the Acme.MyPackage:Administrator role (aka role).
 * </f:security.ifHasRole>
 * </code>
 *
 * Everything inside the <f:ifHasRole> tag is being displayed if you have the given role.
 *
 * <code title="IfRole / then / else">
 * <f:security.ifHasRole role="Administrator">
 *   <f:then>
 *     This is being shown in case you have the role.
 *   </f:then>
 *   <f:else>
 *     This is being displayed in case you do not have the role.
 *   </f:else>
 * </f:security.ifHasRole>
 * </code>
 *
 * Everything inside the "then" tag is displayed if you have the role.
 * Otherwise, everything inside the "else"-tag is displayed.
 *
 * <code title="Usage with role object in role attribute">
 * <f:security.ifHasRole role="{someRoleObject}">
 *   This is being shown in case you have the specified role
 * </f:security.ifHasRole>
 * </code>
 *
 * <code title="Usage with specific account instead of currently logged in account">
 * <f:security.ifHasRole role="Administrator" account="{otherAccount}">
 *   This is being shown in case "otherAccount" has the Acme.MyPackage:Administrator role (aka role).
 * </f:security.ifHasRole>
 * </code>
 *
 *
 * @api
 */
class IfHasRoleViewHelper_Original extends AbstractConditionViewHelper {

	/**
	 * @Flow\Inject
	 * @var Context
	 */
	protected $securityContext;

	/**
	 * @Flow\Inject
	 * @var PolicyService
	 */
	protected $policyService;

	/**
	 * renders <f:then> child if the role could be found in the security context,
	 * otherwise renders <f:else> child.
	 *
	 * @param string $role The role or role identifier
	 * @param string $packageKey PackageKey of the package defining the role
	 * @param Account $account If specified, this subject of this check is the given Account instead of the currently authenticated account
	 * @return string the rendered string
	 * @api
	 */
	public function render($role, $packageKey = NULL, Account $account = NULL) {
		if (is_string($role)) {
			$roleIdentifier = $role;

			if (in_array($roleIdentifier, array('Everybody', 'Anonymous', 'AuthenticatedUser'))) {
				 $roleIdentifier = 'TYPO3.Flow:' . $roleIdentifier;
			}

			if (strpos($roleIdentifier, '.') === FALSE && strpos($roleIdentifier, ':') === FALSE) {
				if ($packageKey === NULL) {
					$request = $this->controllerContext->getRequest();
					$roleIdentifier = $request->getControllerPackageKey() . ':' . $roleIdentifier;
				} else {
					$roleIdentifier = $packageKey . ':' . $roleIdentifier;
				}
			}

			$role = $this->policyService->getRole($roleIdentifier);
		}

		if ($account instanceof Account) {
			$hasRole = $account->hasRole($role);
		} else {
			$hasRole = $this->securityContext->hasRole($role->getIdentifier());
		}

		if ($hasRole) {
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}
}
namespace TYPO3\Fluid\ViewHelpers\Security;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * This view helper implements an ifHasRole/else condition.
 * 
 * = Examples =
 * 
 * <code title="Basic usage">
 * <f:security.ifHasRole role="Administrator">
 *   This is being shown in case you have the Administrator role (aka role) defined in the
 *   current package according to the controllerContext
 * </f:security.ifHasRole>
 * </code>
 * 
 * <code title="Usage with packageKey attribute">
 * <f:security.ifHasRole role="Administrator" packageKey="Acme.MyPackage">
 *   This is being shown in case you have the Acme.MyPackage:Administrator role (aka role).
 * </f:security.ifHasRole>
 * </code>
 * 
 * <code title="Usage with full role identifier in role attribute">
 * <f:security.ifHasRole role="Acme.MyPackage:Administrator">
 *   This is being shown in case you have the Acme.MyPackage:Administrator role (aka role).
 * </f:security.ifHasRole>
 * </code>
 * 
 * Everything inside the <f:ifHasRole> tag is being displayed if you have the given role.
 * 
 * <code title="IfRole / then / else">
 * <f:security.ifHasRole role="Administrator">
 *   <f:then>
 *     This is being shown in case you have the role.
 *   </f:then>
 *   <f:else>
 *     This is being displayed in case you do not have the role.
 *   </f:else>
 * </f:security.ifHasRole>
 * </code>
 * 
 * Everything inside the "then" tag is displayed if you have the role.
 * Otherwise, everything inside the "else"-tag is displayed.
 * 
 * <code title="Usage with role object in role attribute">
 * <f:security.ifHasRole role="{someRoleObject}">
 *   This is being shown in case you have the specified role
 * </f:security.ifHasRole>
 * </code>
 * 
 * <code title="Usage with specific account instead of currently logged in account">
 * <f:security.ifHasRole role="Administrator" account="{otherAccount}">
 *   This is being shown in case "otherAccount" has the Acme.MyPackage:Administrator role (aka role).
 * </f:security.ifHasRole>
 * </code>
 */
class IfHasRoleViewHelper extends IfHasRoleViewHelper_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		parent::__construct();
		if ('TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

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
	$reflectedClass = new \ReflectionClass('TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Fluid\ViewHelpers\Security\IfHasRoleViewHelper', $propertyName, 'var');
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
		$this->injectObjectManager(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'));
		$this->injectSystemLogger(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Log\SystemLoggerInterface'));
		$securityContext_reference = &$this->securityContext;
		$this->securityContext = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Security\Context');
		if ($this->securityContext === NULL) {
			$this->securityContext = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('48836470c14129ade5f39e28c4816673', $securityContext_reference);
			if ($this->securityContext === NULL) {
				$this->securityContext = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('48836470c14129ade5f39e28c4816673',  $securityContext_reference, 'TYPO3\Flow\Security\Context', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Context'); });
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
  0 => 'objectManager',
  1 => 'systemLogger',
  2 => 'securityContext',
  3 => 'policyService',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Fluid/Classes/TYPO3/Fluid/ViewHelpers/Security/IfHasRoleViewHelper.php
#