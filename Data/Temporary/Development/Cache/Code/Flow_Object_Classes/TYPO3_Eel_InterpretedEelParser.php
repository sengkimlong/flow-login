<?php 
namespace TYPO3\Eel;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Eel".             *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * An interpreting expression parser
 *
 * The matcher functions attached to the rules interpret the result
 * given the context in the constructor.
 */
class InterpretedEelParser_Original extends EelParser {

	/**
	 * @var \TYPO3\Eel\Context
	 */
	protected $context;

	/**
	 * @param string $string
	 * @param \TYPO3\Eel\Context $context The context to interpret
	 */
	public function __construct($string, $context) {
		parent::__construct($string);
		$this->context = $context;
	}

	public function NumberLiteral__finalise(&$self) {
		if (isset($self['dec'])) {
			$self['val'] = (float)($self['text']);
		} else {
			$self['val'] = (integer)$self['text'];
		}
	}

	public function BooleanLiteral__finalise(&$result) {
		$result['val'] = strtolower($result['text']) === 'true';
	}

	public function OffsetAccess_Expression(&$result, $sub) {
		$result['index'] = $sub['val'];
	}

	public function MethodCall_Identifier(&$result, $sub) {
		$result['method'] = $sub['text'];
	}
	public function MethodCall_Expression(&$result, $sub) {
		$result['arguments'][] = $sub['val'];
	}

	public function ObjectPath_Identifier(&$result, $sub) {
		$path = $sub['text'];
		if (!array_key_exists('val', $result)) {
			$result['val'] = $this->context;
		}
		$result['val'] = $result['val']->getAndWrap($path);
	}

	public function ObjectPath_OffsetAccess(&$result, $sub) {
		$path = $sub['index'];
		$result['val'] = $result['val']->getAndWrap($path);
	}

	public function ObjectPath_MethodCall(&$result, $sub) {
		$arguments = isset($sub['arguments']) ? $sub['arguments'] : array();
		if (!array_key_exists('val', $result)) {
			$result['val'] = $this->context;
		}
		$result['val'] = $result['val']->callAndWrap($sub['method'], $arguments);
	}

	public function Term_term(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function Expression_exp(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function SimpleExpression_term(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function WrappedExpression_Expression(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function NotExpression_exp(&$result, $sub) {
		$result['val'] = !(boolean)$sub['val'];
	}

	public function ArrayLiteral_Expression(&$result, $sub) {
		if (!isset($result['val'])) {
			$result['val'] = new Context(array());
		}
		$result['val']->push($sub['val']);
	}

	public function ArrayLiteral__finalise(&$result) {
		if (!isset($result['val'])) {
			$result['val'] = new Context(array());
		}
	}

	public function ObjectLiteralProperty_Identifier(&$result, $sub) {
		$result['val'] = $sub['text'];
	}

	public function ObjectLiteralProperty_StringLiteral(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function ObjectLiteral_ObjectLiteralProperty(&$result, $sub) {
		if (!isset($result['val'])) {
			$result['val'] = new Context(array());
		}
		$result['val']->push($sub['value']['val'], $sub['key']['val']);
	}

	public function ObjectLiteral__finalise(&$result) {
		if (!isset($result['val'])) {
			$result['val'] = new Context(array());
		}
	}

	public function Disjunction_lft(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function Disjunction_rgt(&$result, $sub) {
		$lft = $this->unwrap($result['val']);
		$rgt = $this->unwrap($sub['val']);
		$result['val'] = $lft ? $lft : $rgt;
	}

	public function Conjunction_lft(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function Conjunction_rgt(&$result, $sub) {
		$lft = $this->unwrap($result['val']);
		$rgt = $this->unwrap($sub['val']);
		$result['val'] = $lft ? $rgt : $lft;
	}

	public function Comparison_lft(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function Comparison_comp(&$result, $sub) {
		$result['comp'] = $sub['text'];
	}

	public function Comparison_rgt(&$result, $sub) {
		$lval = $this->unwrap($result['val']);
		$rval = $this->unwrap($sub['val']);

		switch ($result['comp']) {
		case '==':
			$result['val'] = $lval === $rval;
			break;
		case '!=':
			$result['val'] = $lval !== $rval;
			break;
		case '<':
			$result['val'] = $lval < $rval;
			break;
		case '<=':
			$result['val'] = $lval <= $rval;
			break;
		case '>':
			$result['val'] = $lval > $rval;
			break;
		case '>=':
			$result['val'] = $lval >= $rval;
			break;
		default:
			throw new ParserException('Unknown comparison operator "' . $result['comp'] . '"', 1344512487);
		}
	}

	public function SumCalculation_lft(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function SumCalculation_op(&$result, $sub) {
		$result['op'] = $sub['text'];
	}

	public function SumCalculation_rgt(&$result, $sub) {
		$lval = $result['val'];
		$rval = $sub['val'];

		switch ($result['op']) {
		case '+':
			if (is_string($lval) || is_string($rval)) {
				// Do not unwrap here and use better __toString handling of Context
				$result['val'] = $lval . $rval;
			} else {
				$result['val'] = $this->unwrap($lval) + $this->unwrap($rval);
			}
			break;
		case '-':
			$result['val'] = $this->unwrap($lval) - $this->unwrap($rval);
			break;
		}
	}

	public function ProdCalculation_lft(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function ProdCalculation_op(&$result, $sub) {
		$result['op'] = $sub['text'];
	}

	public function ProdCalculation_rgt(&$result, $sub) {
		$lval = $this->unwrap($result['val']);
		$rval = $this->unwrap($sub['val']);

		switch ($result['op']) {
		case '/':
			$result['val'] = $lval / $rval;
			break;
		case '*':
			$result['val'] = $lval * $rval;
			break;
		case '%':
			$result['val'] = $lval % $rval;
			break;
		}
	}

	public function ConditionalExpression_cond(&$result, $sub) {
		$result['val'] = $sub['val'];
	}

	public function ConditionalExpression_then(&$result, $sub) {
		$result['then'] = $sub['val'];
	}

	public function ConditionalExpression_else(&$result, $sub) {
		if ((boolean)$this->unwrap($result['val'])) {
			$result['val'] = $result['then'];
		} else {
			$result['val'] = $sub['val'];
		}
	}

	/**
	 * If $value is an instance of Context, the result of unwrap()
	 * is returned, otherwise $value is returned unchanged.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	protected function unwrap($value) {
		if ($value instanceof Context) {
			return $value->unwrap();
		} else {
			return $value;
		}
	}

}
namespace TYPO3\Eel;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * An interpreting expression parser
 * 
 * The matcher functions attached to the rules interpret the result
 * given the context in the constructor.
 */
class InterpretedEelParser extends InterpretedEelParser_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 * @param string $string
	 * @param \TYPO3\Eel\Context $context The context to interpret
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(1, $arguments)) $arguments[1] = NULL;
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $string in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		if (!array_key_exists(1, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $context in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Eel\InterpretedEelParser');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Eel\InterpretedEelParser', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Eel\InterpretedEelParser', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Eel/Classes/TYPO3/Eel/InterpretedEelParser.php
#