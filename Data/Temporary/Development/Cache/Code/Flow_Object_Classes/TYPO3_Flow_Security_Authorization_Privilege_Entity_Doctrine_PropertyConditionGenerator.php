<?php 
namespace TYPO3\Flow\Security\Authorization\Privilege\Entity\Doctrine;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\QuoteStrategy;
use Doctrine\ORM\Query\Filter\SQLFilter as DoctrineSqlFilter;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Persistence\Doctrine\PersistenceManager;
use TYPO3\Flow\Persistence\Doctrine\Query;
use TYPO3\Flow\Reflection\ObjectAccess;
use TYPO3\Flow\Security\Context;
use TYPO3\Flow\Security\Exception\InvalidPolicyException;
use TYPO3\Flow\Security\Exception\InvalidQueryRewritingConstraintException;
use TYPO3\Flow\Security\Policy\PolicyService;
use TYPO3\Flow\Utility\TypeHandling;

/**
 * A sql generator to create a sql condition for an entity property.
 */
class PropertyConditionGenerator_Original implements SqlGeneratorInterface {

	/**
	 * Property path the currently parsed expression relates to
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * @var string
	 */
	protected $operator;

	/**
	 * @var string|array
	 */
	protected $operandDefinition;

	/**
	 * @var mixed
	 */
	protected $operand;

	/**
	 * Array of registered global objects that can be accessed as operands
	 *
	 * @Flow\InjectConfiguration("aop.globalObjects")
	 * @var array
	 */
	protected $globalObjects = array();

	/**
	 * @Flow\Inject
	 * @var Context
	 */
	protected $securityContext;

	/**
	 * @Flow\Inject
	 * @var ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @Flow\Inject
	 * @var PolicyService
	 */
	protected $policyService;

	/**
	 * @Flow\Inject
	 * @var ObjectManager
	 */
	protected $entityManager;

	/**
	 * @Flow\Inject
	 * @var PersistenceManager
	 */
	protected $persistenceManager;

	/**
	 * Raw parameter values
	 *
	 * @var array
	 */
	protected $parameters = array();

	/**
	 * @param string $path Property path the currently parsed expression relates to
	 */
	public function __construct($path) {
		$this->path = $path;
	}

	/**
	 * @param string|array $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 */
	public function equals($operandDefinition) {
		$this->operator = '==';
		$this->operandDefinition = $operandDefinition;
		$this->operand = $this->getValueForOperand($operandDefinition);
		return $this;
	}

	/**
	 * @param string|array $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 */
	public function notEquals($operandDefinition) {
		$this->operator = '!=';
		$this->operandDefinition = $operandDefinition;
		$this->operand = $this->getValueForOperand($operandDefinition);
		return $this;
	}

	/**
	 * @param mixed $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 */
	public function lessThan($operandDefinition) {
		$this->operator = '<';
		$this->operandDefinition = $operandDefinition;
		$this->operand = $this->getValueForOperand($operandDefinition);
		return $this;
	}

	/**
	 * @param mixed $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 */
	public function lessOrEqual($operandDefinition) {
		$this->operator = '<=';
		$this->operandDefinition = $operandDefinition;
		$this->operand = $this->getValueForOperand($operandDefinition);
		return $this;
	}

	/**
	 * @param mixed $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 */
	public function greaterThan($operandDefinition) {
		$this->operator = '>';
		$this->operandDefinition = $operandDefinition;
		$this->operand = $this->getValueForOperand($operandDefinition);
		return $this;
	}

	/**
	 * @param mixed $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 */
	public function greaterOrEqual($operandDefinition) {
		$this->operator = '>=';
		$this->operandDefinition = $operandDefinition;
		$this->operand = $this->getValueForOperand($operandDefinition);
		return $this;
	}

	/**
	 * @param mixed $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 */
	public function like($operandDefinition) {
		$this->operator = 'like';
		$this->operandDefinition = $operandDefinition;
		$this->operand = $this->getValueForOperand($operandDefinition);
		return $this;
	}

	/**
	 * @param mixed $operandDefinition
	 * @return PropertyConditionGenerator the current instance to allow for method chaining
	 * @throws InvalidPolicyException
	 */
	public function in($operandDefinition) {
		$this->operator = 'in';
		$this->operand = $this->getValueForOperand($operandDefinition);

		if (is_array($this->operand) === FALSE && ($this->operand instanceof \Traversable) === FALSE) {
			throw new InvalidPolicyException(sprintf('The "in" operator needs an array as operand! Got: "%s"', $this->operand), 1416313526);
		}
		foreach ($this->operand as $iterator => $singleOperandValueDefinition) {
			$this->operandDefinition['inOperandValue' . $iterator] = $singleOperandValueDefinition;
		}
		return $this;
	}

