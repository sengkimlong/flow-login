<?php 
namespace TYPO3\Flow\I18n;

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

/**
 * The Utility class for locale specific actions
 *
 * @Flow\Scope("singleton")
 */
class Utility_Original {

	/**
	 * A pattern which matches HTTP Accept-Language Headers
	 */
	const PATTERN_MATCH_ACCEPTLANGUAGE = '/([a-z]{1,8}(-[a-z]{1,8})?|\*)(;q=(1|0(\.[0-9]+)?))?/i';

	/**
	 * Parses Accept-Language header and returns array of locale tags (like:
	 * en-GB, en), or FALSE if no tags were found.
	 *
	 * This method only returns tags that conforms ISO 639 for language codes
	 * and ISO 3166 for region codes. HTTP spec (RFC 2616) defines both of these
	 * parts as 1*8ALPHA, but this method ignores tags with longer (or shorter)
	 * codes than defined in ISO mentioned above.
	 *
	 * There can be an asterisk "*" in the returned array, which means that
	 * any language is acceptable.
	 *
	 * Warning: This method expects that locale tags are placed in descending
	 * order by quality in the $header string. I'm not sure if it's always true
	 * with the web browsers.
	 *
	 * @param string $acceptLanguageHeader
	 * @return mixed The array of locale identifiers or FALSE
	 */
	static public function parseAcceptLanguageHeader($acceptLanguageHeader) {
		$acceptLanguageHeader = str_replace(' ', '', $acceptLanguageHeader);
		$matchingLanguages = array();

		if (preg_match_all(self::PATTERN_MATCH_ACCEPTLANGUAGE, $acceptLanguageHeader, $matches, \PREG_PATTERN_ORDER) !== FALSE) {
			foreach ($matches[1] as $localeIdentifier) {
				if ($localeIdentifier === '*') {
					$matchingLanguages[] = $localeIdentifier;
					continue;
				}

				if (strpos($localeIdentifier, '-') !== FALSE) {
					list($language, $region) = explode('-', $localeIdentifier);
				} else {
					$language = $localeIdentifier;
					$region = NULL;
				}

				if (strlen($language) >= 2 && strlen($language) <= 3) {
					if ($region === NULL || strlen($region) >= 2 && strlen($region) <= 3) {
						// Note: there are 3 chars in the region code only if they are all digits, but we don't check it above
						$matchingLanguages[] = $localeIdentifier;
					}
				}
			}

			if (count($matchingLanguages) > 0) {
				return $matchingLanguages;
			}
		}

		return FALSE;
	}

	/**
	 * Extracts a locale tag (identifier) from the filename given.
	 *
	 * Locale tag should be placed just before the extension of the file. For
	 * example, filename bar.png can be localized as bar.en_GB.png,
	 * and this method extracts en_GB from the name.
	 *
	 * Note: this ignores matches on rss, xml and php and validates the identifier.
	 *
	 * @param string $filename Filename to extract locale identifier from
	 * @return mixed The string with extracted locale identifier of FALSE on failure
	 */
	static public function extractLocaleTagFromFilename($filename) {
		if (strpos($filename, '.') === FALSE) {
			return FALSE;
		}

		$filenameParts = explode('.', $filename);

		if (in_array($filenameParts[count($filenameParts) - 2], array('php', 'rss', 'xml'))) {
			return FALSE;
		} elseif (count($filenameParts) === 2 && preg_match(Locale::PATTERN_MATCH_LOCALEIDENTIFIER, $filenameParts[0]) === 1) {
			return $filenameParts[0];
		} elseif (preg_match(Locale::PATTERN_MATCH_LOCALEIDENTIFIER, $filenameParts[count($filenameParts) - 2]) === 1) {
			return $filenameParts[count($filenameParts) - 2];
		} else {
			return FALSE;
		}
	}

	/**
	 * Checks if $haystack string begins with $needle string.
	 *
	 * @param string $haystack
	 * @param string $needle
	 * @return boolean TRUE if $haystack begins with $needle
	 */
	static public function stringBeginsWith($haystack, $needle) {
		if (!empty($needle) && strncmp($haystack, $needle, strlen($needle)) === 0) {
			return TRUE;
		}

		return FALSE;
	}

	/**
	 * Checks if $haystack string ends with $needle string.
	 *
	 * @param string $haystack
	 * @param string $needle
	 * @return boolean TRUE if $haystack ends with $needle
	 */
	static public function stringEndsWith($haystack, $needle) {
		if (substr($haystack, - strlen($needle)) === $needle) {
			return TRUE;
		}

		return FALSE;
	}
}
namespace TYPO3\Flow\I18n;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * The Utility class for locale specific actions
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class Utility extends Utility_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\I18n\Utility') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\I18n\Utility', $this);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\I18n\Utility') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\I18n\Utility', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\I18n\Utility');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\I18n\Utility', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\I18n\Utility', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/I18n/Utility.php
#