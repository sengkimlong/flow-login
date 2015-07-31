<?php 
namespace TYPO3\Flow\Security\Authorization\Privilege\Method;

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
use TYPO3\Flow\Aop\Builder\ClassNameIndex;
use TYPO3\Flow\Aop\Pointcut\PointcutFilterComposite;
use TYPO3\Flow\Aop\Pointcut\PointcutFilterInterface;
use TYPO3\Flow\Aop\Pointcut\RuntimeExpressionEvaluator;
use TYPO3\Flow\Cache\CacheManager;
use TYPO3\Flow\Cache\Frontend\VariableFrontend;
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Security\Policy\PolicyService;

/**
 * Pointcut filter which connects the method privileges to the AOP framework
 *
 * @Flow\Scope("singleton")
 */
class MethodPrivilegePointcutFilter_Original implements PointcutFilterInterface {

	/**
	 * @var PointcutFilterComposite[]
	 */
	protected $filters = NULL;

	/**
	 * @var array
	 */
	protected $methodPermissions = array();

	/**
	 * @var VariableFrontend
	 */
	protected $methodPermissionCache;

	/**
	 * @var ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @var RuntimeExpressionEvaluator
	 */
	protected $runtimeExpressionEvaluator;

	/**
	 * This object is created very early so we can't rely on AOP for the property injection
	 *
	 * @param ObjectManagerInterface $objectManager
	 * @return void
	 */
	public function injectObjectManager(ObjectManagerInterface $objectManager) {
		$this->objectManager = $objectManager;
		/** @var CacheManager $cacheManager */
		$cacheManager = $this->objectManager->get(CacheManager::class);
		$this->methodPermissionCache = $cacheManager->getCache('Flow_Security_Authorization_Privilege_Method');
		$this->runtimeExpressionEvaluator = $this->objectManager->get(RuntimeExpressionEvaluator::class);
	}

	/**
	 * @return void
	 */
	public function initializeObject() {
		if ($this->methodPermissionCache->has('methodPermission')) {
			$this->methodPermissions = $this->methodPermissionCache->get('methodPermission');
		}
	}

	/**
	 * Checks if the specified class and method matches against the filter, i.e. if there is a policy entry to intercept this method.
	 * This method also creates a cache entry for every method, to cache the associated roles and privileges.
	 *
	 * @param string $className Name of the class to check the name of
	 * @param string $methodName Name of the method to check the name of
	 * @param string $methodDeclaringClassName Name of the class the method was originally declared in
	 * @param mixed $pointcutQueryIdentifier Some identifier for this query - must at least differ from a previous identifier. Used for circular reference detection.
	 * @return boolean TRUE if the names match, otherwise FALSE
	 */
	public function matches($className, $methodName, $methodDeclaringClassName, $pointcutQueryIdentifier) {

		if ($this->filters === NULL) {
			$this->buildPointcutFilters();
		}

		$matches = FALSE;
		/** @var PointcutFilterComposite $filter */
		foreach ($this->filters as $privilegeIdentifier => $filter) {
			if ($filter->matches($className, $methodName, $methodDeclaringClassName, $pointcutQueryIdentifier)) {
				$matches = TRUE;
				$methodIdentifier = strtolower($className . '->' . $methodName);

				$hasRuntimeEvaluations = FALSE;
				if ($filter->hasRuntimeEvaluationsDefinition() === TRUE) {
					$hasRuntimeEvaluations = TRUE;
					$this->runtimeExpressionEvaluator->addExpression($privilegeIdentifier, $filter->getRuntimeEvaluationsClosureCode());
				}

				$this->methodPermissions[$methodIdentifier][$privilegeIdentifier]['privilegeMatchesMethod'] = TRUE;
				$this->methodPermissions[$methodIdentifier][$privilegeIdentifier]['hasRuntimeEvaluations'] = $hasRuntimeEvaluations;
			}
		}

		return $matches;
	}

	/**
	 * Returns TRUE if this filter holds runtime evaluations for a previously matched pointcut
	 *
	 * @return boolean TRUE if this filter has runtime evaluations
	 */
	public function hasRuntimeEvaluationsDefinition() {
		return FALSE;
	}

	/**
	 * Returns runtime evaluations for the pointcut.
	 *
	 * @return array Runtime evaluations
	 */
	public function getRuntimeEvaluationsDefinition() {
		return array();
	}

	/**
	 * This method is used to optimize the matching process.
	 *
	 * @param ClassNameIndex $classNameIndex
	 * @return ClassNameIndex
	 */
	public function reduceTargetClassNames(ClassNameIndex $classNameIndex) {
		if ($this->filters === NULL) {
			$this->buildPointcutFilters();
		}

		$result = new ClassNameIndex();
		foreach ($this->filters as $filter) {
			$result->applyUnion($filter->reduceTargetClassNames($classNameIndex));
		}
		return $result;
	}

	/**
	 * Builds the needed pointcut filters for matching the policy privileges
	 *
	 * @return boolean
	 */
	protected function buildPointcutFilters() {
		$this->filters = array();
		/** @var PolicyService $policyService */
		$policyService = $this->objectManager->get(PolicyService::class);
		/** @var MethodPrivilegeInterface[] $methodPrivileges */
		$methodPrivileges = $policyService->getAllPrivilegesByType(MethodPrivilegeInterface::class);
		foreach ($methodPrivileges as $privilege) {
			$this->filters[$privilege->getCacheEntryIdentifier()] = $privilege->getPointcutFilterComposite();
		}
	}

	/**
	 * Save the found matches to the cache.
	 *
	 * @return void
	 */
	public function savePolicyCache() {
		$tags = array('TYPO3_Flow_Aop');
		if (!$this->methodPermissionCache->has('methodPermission')) {
			$this->methodPermissionCache->set('methodPermission', $this->methodPermissions, $tags);
		}
	}
}namespace TYPO3\Flow\Security\Authorization\Privilege\Method;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Pointcut filter which connects the method privileges to the AOP framework
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class MethodPrivilegePointcutFilter extends MethodPrivilegePointcutFilter_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter', $this);
		if ('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter') {
			$this->initializeObject(1);
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter', $this);

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

		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter') {
			$this->initializeObject(2);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegePointcutFilter', $propertyName, 'var');
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
$this->Flow_Injected_Properties = array (
  0 => 'objectManager',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Security/Authorization/Privilege/Method/MethodPrivilegePointcutFilter.php
#