	/**
	 * @param DoctrineSqlFilter $sqlFilter
	 * @param ClassMetadata $targetEntity
	 * @param string $targetTableAlias
	 * @return string
	 * @throws InvalidQueryRewritingConstraintException
	 * @throws \Exception
	 */
	public function getSql(DoctrineSqlFilter $sqlFilter, ClassMetadata $targetEntity, $targetTableAlias) {
		$targetEntityPropertyName = (strpos($this->path, '.') ? substr($this->path, 0, strpos($this->path, '.')) : $this->path);
		$quoteStrategy = $this->entityManager->getConfiguration()->getQuoteStrategy();

		if ($targetEntity->hasAssociation($targetEntityPropertyName) === FALSE) {
			return $this->getSqlForSimpleProperty($sqlFilter, $quoteStrategy, $targetEntity, $targetTableAlias, $targetEntityPropertyName);
		}

		elseif (strstr($this->path, '.') === FALSE && $targetEntity->isSingleValuedAssociation($targetEntityPropertyName) === TRUE && $targetEntity->isAssociationInverseSide($targetEntityPropertyName) === FALSE) {
			return $this->getSqlForManyToOneAndOneToOneRelationsWithoutPropertyPath($sqlFilter, $quoteStrategy, $targetEntity, $targetTableAlias, $targetEntityPropertyName);
		}

		elseif ($targetEntity->isSingleValuedAssociation($targetEntityPropertyName) === TRUE && $targetEntity->isAssociationInverseSide($targetEntityPropertyName) === FALSE) {
			return $this->getSqlForManyToOneAndOneToOneRelationsWithPropertyPath($sqlFilter, $quoteStrategy, $targetEntity, $targetTableAlias, $targetEntityPropertyName);
		}

		elseif ($targetEntity->isSingleValuedAssociation($targetEntityPropertyName) === TRUE && $targetEntity->isAssociationInverseSide($targetEntityPropertyName) === TRUE) {
			throw new InvalidQueryRewritingConstraintException('Single valued properties from the inverse side are not supported in a content security constraint path! Got: "' . $this->path . ' ' . $this->operator . ' ' . $this->operandDefinition .  '"', 1416397754);
		}

		elseif ($targetEntity->isCollectionValuedAssociation($targetEntityPropertyName) === TRUE) {
			throw new InvalidQueryRewritingConstraintException('Multivalued properties are not supported in a content security constraint path! Got: "' . $this->path . ' ' . $this->operator . ' ' . $this->operandDefinition .  '"', 1416397655);
		}

		throw new InvalidQueryRewritingConstraintException('The configured operator of the entity constraint is not valid/supported. Got: ' . $this->operator, 1270483540);
	}

	/**
	 * @param DoctrineSqlFilter $sqlFilter
	 * @param QuoteStrategy $quoteStrategy
	 * @param ClassMetadata $targetEntity
	 * @param string $targetTableAlias
	 * @param string $targetEntityPropertyName
	 * @return string
	 * @throws InvalidQueryRewritingConstraintException
	 * @throws \Exception
	 */
	protected function getSqlForSimpleProperty(DoctrineSqlFilter $sqlFilter, QuoteStrategy $quoteStrategy, ClassMetadata $targetEntity, $targetTableAlias, $targetEntityPropertyName) {
		$quotedColumnName = $quoteStrategy->getColumnName($targetEntityPropertyName, $targetEntity, $this->entityManager->getConnection()->getDatabasePlatform());
		$propertyPointer = $targetTableAlias . '.' . $quotedColumnName;

		if (is_array($this->operandDefinition)) {
			foreach ($this->operandDefinition as $operandIterator => $singleOperandValue) {
				$this->setParameter($sqlFilter, $operandIterator, $singleOperandValue);
			}
		} else {
			$this->setParameter($sqlFilter, $this->operandDefinition, $this->operand);
		}
		return $this->getConstraintStringForSimpleProperty($sqlFilter, $propertyPointer);
	}

