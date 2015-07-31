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
 * A compiling expression parser
 *
 * The matcher functions will generate PHP code according to the expressions.
 * Method calls and object / array access are wrapped using the Context object.
 */
class CompilingEelParser_Original extends EelParser {

	/**
	 * @var integer
	 */
	protected $tmpId = 0;

	public function NumberLiteral__finalise(&$self) {
		$self['code'] = $self['text'];
	}

	public function StringLiteral_SingleQuotedStringLiteral(&$result, $sub) {
		$result['code'] = $sub['text'];
	}

	/**
	 * Evaluate a double quoted string literal
	 *
	 * We need to replace the double quoted string with a
	 *
	 * @param array $result
	 * @param array $sub
	 */
	public function StringLiteral_DoubleQuotedStringLiteral(&$result, $sub) {
		$result['code'] = '\'' . substr(str_replace(array('\'', '\\"'), array('\\\'', '"'), $sub['text']), 1, -1) . '\'';
	}

	public function BooleanLiteral__finalise(&$result) {
		$result['code'] = strtoupper($result['text']);
	}

	public function OffsetAccess_Expression(&$result, $sub) {
		$result['index'] = $sub['code'];
	}

	public function MethodCall_Identifier(&$result, $sub) {
		$result['method'] = '\'' . $sub['text'] . '\'';
	}
	public function MethodCall_Expression(&$result, $sub) {
		$result['arguments'][] = $sub['code'];
	}

	public function ObjectPath_Identifier(&$result, $sub) {
		$path = $sub['text'];
		if (!array_key_exists('code', $result)) {
			$result['code'] = '$context';
		}
		$result['code'] = $result['code'] . '->getAndWrap(\'' . $path . '\')';
	}

	public function ObjectPath_OffsetAccess(&$result, $sub) {
		$path = $sub['index'];
		$result['code'] = $result['code'] . '->getAndWrap(' . $path . ')';
	}

	public function ObjectPath_MethodCall(&$result, $sub) {
		$arguments = isset($sub['arguments']) ? $sub['arguments'] : array();
		if (!array_key_exists('code', $result)) {
			$result['code'] = '$context';
		}
		$result['code'] = $result['code'] . '->callAndWrap(' . $sub['method'] . ', array(' . implode(',', $arguments) . '))';
	}

