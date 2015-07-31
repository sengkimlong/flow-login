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
 * Filter operation, limiting the set of objects. The filter expression is
 * expected as string argument and used to reduce the context to matching
 * elements by checking each value against the filter.
 *
 * A filter expression is written in Fizzle, a grammar inspired by CSS selectors.
 * It has the form `"[" [<value>] <operator> <operand> "]"` and supports the
 * following operators:
 *
 * =
 *   Strict equality of value and operand
 * !=
 *   Strict inequality of value and operand
 * <
 *   Value is less than operand
 * <=
 *   Value is less than or equal to operand
 * >
 *   Value is greater than operand
 * >=
 *   Value is greater than or equal to operand
 * $=
 *   Value ends with operand (string-based)
 * ^=
 *   Value starts with operand (string-based)
 * *=
 *   Value contains operand (string-based)
 * instanceof
 *   Checks if the value is an instance of the operand
 *
 * For the latter the behavior is as follows: if the operand is one of the strings
 * object, array, int(eger), float, double, bool(ean) or string the value is checked
 * for being of the specified type. For any other strings the value is used as
 * classname with the PHP instanceof operation to check if the value matches.
 */
class FilterOperation_Original extends \TYPO3\Eel\FlowQuery\Operations\AbstractOperation {

	/**
	 * {@inheritdoc}
	 *
	 * @var string
	 */
	static protected $shortName = 'filter';

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * {@inheritdoc}
	 *
	 * @param \TYPO3\Eel\FlowQuery\FlowQuery $flowQuery the FlowQuery object
	 * @param array $arguments the filter expression to use (in index 0)
	 * @return void
	 * @throws \TYPO3\Eel\FlowQuery\FizzleException
	 */
	public function evaluate(\TYPO3\Eel\FlowQuery\FlowQuery $flowQuery, array $arguments) {
		if (!isset($arguments[0]) || empty($arguments[0])) {
			return;
		}
		if (!is_string($arguments[0])) {
			throw new \TYPO3\Eel\FlowQuery\FizzleException('filter operation expects string argument', 1332489625);
		}
		$filter = $arguments[0];

		$parsedFilter = \TYPO3\Eel\FlowQuery\FizzleParser::parseFilterGroup($filter);

		$filteredContext = array();
		$context = $flowQuery->getContext();
		foreach ($context as $element) {
			if ($this->matchesFilterGroup($element, $parsedFilter)) {
				$filteredContext[] = $element;
			}
		}
		$flowQuery->setContext($filteredContext);
	}

	/**
	 * Evaluate Filter Group. An element matches the filter group if it
	 * matches at least one part of the filter group.
	 *
	 * Filter Group is something like "[foo], [bar]"
	 *
	 * @param object $element
	 * @param array $parsedFilter
	 * @return boolean TRUE if $element matches filter group, FALSE otherwise
	 */
	protected function matchesFilterGroup($element, array $parsedFilter) {
		foreach ($parsedFilter['Filters'] as $filter) {
			if ($this->matchesFilter($element, $filter)) {
				return TRUE;
			}
		}

		return FALSE;
	}