	/**
	 * @param DoctrineSqlFilter $sqlFilter
	 * @param QuoteStrategy $quoteStrategy
	 * @param ClassMetadata $targetEntity
	 * @param string $targetTableAlias
	 * @param string $targetEntityPropertyName
	 * @return string
	 * @throws InvalidQueryRewritingConstraintException
	 * @throws \Exception
	 */
	protected function getSqlForManyToOneAndOneToOneRelationsWithoutPropertyPath(DoctrineSqlFilter $sqlFilter, QuoteStrategy $quoteStrategy, ClassMetadata $targetEntity, $targetTableAlias, $targetEntityPropertyName) {
		$associationMapping = $targetEntity->getAssociationMapping($targetEntityPropertyName);

		$constraints = array();
		foreach ($associationMapping['joinColumns'] as $joinColumn) {
			$quotedColumnName = $quoteStrategy->getJoinColumnName($joinColumn, $targetEntity, $this->entityManager->getConnection()->getDatabasePlatform());
			$propertyPointer = $targetTableAlias . '.' . $quotedColumnName;

			$operandAlias = $this->operandDefinition;
			if (is_array($this->operandDefinition)) {
				$operandAlias = key($this->operandDefinition);
			}
			$currentReferencedOperandName = $operandAlias . $joinColumn['referencedColumnName'];
			if (is_object($this->operand)) {
				$operandMetadataInfo = $this->entityManager->getClassMetadata(TypeHandling::getTypeForValue($this->operand));
				$currentReferencedValueOfOperand = $operandMetadataInfo->getFieldValue($this->operand, $operandMetadataInfo->getFieldForColumn($joinColumn['referencedColumnName']));
				$this->setParameter($sqlFilter, $currentReferencedOperandName, $currentReferencedValueOfOperand, $associationMapping['type']);

			} elseif (is_array($this->operandDefinition)) {
				foreach ($this->operandDefinition as $operandIterator => $singleOperandValue) {
					if (is_object($singleOperandValue)) {
						$operandMetadataInfo = $this->entityManager->getClassMetadata(TypeHandling::getTypeForValue($singleOperandValue));
						$currentReferencedValueOfOperand = $operandMetadataInfo->getFieldValue($singleOperandValue, $operandMetadataInfo->getFieldForColumn($joinColumn['referencedColumnName']));
						$this->setParameter($sqlFilter, $operandIterator, $currentReferencedValueOfOperand, $associationMapping['type']);
					} elseif ($singleOperandValue === NULL) {
						$this->setParameter($sqlFilter, $operandIterator, NULL, $associationMapping['type']);
					}
				}
			}

			$constraints[] = $this->getConstraintStringForSimpleProperty($sqlFilter, $propertyPointer, $currentReferencedOperandName);
		}
		return ' (' . implode(' ) AND ( ', $constraints) . ') ';
	}

	/**
	 * @param DoctrineSqlFilter $sqlFilter
	 * @param QuoteStrategy $quoteStrategy
	 * @param ClassMetadata $targetEntity
	 * @param string $targetTableAlias
	 * @param string $targetEntityPropertyName
	 * @return string
	 * @throws InvalidQueryRewritingConstraintException
	 * @throws \Exception
	 */
	protected function getSqlForManyToOneAndOneToOneRelationsWithPropertyPath(DoctrineSqlFilter $sqlFilter, QuoteStrategy $quoteStrategy, ClassMetadata $targetEntity, $targetTableAlias, $targetEntityPropertyName) {
		$subselectQuery = $this->getSubselectQuery($targetEntity, $targetEntityPropertyName);

		$associationMapping = $targetEntity->getAssociationMapping($targetEntityPropertyName);

		$subselectConstraintQueries = array();
		foreach ($associationMapping['joinColumns'] as $joinColumn) {
			$rootAliases = $subselectQuery->getQueryBuilder()->getRootAliases();
			$subselectQuery->getQueryBuilder()->select($rootAliases[0] . '.' . $targetEntity->getFieldForColumn($joinColumn['referencedColumnName']));
			$subselectSql = $subselectQuery->getSql();
			foreach ($subselectQuery->getParameters() as $parameter) {
				$parameterValue = $parameter->getValue();
				if (is_object($parameterValue)) {
					$parameterValue = $this->persistenceManager->getIdentifierByObject($parameter->getValue());
				}
				$subselectSql = preg_replace('/\?/', $this->entityManager->getConnection()->quote($parameterValue, $parameter->getType()), $subselectSql, 1);
			}
			$quotedColumnName = $quoteStrategy->getJoinColumnName($joinColumn, $targetEntity, $this->entityManager->getConnection()->getDatabasePlatform());
			$subselectIdentifier = 'subselect' . md5($subselectSql);
			$subselectConstraintQueries[] = $targetTableAlias . '.' . $quotedColumnName . ' IN (SELECT ' . $subselectIdentifier . '.' . $joinColumn['referencedColumnName'] . '0 FROM (' . $subselectSql . ') AS ' . $subselectIdentifier . ' ) ';
		}

		return ' (' . implode(' ) AND ( ', $subselectConstraintQueries) . ') ';
	}

