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
use TYPO3\Flow\Security\Authorization\Privilege\PrivilegeInterface;

/**
 * A role. These roles can be structured in a tree.
 */
class Role_Original {

	/**
	 * The identifier of this role
	 *
	 * @var string
	 */
	protected $identifier;

	/**
	 * The name of this role (without package key)
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The package key this role belongs to (extracted from the identifier)
	 *
	 * @var string
	 */
	protected $packageKey;

	/**
	 * Whether or not the role is "abstract", meaning it can't be assigned to accounts directly but only serves as a "template role" for other roles to inherit from
	 *
	 * @var boolean
	 */
	protected $abstract = FALSE;

	/**
	 * @Flow\Transient
	 * @var Role[]
	 */
	protected $parentRoles;

	/**
	 * @var PrivilegeInterface[]
	 */
	protected $privileges = array();

	/**
	 * @param string $identifier The fully qualified identifier of this role (Vendor.Package:Role)
	 * @param Role[] $parentRoles
	 * @throws \InvalidArgumentException
	 */
	public function __construct($identifier, array $parentRoles = array()) {
		if (!is_string($identifier)) {
			throw new \InvalidArgumentException('The role identifier must be a string, "' . gettype($identifier) . '" given. Please check the code or policy configuration creating or defining this role.', 1296509556);
		}
		if (preg_match('/^[\w]+((\.[\w]+)*\:[\w]+)?$/', $identifier) !== 1) {

		}
		if (preg_match('/^([\w]+(?:\.[\w]+)*)\:([\w]+)+$/', $identifier, $matches) !== 1) {
			throw new \InvalidArgumentException('The role identifier must follow the pattern "Vendor.Package:RoleName", but "' . $identifier . '" was given. Please check the code or policy configuration creating or defining this role.', 1365446549);
		}
		$this->identifier = $identifier;
		$this->packageKey = $matches[1];
		$this->name = $matches[2];
		$this->parentRoles = $parentRoles;
	}

	/**
	 * Returns the fully qualified identifier of this role
	 *
	 * @return string
	 */
	public function getIdentifier() {
		return $this->identifier;
	}

	/**
	 * The key of the package that defines this role.
	 *
	 * @return string
	 */
	public function getPackageKey() {
		return $this->packageKey;
	}

	/**
	 * The name of this role, being the identifier without the package key.
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param boolean $abstract
	 * @return void
	 */
	public function setAbstract($abstract) {
		$this->abstract = $abstract;
	}

	/**
	 * Whether or not this role is "abstract", meaning it can't be assigned to accounts directly but only serves as a "template role" for other roles to inherit from
	 *
	 * @return boolean
	 */
	public function isAbstract() {
		return $this->abstract;
	}

	/**
	 * Assign parent roles to this role.
	 *
	 * @param Role[] $parentRoles indexed by role identifier
	 * @return void
	 */
	public function setParentRoles(array $parentRoles) {
		$this->parentRoles = array();
		foreach ($parentRoles as $parentRole) {
			$this->addParentRole($parentRole);
		}
	}

	/**
	 * Returns an array of all directly assigned parent roles.
	 *
	 * @return Role[] Array of direct parent roles, indexed by role identifier
	 */
	public function getParentRoles() {
		return $this->parentRoles;
	}

	/**
	 * Returns all (directly and indirectly reachable) parent roles for the given role.
	 *
	 * @return Role[] Array of parent roles, indexed by role identifier
	 */
	public function getAllParentRoles() {
		$result = array();

		foreach ($this->parentRoles as $parentRoleIdentifier => $currentParentRole) {
			if (isset($result[$parentRoleIdentifier])) {
				continue;
			}
			$result[$parentRoleIdentifier] = $currentParentRole;

			$currentGrandParentRoles = $currentParentRole->getAllParentRoles();
			foreach ($currentGrandParentRoles as $currentGrandParentRoleIdentifier => $currentGrandParentRole) {
				if (!isset($result[$currentGrandParentRoleIdentifier])) {
					$result[$currentGrandParentRoleIdentifier] = $currentGrandParentRole;
				}
			}
		}

		return $result;
	}

	/**
	 * Add a (direct) parent role to this role.
	 *
	 * @param Role $parentRole
	 * @return void
	 */
	public function addParentRole(Role $parentRole) {
		if (!$this->hasParentRole($parentRole)) {
			$parentRoleIdentifier = $parentRole->getIdentifier();
			$this->parentRoles[$parentRoleIdentifier] = $parentRole;
		}
	}

	/**
	 * Returns TRUE if the given role is a directly assigned parent of this role.
	 *
	 * @param Role $role
	 * @return boolean
	 */
	public function hasParentRole(Role $role) {
		return isset($this->parentRoles[$role->getIdentifier()]);
	}

	/**
	 * Assign privileges to this role.
	 *
	 * @param PrivilegeInterface[] $privileges
	 * @return void
	 */
	public function setPrivileges(array $privileges) {
		foreach ($privileges as $privilege) {
			$this->privileges[$privilege->getCacheEntryIdentifier()] = $privilege;
		}
	}

	/**
	 * @return PrivilegeInterface[] Array of privileges assigned to this role
	 */
	public function getPrivileges() {
		return $this->privileges;
	}

	/**
	 * @param string $className Fully qualified name of the Privilege class to filter for
	 * @return PrivilegeInterface[]
	 */
	public function getPrivilegesByType($className) {
		$privileges = array();
		foreach ($this->privileges as $privilege) {
			if ($privilege instanceof $className) {
				$privileges[] = $privilege;
			}
		}
		return $privileges;
	}

	/**
	 * @param string $privilegeTargetIdentifier
	 * @param array $privilegeParameters
	 * @return PrivilegeInterface the matching privilege or NULL if no privilege exists for the given constraints
	 */
	public function getPrivilegeForTarget($privilegeTargetIdentifier, array $privilegeParameters = array()) {
		foreach ($this->privileges as $privilege) {
			if ($privilege->getPrivilegeTargetIdentifier() !== $privilegeTargetIdentifier) {
				continue;
			}
			if (array_diff_assoc($privilege->getParameters(), $privilegeParameters) !== array()) {
				continue;
			}
			return $privilege;
		}
		return NULL;
	}

	/**
	 * Add a privilege to this role.
	 *
	 * @param PrivilegeInterface $privilege
	 * @return void
	 */
	public function addPrivilege($privilege) {
		$this->privileges[$privilege->getCacheEntryIdentifier()] = $privilege;
	}

	/**
	 * Returns the string representation of this role (the identifier)
	 *
	 * @return string the string representation of this role
	 */
	public function __toString() {
		return $this->identifier;
	}
}
namespace TYPO3\Flow\Security\Policy;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A role. These roles can be structured in a tree.
 */
class Role extends Role_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 * @param string $identifier The fully qualified identifier of this role (Vendor.Package:Role)
	 * @param Role[] $parentRoles
	 * @throws \InvalidArgumentException
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(1, $arguments)) $arguments[1] = array (
);
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $identifier in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		call_user_func_array('parent::__construct', $arguments);
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
			}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Security\Policy\Role');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Security\Policy\Role', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Security\Policy\Role', $propertyName, 'var');
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
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Security/Policy/Role.php
#