	public function Term_term(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function Expression_exp(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function SimpleExpression_term(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function WrappedExpression_Expression(&$result, $sub) {
		$result['code'] = '(' . $sub['code'] . ')';
	}

	public function NotExpression_exp(&$result, $sub) {
		$result['code'] = '(!' . $this->unwrapExpression($sub['code']) . ')';
	}

	public function ArrayLiteral_Expression(&$result, $sub) {
		if (!isset($result['code'])) {
			$result['code'] = '$context->wrap(array())';
		}
		$result['code'] .= '->push(' . $sub['code'] . ')';
	}

	public function ArrayLiteral__finalise(&$result) {
		if (!isset($result['code'])) {
			$result['code'] = '$context->wrap(array())';
		}
	}

	public function ObjectLiteralProperty_Identifier(&$result, $sub) {
		$result['code'] = '\'' . $sub['text'] . '\'';
	}

	public function ObjectLiteralProperty_StringLiteral(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function ObjectLiteral_ObjectLiteralProperty(&$result, $sub) {
		if (!isset($result['code'])) {
			$result['code'] = '$context->wrap(array())';
		}
		$result['code'] .= '->push(' . $sub['value']['code'] . ',' . $sub['key']['code'] . ')';
	}

	public function ObjectLiteral__finalise(&$result) {
		if (!isset($result['code'])) {
			$result['code'] = '$context->wrap(array())';
		}
	}

	public function Disjunction_lft(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function Disjunction_rgt(&$result, $sub) {
		$tmpVarName = '$_' . $this->tmpId++;

		$result['code'] = '((' . $tmpVarName . '=' . $this->unwrapExpression($result['code']) .  ')?' . $tmpVarName . ':' . $this->unwrapExpression($sub['code']) . ')';
	}

	public function Conjunction_lft(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function Conjunction_rgt(&$result, $sub) {
		$tmpVarName = '$_' . $this->tmpId++;

		$result['code'] = '((' . $tmpVarName . '=' . $this->unwrapExpression($result['code']) .  ')?(' . $this->unwrapExpression($sub['code']) . '):' . $tmpVarName .')';
	}

	public function Comparison_lft(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function Comparison_comp(&$result, $sub) {
		$result['comp'] = $sub['text'];
	}

	/**
	 * Return an expression that unwraps the given expression
	 * if it is a Context object.
	 *
	 * @param string $expression
	 * @return string
	 */
	protected function unwrapExpression($expression) {
		$varName = '$_' . $this->tmpId++;
		return '((' . $varName . '=' . $expression . ') instanceof \TYPO3\Eel\Context?' . $varName . '->unwrap():' . $varName . ')';
	}

	public function Comparison_rgt(&$result, $sub) {
		$lval = $this->unwrapExpression($result['code']);
		$rval = $this->unwrapExpression($sub['code']);

		switch ($result['comp']) {
		case '==':
			$result['code'] = '(' . $lval . ')===(' . $rval . ')';
			break;
		case '!=':
			$result['code'] = '(' . $lval . ')!==(' . $rval . ')';
			break;
		case '<':
			$result['code'] = '(' . $lval . ')<(' . $rval . ')';
			break;
		case '<=':
			$result['code'] = '(' . $lval . ')<=(' . $rval . ')';
			break;
		case '>':
			$result['code'] = '(' . $lval . ')>(' . $rval . ')';
			break;
		case '>=':
			$result['code'] = '(' . $lval . ')>=(' . $rval . ')';
			break;
		default:
			throw new ParserException('Unexpected comparison operator "' . $result['comp'] . '"', 1344512571);
		}
	}

	public function SumCalculation_lft(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function SumCalculation_op(&$result, $sub) {
		$result['op'] = $sub['text'];
	}

	public function SumCalculation_rgt(&$result, $sub) {
		$rval = $this->unwrapExpression($sub['code']);
		$lval = $this->unwrapExpression($result['code']);

		switch ($result['op']) {
		case '+':
			$xVarName = '$_x_' . $this->tmpId++;
			$yVarName = '$_y_' . $this->tmpId++;
			$result['code'] = '(is_string(' . $xVarName . '=' . $lval . ')|is_string(' . $yVarName . '=' . $rval . '))?(' . $xVarName . ' . ' . $yVarName . '):(' . $xVarName . '+' . $yVarName . ')';
			break;
		case '-':
			$result['code'] = $lval . '-' .  $rval;
			break;
		default:
			throw new ParserException('Unexpected operator "' . $result['op'] . '"', 1344512602);
		}
	}

	public function ProdCalculation_lft(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function ProdCalculation_op(&$result, $sub) {
		$result['op'] = $sub['text'];
	}

	public function ProdCalculation_rgt(&$result, $sub) {
		$rval = $this->unwrapExpression($sub['code']);
		$lval = $this->unwrapExpression($result['code']);

		switch ($result['op']) {
		case '/':
			$result['code'] = $lval . '/' . $rval;
			break;
		case '*':
			$result['code'] = $lval . '*' . $rval;
			break;
		case '%':
			$result['code'] = $lval . '%' . $rval;
			break;
		default:
			throw new ParserException('Unexpected operator "' . $result['op'] . '"', 1344512641);
		}
	}

	public function ConditionalExpression_cond(&$result, $sub) {
		$result['code'] = $sub['code'];
	}

	public function ConditionalExpression_then(&$result, $sub) {
		$result['code'] = '(' . $this->unwrapExpression($result['code']) . '?(' . $sub['code'] . ')';
	}

	public function ConditionalExpression_else(&$result, $sub) {
		$result['code'] .= ':(' . $sub['code'] . '))';
	}

}
namespace TYPO3\Eel;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A compiling expression parser
 * 
 * The matcher functions will generate PHP code according to the expressions.
 * Method calls and object / array access are wrapped using the Context object.
 */
class CompilingEelParser extends CompilingEelParser_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $string in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Eel\CompilingEelParser');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Eel\CompilingEelParser', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Eel\CompilingEelParser', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Eel/Classes/TYPO3/Eel/CompilingEelParser.php
#