	/**
	 * @param ClassMetadata $targetEntity
	 * @param string $targetEntityPropertyName
	 * @return Query
	 */
	protected function getSubselectQuery(ClassMetadata $targetEntity, $targetEntityPropertyName) {
		$subselectQuery = new Query($targetEntity->getAssociationTargetClass($targetEntityPropertyName));
		$propertyName = str_replace($targetEntityPropertyName . '.', '', $this->path);

		switch ($this->operator) {
			case '==':
				$subselectConstraint = $subselectQuery->equals($propertyName, $this->operand);
				break;
			case '!=':
				$subselectConstraint = $subselectQuery->logicalNot($subselectQuery->equals($propertyName, $this->operand));
				break;
			case '<':
				$subselectConstraint = $subselectQuery->lessThan($propertyName, $this->operand);
				break;
			case '>':
				$subselectConstraint = $subselectQuery->greaterThan($propertyName, $this->operand);
				break;
			case '<=':
				$subselectConstraint = $subselectQuery->lessThanOrEqual($propertyName, $this->operand);
				break;
			case '>=':
				$subselectConstraint = $subselectQuery->greaterThanOrEqual($propertyName, $this->operand);
				break;
			case 'like':
				$subselectConstraint = $subselectQuery->like($propertyName, $this->operand);
				break;
			case 'in':
				$subselectConstraint = $subselectQuery->in($propertyName, $this->operand);
				break;
		}

		$subselectQuery->matching($subselectConstraint);
		return $subselectQuery;
	}

	/**
	 * @param SQLFilter $sqlFilter
	 * @param string $propertyPointer
	 * @param string $operandDefinition
	 * @return string
	 */
	protected function getConstraintStringForSimpleProperty(SQLFilter $sqlFilter, $propertyPointer, $operandDefinition = NULL) {
		$operandDefinition = ($operandDefinition === NULL ? $this->operandDefinition : $operandDefinition);
		$parameter = NULL;
		$addNullExpression = FALSE;
		try {
			if (is_array($this->operandDefinition)) {
				$parameters = array();
				foreach ($this->operandDefinition as $operandIterator => $singleOperandValue) {
					if ($singleOperandValue !== NULL) {
						$parameters[] = $sqlFilter->getParameter($operandIterator);
					} else {
						$addNullExpression = TRUE;
					}
				}
				$parameter = implode(',', $parameters);
			} elseif ($this->getRawParameterValue($operandDefinition) !== NULL) {
				$parameter = $sqlFilter->getParameter($operandDefinition);
			}
		} catch (\InvalidArgumentException $e) {}

		if ($parameter === NULL || $parameter === '') {
			$addNullExpression = TRUE;
		}

		switch ($this->operator) {
			case '==':
				return ($parameter === NULL ? $propertyPointer . ' IS NULL' : $propertyPointer . ' = ' . $parameter);
				break;
			case '!=':
				return ($parameter === NULL ? $propertyPointer . ' IS NOT NULL' : $propertyPointer . ' <> ' . $parameter);
				break;
			case '<':
				return $propertyPointer . ' < ' . $parameter;
				break;
			case '>':
				return $propertyPointer . ' > ' . $parameter;
				break;
			case '<=':
				return $propertyPointer . ' <= ' . $parameter;
				break;
			case '>=':
				return $propertyPointer . ' >= ' . $parameter;
				break;
			case 'like':
				return $propertyPointer . ' LIKE ' . $parameter;
				break;
			case 'in':
				$inPart = $parameter !== NULL && $parameter !== '' ? $propertyPointer . ' IN (' . $parameter . ') ' : '';
				$nullPart = $addNullExpression ? $propertyPointer . ' IS NULL' : '';
				return $inPart . ($inPart !== '' && $nullPart !== '' ? ' OR ' : '') . $nullPart;
				break;
		}
	}

	/**
	 * Returns the static value of the given operand, this might be also a global object
	 *
	 * @param mixed $expression The expression string representing the operand
	 * @return mixed The calculated value
	 */
	public function getValueForOperand($expression) {
		if (is_array($expression)) {
			$result = array();
			foreach ($expression as $expressionEntry) {
				$result[] = $this->getValueForOperand($expressionEntry);
			}
			return $result;
		} elseif (is_numeric($expression)) {
			return $expression;
		} elseif ($expression === TRUE) {
			return TRUE;
		} elseif ($expression === FALSE) {
			return FALSE;
		} elseif ($expression === NULL) {
			return NULL;
		} elseif (strpos($expression, 'context.') === 0) {
			$objectAccess = explode('.', $expression, 3);
			$globalObjectsRegisteredClassName = $this->globalObjects[$objectAccess[1]];
			$globalObject = $this->objectManager->get($globalObjectsRegisteredClassName);
			return $this->getObjectValueByPath($globalObject, $objectAccess[2]);
		} else {
			return trim($expression, '"\'');
		}
	}

