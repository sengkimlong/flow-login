<?php 
namespace TYPO3\Flow\Property\TypeConverter;

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
 * Converter which transforms simple types to a string.
 *
 * * If the source is a DateTime instance, it will be formatted as string. The format
 *   can be set via CONFIGURATION_DATE_FORMAT.
 * * If the source is an array, it will be converted to a CSV string or JSON, depending
 *   on CONFIGURATION_ARRAY_FORMAT.
 *
 * For array to CSV string, the delimiter can be set via CONFIGURATION_CSV_DELIMITER.
 *
 * @api
 * @Flow\Scope("singleton")
 */
class StringConverter_Original extends AbstractTypeConverter {

	/**
	 * @var string
	 */
	const CONFIGURATION_DATE_FORMAT = 'dateFormat';

	/**
	 * The default date format is "YYYY-MM-DDT##:##:##+##:##", for example "2005-08-15T15:52:01+00:00"
	 * according to the W3C standard @see http://www.w3.org/TR/NOTE-datetime.html
	 *
	 * @var string
	 */
	const DEFAULT_DATE_FORMAT = \DateTime::W3C;

	/**
	 * @var string
	 */
	const CONFIGURATION_ARRAY_FORMAT = 'arrayFormat';

	/**
	 * @var string
	 */
	const DEFAULT_ARRAY_FORMAT = self::ARRAY_FORMAT_CSV;

	/**
	 * @var string
	 */
	const ARRAY_FORMAT_CSV = 'csv';

	/**
	 * @var string
	 */
	const ARRAY_FORMAT_JSON = 'json';

	/**
	 * @var string
	 */
	const CONFIGURATION_CSV_DELIMITER = 'csvDelimiter';

	/**
	 * @var string
	 */
	const DEFAULT_CSV_DELIMITER = ',';

	/**
	 * @var array<string>
	 */
	protected $sourceTypes = array('string', 'integer', 'float', 'boolean', 'array', 'DateTime');

	/**
	 * @var string
	 */
	protected $targetType = 'string';

	/**
	 * @var integer
	 */
	protected $priority = 1;

	/**
	 * Actually convert from $source to $targetType, taking into account the fully
	 * built $convertedChildProperties and $configuration.
	 *
	 * @param mixed $source
	 * @param string $targetType
	 * @param array $convertedChildProperties
	 * @param \TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration
	 * @return string
	 * @api
	 */
	public function convertFrom($source, $targetType, array $convertedChildProperties = array(), \TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration = NULL) {
		if ($source instanceof \DateTime) {
			$dateFormat = $this->getDateFormat($configuration);

			return $source->format($dateFormat);
		}

		if (is_array($source)) {
			switch ($this->getArrayFormat($configuration)) {
				case self::ARRAY_FORMAT_CSV:
					return implode($this->getCsvDelimiter($configuration), $source);
				case self::ARRAY_FORMAT_JSON:
					return json_encode($source);
				default:
					throw new \TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException(sprintf('Invalid array export format "%s" given', $this->getArrayFormat($configuration)), 1404317220);
			}
		}

		return (string)$source;
	}

	/**
	 * Determines the date format to use for the conversion.
	 *
	 * If no format is specified in the mapping configuration DEFAULT_DATE_FORMAT is used.
	 *
	 * @param \TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration
	 * @return string
	 * @throws \TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException
	 */
	protected function getDateFormat(\TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration = NULL) {
		if ($configuration === NULL) {
			return self::DEFAULT_DATE_FORMAT;
		}

		$dateFormat = $configuration->getConfigurationValue('TYPO3\Flow\Property\TypeConverter\StringConverter', self::CONFIGURATION_DATE_FORMAT);
		if ($dateFormat === NULL) {
			return self::DEFAULT_DATE_FORMAT;
		} elseif ($dateFormat !== NULL && !is_string($dateFormat)) {
			throw new \TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException('CONFIGURATION_DATE_FORMAT must be of type string, "' . (is_object($dateFormat) ? get_class($dateFormat) : gettype($dateFormat)) . '" given', 1404229004);
		}

		return $dateFormat;
	}

	/**
	 * Determines the delimiter to use for the conversion from array to CSV format.
	 *
	 * If no delimiter is specified in the mapping configuration DEFAULT_CSV_DELIMITER is used.
	 *
	 * @param \TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration
	 * @return string
	 * @throws \TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException
	 */
	protected function getCsvDelimiter(\TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration = NULL) {
		if ($configuration === NULL) {
			return self::DEFAULT_CSV_DELIMITER;
		}

		$csvDelimiter = $configuration->getConfigurationValue('TYPO3\Flow\Property\TypeConverter\StringConverter', self::CONFIGURATION_CSV_DELIMITER);
		if ($csvDelimiter === NULL) {
			return self::DEFAULT_CSV_DELIMITER;
		} elseif (!is_string($csvDelimiter)) {
			throw new \TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException('CONFIGURATION_CSV_DELIMITER must be of type string, "' . (is_object($csvDelimiter) ? get_class($csvDelimiter) : gettype($csvDelimiter)) . '" given', 1404229000);
		}

		return $csvDelimiter;
	}

	/**
	 * Determines the format to use for the conversion from array to string.
	 *
	 * If no format is specified in the mapping configuration DEFAULT_ARRAY_FORMAT is used.
	 *
	 * @param \TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration
	 * @return string
	 * @throws \TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException
	 */
	protected function getArrayFormat(\TYPO3\Flow\Property\PropertyMappingConfigurationInterface $configuration = NULL) {
		if ($configuration === NULL) {
			return self::DEFAULT_ARRAY_FORMAT;
		}

		$arrayFormat = $configuration->getConfigurationValue('TYPO3\Flow\Property\TypeConverter\StringConverter', self::CONFIGURATION_ARRAY_FORMAT);
		if ($arrayFormat === NULL) {
			return self::DEFAULT_ARRAY_FORMAT;
		} elseif (!is_string($arrayFormat)) {
			throw new \TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException('CONFIGURATION_ARRAY_FORMAT must be of type string, "' . (is_object($arrayFormat) ? get_class($arrayFormat) : gettype($arrayFormat)) . '" given', 1404228995);
		}

		return $arrayFormat;
	}
}
namespace TYPO3\Flow\Property\TypeConverter;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Converter which transforms simple types to a string.
 * 
 * * If the source is a DateTime instance, it will be formatted as string. The format
 *   can be set via CONFIGURATION_DATE_FORMAT.
 * * If the source is an array, it will be converted to a CSV string or JSON, depending
 *   on CONFIGURATION_ARRAY_FORMAT.
 * 
 * For array to CSV string, the delimiter can be set via CONFIGURATION_CSV_DELIMITER.
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class StringConverter extends StringConverter_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Property\TypeConverter\StringConverter') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Property\TypeConverter\StringConverter', $this);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Property\TypeConverter\StringConverter') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Property\TypeConverter\StringConverter', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Property\TypeConverter\StringConverter');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Property\TypeConverter\StringConverter', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Property\TypeConverter\StringConverter', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Property/TypeConverter/StringConverter.php
#