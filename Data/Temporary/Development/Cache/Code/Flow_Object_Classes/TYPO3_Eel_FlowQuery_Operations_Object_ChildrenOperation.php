<?php 
namespace TYPO3\Eel\FlowQuery\Operations\Object;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Eel".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * "children" operation working on generic objects. It iterates over all
 * context elements and returns the values of the properties given in the
 * filter expression that has to be specified as argument or in a following
 * filter operation.
 */
class ChildrenOperation_Original extends \TYPO3\Eel\FlowQuery\Operations\AbstractOperation {

	/**
	 * {@inheritdoc}
	 *
	 * @var string
	 */
	static protected $shortName = 'children';

	/**
	 * {@inheritdoc}
	 *
	 * @param \TYPO3\Eel\FlowQuery\FlowQuery $flowQuery the FlowQuery object
	 * @param array $arguments the filter expression to use (in index 0)
	 * @return void
	 * @throws \TYPO3\Eel\FlowQuery\FizzleException
	 */
	public function evaluate(\TYPO3\Eel\FlowQuery\FlowQuery $flowQuery, array $arguments) {
		if (count($flowQuery->getContext()) === 0) {
			return;
		}

		if (!isset($arguments[0]) || empty($arguments[0])) {
			if ($flowQuery->peekOperationName() === 'filter') {
				$filterOperation = $flowQuery->popOperation();
				if (count($filterOperation['arguments']) === 0 || empty($filterOperation['arguments'][0])) {
					throw new \TYPO3\Eel\FlowQuery\FizzleException('Filter() needs arguments if it follows an empty children(): children().filter()', 1332489382);
				}
				$selectorAndFilter = $filterOperation['arguments'][0];
			} else {
				throw new \TYPO3\Eel\FlowQuery\FizzleException('children() needs at least a Property Name filter specified, or must be followed by filter().', 1332489399);
			}
		} else {
			$selectorAndFilter = $arguments[0];
		}

		$parsedFilter = \TYPO3\Eel\FlowQuery\FizzleParser::parseFilterGroup($selectorAndFilter);

		if (count($parsedFilter['Filters']) === 0) {
			throw new \TYPO3\Eel\FlowQuery\FizzleException('filter needs to be specified in children()', 1332489416);
		} elseif (count($parsedFilter['Filters']) === 1) {
			$filter = $parsedFilter['Filters'][0];

			if (isset($filter['PropertyNameFilter'])) {
				$this->evaluatePropertyNameFilter($flowQuery, $filter['PropertyNameFilter']);
				if (isset($filter['AttributeFilters'])) {
					foreach ($filter['AttributeFilters'] as $attributeFilter) {
						$flowQuery->pushOperation('filter', array($attributeFilter['text']));
					}
				}
			} elseif (isset($filter['AttributeFilters'])) {
				throw new \TYPO3\Eel\FlowQuery\FizzleException('children() must have a property name filter and cannot only have an attribute filter.', 1332489432);
			}
		} else {
			throw new \TYPO3\Eel\FlowQuery\FizzleException('children() only supports a single filter group right now, i.e. nothing of the form "filter1, filter2"', 1332489489);
		}
	}

	/**
	 * Evaluate the property name filter by traversing to the child object. We only support
	 * nested objects right now
	 *
	 * @param \TYPO3\Eel\FlowQuery\FlowQuery $query
	 * @param string $propertyNameFilter
	 * @return void
	 */
	protected function evaluatePropertyNameFilter(\TYPO3\Eel\FlowQuery\FlowQuery $query, $propertyNameFilter) {
		$resultObjects = array();
		$resultObjectHashes = array();
		foreach ($query->getContext() as $element) {
			$subProperty = \TYPO3\Flow\Reflection\ObjectAccess::getPropertyPath($element, $propertyNameFilter);
			if (is_object($subProperty) || is_array($subProperty)) {
				if (is_array($subProperty) || $subProperty instanceof \Traversable) {
					foreach ($subProperty as $childElement) {
						if (!isset($resultObjectHashes[spl_object_hash($childElement)])) {
							$resultObjectHashes[spl_object_hash($childElement)] = TRUE;
							$resultObjects[] = $childElement;
						}
					}
				} elseif (!isset($resultObjectHashes[spl_object_hash($subProperty)])) {
					$resultObjectHashes[spl_object_hash($subProperty)] = TRUE;
					$resultObjects[] = $subProperty;
				}
			}
		}

		$query->setContext($resultObjects);
	}
}
namespace TYPO3\Eel\FlowQuery\Operations\Object;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * "children" operation working on generic objects. It iterates over all
 * context elements and returns the values of the properties given in the
 * filter expression that has to be specified as argument or in a following
 * filter operation.
 */
class ChildrenOperation extends ChildrenOperation_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
	$reflectedClass = new \ReflectionClass('TYPO3\Eel\FlowQuery\Operations\Object\ChildrenOperation');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Eel\FlowQuery\Operations\Object\ChildrenOperation', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Eel\FlowQuery\Operations\Object\ChildrenOperation', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Eel/Classes/TYPO3/Eel/FlowQuery/Operations/Object/ChildrenOperation.php
#