	/**
	 * @param DoctrineSqlFilter $sqlFilter
	 * @param mixed $name
	 * @param mixed $value
	 * @param string $type
	 * @return void
	 */
	protected function setParameter(DoctrineSqlFilter $sqlFilter, $name, $value, $type = NULL) {
		$sqlFilter->setParameter($name, $value, $type);
		$this->parameters[$name] = $value;
	}

	/**
	 * @param mixed $name
	 * @return mixed the raw parameter value
	 */
	protected function getRawParameterValue($name) {
		if (isset($this->parameters[$name]) === FALSE) {
			throw new \InvalidArgumentException('Paremeter "' . $name . '" does not exist.', 1435830434);
		}

		return $this->parameters[$name];
	}

	/**
	 * Redirects directly to \TYPO3\Flow\Reflection\ObjectAccess::getPropertyPath($result, $propertyPath)
	 * This is only needed for unit tests!
	 *
	 * @param mixed $object The object to fetch the property from
	 * @param string $path The path to the property to be fetched
	 * @return mixed The property value
	 */
	public function getObjectValueByPath($object, $path) {
		return ObjectAccess::getPropertyPath($object, $path);
	}
}
namespace TYPO3\Flow\Security\Authorization\Privilege\Entity\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A sql generator to create a sql condition for an entity property.
 */
class PropertyConditionGenerator extends PropertyConditionGenerator_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 * @param string $path Property path the currently parsed expression relates to
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $path in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		call_user_func_array('parent::__construct', $arguments);
		if ('TYPO3\Flow\Security\Authorization\Privilege\Entity\Doctrine\PropertyConditionGenerator' === get_class($this)) {
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Security\Authorization\Privilege\Entity\Doctrine\PropertyConditionGenerator');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Security\Authorization\Privilege\Entity\Doctrine\PropertyConditionGenerator', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Security\Authorization\Privilege\Entity\Doctrine\PropertyConditionGenerator', $propertyName, 'var');
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
		$securityContext_reference = &$this->securityContext;
		$this->securityContext = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Security\Context');
		if ($this->securityContext === NULL) {
			$this->securityContext = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('48836470c14129ade5f39e28c4816673', $securityContext_reference);
			if ($this->securityContext === NULL) {
				$this->securityContext = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('48836470c14129ade5f39e28c4816673',  $securityContext_reference, 'TYPO3\Flow\Security\Context', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Context'); });
			}
		}
		$objectManager_reference = &$this->objectManager;
		$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Object\ObjectManagerInterface');
		if ($this->objectManager === NULL) {
			$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('0c3c44be7be16f2a287f1fb2d068dde4', $objectManager_reference);
			if ($this->objectManager === NULL) {
				$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('0c3c44be7be16f2a287f1fb2d068dde4',  $objectManager_reference, 'TYPO3\Flow\Object\ObjectManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'); });
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
		$entityManager_reference = &$this->entityManager;
		$this->entityManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('Doctrine\Common\Persistence\ObjectManager');
		if ($this->entityManager === NULL) {
			$this->entityManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('ea59127cf49656654065ffe160cf78e1', $entityManager_reference);
			if ($this->entityManager === NULL) {
				$this->entityManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('ea59127cf49656654065ffe160cf78e1',  $entityManager_reference, 'Doctrine\Common\Persistence\ObjectManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('Doctrine\Common\Persistence\ObjectManager'); });
			}
		}
		$persistenceManager_reference = &$this->persistenceManager;
		$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Persistence\Doctrine\PersistenceManager');
		if ($this->persistenceManager === NULL) {
			$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('b63efa96a07658d1ba5faee305d8b9bf', $persistenceManager_reference);
			if ($this->persistenceManager === NULL) {
				$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('b63efa96a07658d1ba5faee305d8b9bf',  $persistenceManager_reference, 'TYPO3\Flow\Persistence\Doctrine\PersistenceManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\Doctrine\PersistenceManager'); });
			}
		}
		$this->globalObjects = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager')->getConfiguration('Settings', 'TYPO3.Flow.aop.globalObjects');
$this->Flow_Injected_Properties = array (
  0 => 'securityContext',
  1 => 'objectManager',
  2 => 'policyService',
  3 => 'entityManager',
  4 => 'persistenceManager',
  5 => 'globalObjects',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Security/Authorization/Privilege/Entity/Doctrine/PropertyConditionGenerator.php
#