	/**
	 * Match a single filter, i.e. [foo]. It matches only if all filter parts match.
	 *
	 * @param object $element
	 * @param string $filter
	 * @return boolean TRUE if $element matches filter, FALSE otherwise
	 */
	protected function matchesFilter($element, $filter) {
		if (isset($filter['IdentifierFilter']) && !$this->matchesIdentifierFilter($element, $filter['IdentifierFilter'])) {
			return FALSE;
		}
		if (isset($filter['PropertyNameFilter']) && !$this->matchesPropertyNameFilter($element, $filter['PropertyNameFilter'])) {
			return FALSE;
		}

		if (isset($filter['AttributeFilters'])) {
			foreach ($filter['AttributeFilters'] as $attributeFilter) {
				if (!$this->matchesAttributeFilter($element, $attributeFilter)) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	/**
	 * For generic objects, we do not support property name filters.
	 *
	 * @param object $element
	 * @param string $propertyNameFilter
	 * @return boolean
	 * @throws \TYPO3\Eel\FlowQuery\FizzleException
	 */
	protected function matchesPropertyNameFilter($element, $propertyNameFilter) {
		throw new \TYPO3\Eel\FlowQuery\FizzleException('Property Name filter not supported for generic objects.', 1332489796);
	}

	/**
	 * Match a single attribute filter
	 *
	 * @param mixed $element
	 * @param array $attributeFilter
	 * @return boolean
	 */
	protected function matchesAttributeFilter($element, array $attributeFilter) {
		if ($attributeFilter['Identifier'] !== NULL) {
			$value = $this->getPropertyPath($element, $attributeFilter['Identifier']);
		} else {
			$value = $element;
		}
		$operand = NULL;
		if (isset($attributeFilter['Operand'])) {
			$operand = $attributeFilter['Operand'];
		}

		return $this->evaluateOperator($value, $attributeFilter['Operator'], $operand);
	}

	/**
	 * Filter the object by its identifier (UUID)
	 *
	 * @param object $element
	 * @param string $identifier
	 * @return boolean
	 */
	protected function matchesIdentifierFilter($element, $identifier) {
		return ($this->persistenceManager->getIdentifierByObject($element) === $identifier);
	}

	/**
	 * Evaluate a property path. This is outsourced to a single method
	 * to make overriding this functionality easy.
	 *
	 * @param object $element
	 * @param string $propertyPath
	 * @return mixed
	 */
	protected function getPropertyPath($element, $propertyPath) {
		return \TYPO3\Flow\Reflection\ObjectAccess::getPropertyPath($element, $propertyPath);
	}

	/**
	 * Evaluate an operator
	 *
	 * @param mixed $value
	 * @param string $operator
	 * @param mixed $operand
	 * @return boolean
	 */
	protected function evaluateOperator($value, $operator, $operand) {
		switch ($operator) {
			case '=':
				return $value === $operand;
			case '!=':
				return $value !== $operand;
			case '<':
				return $value < $operand;
			case '<=':
				return $value <= $operand;
			case '>':
				return $value > $operand;
			case '>=':
				return $value >= $operand;
			case '$=':
				return strrpos($value, $operand) === strlen($value) - strlen($operand);
			case '^=':
				return strpos($value, $operand) === 0;
			case '*=':
				return strpos($value, $operand) !== FALSE;
			case 'instanceof':
				if ($this->operandIsSimpleType($operand)) {
					return $this->handleSimpleTypeOperand($operand, $value);
				} else {
					return ($value instanceof $operand);
				}
			default:
				return ($value !== NULL);
		}
	}

	/**
	 * @param string $type
	 * @return boolean TRUE if operand is a simple type (object, array, string, ...); i.e. everything which is NOT a class name
	 */
	protected function operandIsSimpleType($type) {
		return $type === 'object' || $type === 'array' || \TYPO3\Flow\Utility\TypeHandling::isLiteral($type);
	}

	/**
	 * @param string $operand
	 * @param string $value
	 * @return boolean TRUE if $value is of type $operand; FALSE otherwise
	 */
	protected function handleSimpleTypeOperand($operand, $value) {
		$operand = \TYPO3\Flow\Utility\TypeHandling::normalizeType($operand);
		if ($operand === 'object') {
			return is_object($value);
		} elseif ($operand === 'string') {
			return is_string($value);
		} elseif ($operand === 'integer') {
			return is_integer($value);
		} elseif ($operand === 'boolean') {
			return is_bool($value);
		} elseif ($operand === 'float') {
			return is_float($value);
		} elseif ($operand === 'array') {
			return is_array($value);
		}

		return FALSE;
	}
}namespace TYPO3\Eel\FlowQuery\Operations\Object;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Filter operation, limiting the set of objects. The filter expression is
 * expected as string argument and used to reduce the context to matching
 * elements by checking each value against the filter.
 * 
 * A filter expression is written in Fizzle, a grammar inspired by CSS selectors.
 * It has the form `"[" [<value>] <operator> <operand> "]"` and supports the
 * following operators:
 * 
 * =
 *   Strict equality of value and operand
 * !=
 *   Strict inequality of value and operand
 * <
 *   Value is less than operand
 * <=
 *   Value is less than or equal to operand
 * >
 *   Value is greater than operand
 * >=
 *   Value is greater than or equal to operand
 * $=
 *   Value ends with operand (string-based)
 * ^=
 *   Value starts with operand (string-based)
 * *=
 *   Value contains operand (string-based)
 * instanceof
 *   Checks if the value is an instance of the operand
 * 
 * For the latter the behavior is as follows: if the operand is one of the strings
 * object, array, int(eger), float, double, bool(ean) or string the value is checked
 * for being of the specified type. For any other strings the value is used as
 * classname with the PHP instanceof operation to check if the value matches.
 */
class FilterOperation extends FilterOperation_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if ('TYPO3\Eel\FlowQuery\Operations\Object\FilterOperation' === get_class($this)) {
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
	$reflectedClass = new \ReflectionClass('TYPO3\Eel\FlowQuery\Operations\Object\FilterOperation');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Eel\FlowQuery\Operations\Object\FilterOperation', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Eel\FlowQuery\Operations\Object\FilterOperation', $propertyName, 'var');
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
		$persistenceManager_reference = &$this->persistenceManager;
		$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		if ($this->persistenceManager === NULL) {
			$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('f1bc82ad47156d95485678e33f27c110', $persistenceManager_reference);
			if ($this->persistenceManager === NULL) {
				$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('f1bc82ad47156d95485678e33f27c110',  $persistenceManager_reference, 'TYPO3\Flow\Persistence\Doctrine\PersistenceManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'persistenceManager',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Eel/Classes/TYPO3/Eel/FlowQuery/Operations/Object/FilterOperation.php
#