<?php 
namespace TYPO3\Flow\Cli;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * A CLI specific response implementation
 *
 */
class Response_Original extends \TYPO3\Flow\Mvc\Response {

	/**
	 * Constants for output styles
	 */
	const STYLE_BRIGHT = 1;
	const STYLE_FAINT = 2;
	const STYLE_ITALIC = 3;
	const STYLE_UNDERLINED = 4;
	const STYLE_INVERSE = 7;
	const STYLE_STRIKETHROUGH = 9;
	const STYLE_ERROR = 31;
	const STYLE_SUCCESS = 32;

	/**
	 * Constants for output formats
	 */
	const OUTPUTFORMAT_RAW = 1;
	const OUTPUTFORMAT_PLAIN = 2;
	const OUTPUTFORMAT_STYLED = 3;

	/**
	 * @var integer
	 */
	private $exitCode = 0;

	/**
	 * @var
	 */
	private $colorSupport;

	/**
	 * @var
	 */
	private $outputFormat = self::OUTPUTFORMAT_STYLED;

	/**
	 * Sets the numerical exit code which should be returned when exiting this application.
	 *
	 * @param integer $exitCode
	 * @return void
	 * @throws \InvalidArgumentException
	 * @api
	 */
	public function setExitCode($exitCode) {
		if (!is_integer($exitCode)) {
			throw new \InvalidArgumentException(sprintf('Tried to set invalid exit code. The value must be integer, %s given.', gettype($exitCode)), 1312222064);
		}
		$this->exitCode = $exitCode;
	}

	/**
	 * Gets the numerical exit code which should be returned when exiting this application.
	 *
	 * @return integer
	 * @api
	 */
	public function getExitCode() {
		return $this->exitCode;
	}

	/**
	 * Sets color support / styled output to yes, no or auto detection
	 *
	 * @param boolean $colorSupport TRUE, FALSE or NULL (= autodetection)
	 * @return void
	 */
	public function setColorSupport($colorSupport) {
		$this->colorSupport = $colorSupport;
	}

	/**
	 * Tells if the response content should be styled on send().
	 *
	 * Regardless of this setting content will only be styled with output format
	 * set to "styled".
	 *
	 * @return boolean TRUE if the terminal support ANSI colors, otherwise FALSE
	 */
	public function hasColorSupport() {
		if ($this->colorSupport !== NULL) {
			return $this->colorSupport;
		}
		if (DIRECTORY_SEPARATOR !== '\\') {
			return function_exists('posix_isatty') && posix_isatty(STDOUT);
		} else {
			return getenv('ANSICON') !== FALSE;
		}
	}

	/**
	 * Sets the desired output format.
	 *
	 * @param integer $outputFormat One of the OUTPUTFORMAT_* constants
	 * @return void
	 */
	public function setOutputFormat($outputFormat) {
		$this->outputFormat = $outputFormat;
	}

	/**
	 * Returns the currently set output format.
	 *
	 * @return integer One of the OUTPUTFORMAT_* constants
	 */
	public function getOutputFormat() {
		return $this->outputFormat;
	}

	/**
	 * Sends the response
	 *
	 * @return void
	 * @api
	 */
	public function send() {
		if ($this->content === NULL) {
			return;
		}

		if ($this->outputFormat === self::OUTPUTFORMAT_RAW) {
			echo $this->content;
			return;
		}

		if ($this->outputFormat === self::OUTPUTFORMAT_PLAIN) {
			echo strip_tags($this->content);
			return;
		}

		$content = $this->getContent();
		if ($this->hasColorSupport() === TRUE) {
			$content =  preg_replace('|\<b>(((?!\</b>).)*)\</b>|', "\x1B[" . self::STYLE_BRIGHT . "m\$1\x1B[0m", $content);
			$content =  preg_replace('|\<i>(((?!\</i>).)*)\</i>|', "\x1B[" . self::STYLE_ITALIC . "m\$1\x1B[0m", $content);
			$content =  preg_replace('|\<u>(((?!\</u>).)*)\</u>|', "\x1B[" . self::STYLE_UNDERLINED . "m\$1\x1B[0m", $content);
			$content =  preg_replace('|\<em>(((?!\</em>).)*)\</em>|', "\x1B[" . self::STYLE_INVERSE . "m\$1\x1B[0m", $content);
			$content =  preg_replace('|\<strike>(((?!\</strike>).)*)\</strike>|', "\x1B[" . self::STYLE_STRIKETHROUGH . "m\$1\x1B[0m", $content);
			$content =  preg_replace('|\<error>(((?!\</error>).)*)\</error>|', "\x1B[" . self::STYLE_ERROR . "m\$1\x1B[0m", $content);
			$content =  preg_replace('|\<success>(((?!\</success>).)*)\</success>|', "\x1B[" . self::STYLE_SUCCESS . "m\$1\x1B[0m", $content);
		} else {
			$content =  preg_replace('|\<b>(((?!\</b>).)*)\</b>|', "$1", $content);
			$content =  preg_replace('|\<i>(((?!\</i>).)*)\</i>|', "$1", $content);
			$content =  preg_replace('|\<u>(((?!\</u>).)*)\</u>|', "$1", $content);
			$content =  preg_replace('|\<em>(((?!\</em>).)*)\</em>|', "$1", $content);
			$content =  preg_replace('|\<strike>(((?!\</strike>).)*)\</strike>|', "$1", $content);
			$content =  preg_replace('|\<error>(((?!\</strike>).)*)\</error>|', "$1", $content);
			$content =  preg_replace('|\<success>(((?!\</strike>).)*)\</success>|', "$1", $content);
		}
		echo $content;
	}

}
namespace TYPO3\Flow\Cli;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A CLI specific response implementation
 */
class Response extends Response_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Cli\Response');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Cli\Response', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Cli\Response', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Cli/Response.php
#