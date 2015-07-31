<?php 
namespace TYPO3\Flow\Configuration;

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
use TYPO3\Flow\Error\Notice;
use TYPO3\Flow\Error\Result;

/**
 * A validator for all configuration entries using Schema
 *
 * Writing Custom Schemata
 * =======================
 *
 * The schemas are searched in the path "Resources/Private/Schema" of all
 * active packages. The schema-filenames must match the pattern
 * [type].[path].schema.yaml. The type and/or the path can also be
 * expressed as subdirectories of Resources/Private/Schema. So
 * Settings/TYPO3/Flow.persistence.schema.yaml will match the same paths
 * like Settings.TYPO3.Flow.persistence.schema.yaml or
 * Settings/TYPO3.Flow/persistence.schema.yaml
 *
 * @Flow\Scope("singleton")
 */
class ConfigurationSchemaValidator_Original {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Configuration\ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Package\PackageManagerInterface
	 */
	protected $packageManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Utility\SchemaValidator
	 */
	protected $schemaValidator;

	/**
	 * Validate the given $configurationType and $path
	 *
	 * @param string $configurationType (optional) the configuration type to validate. if NULL, validates all configuration.
	 * @param string $path (optional) configuration path to validate
	 * @param array $loadedSchemaFiles (optional). if given, will be filled with a list of loaded schema files
	 * @return \TYPO3\Flow\Error\Result the result of the validation
	 * @throws Exception\SchemaValidationException
	 */
	public function validate($configurationType = NULL, $path = NULL, &$loadedSchemaFiles = array()) {
		if ($configurationType === NULL) {
			$configurationTypes = $this->configurationManager->getAvailableConfigurationTypes();
		} else {
			$configurationTypes = array($configurationType);
		}

		$result = new Result();
		foreach ($configurationTypes as $configurationType) {
			$resultForEachType = $this->validateSingleType($configurationType, $path, $loadedSchemaFiles);
			$result->forProperty($configurationType)->merge($resultForEachType);
		}
		return $result;
	}

	/**
	 * Validate a single configuration type
	 *
	 * @param string $configurationType the configuration typr to validate
	 * @param string $path configuration path to validate, or NULL.
	 * @param array $loadedSchemaFiles will be filled with a list of loaded schema files
	 * @return \TYPO3\Flow\Error\Result
	 * @throws Exception\SchemaValidationException
	 */
	protected function validateSingleType($configurationType, $path, &$loadedSchemaFiles) {
		$availableConfigurationTypes = $this->configurationManager->getAvailableConfigurationTypes();
		if (in_array($configurationType, $availableConfigurationTypes) === FALSE) {
			throw new Exception\SchemaValidationException('The configuration type "' . $configurationType . '" was not found. Only the following configuration types are supported: "' . implode('", "', $availableConfigurationTypes) . '"', 1364984886);
		}

		$configuration = $this->configurationManager->getConfiguration($configurationType);

		// find schema files for the given type and path
		$schemaFileInfos = array();
		$activePackages = $this->packageManager->getActivePackages();
		foreach ($activePackages as $package) {
			$packageKey = $package->getPackageKey();
			$packageSchemaPath = \TYPO3\Flow\Utility\Files::concatenatePaths(array($package->getResourcesPath(), 'Private/Schema'));
			if (is_dir($packageSchemaPath)) {
				$packageSchemaFiles = \TYPO3\Flow\Utility\Files::readDirectoryRecursively($packageSchemaPath, '.schema.yaml');
				foreach ($packageSchemaFiles as $schemaFile) {
					$schemaName = substr($schemaFile, strlen($packageSchemaPath) + 1, -strlen('.schema.yaml'));
					$schemaNameParts = explode('.', str_replace('/', '.', $schemaName), 2);

					$schemaType = $schemaNameParts[0];
					$schemaPath = isset($schemaNameParts[1]) ? $schemaNameParts[1] : NULL;

					if ($schemaType === $configurationType && ($path === NULL || strpos($schemaPath, $path) === 0)) {
						$schemaFileInfos[] = array(
							'file' => $schemaFile,
							'name' => $schemaName,
							'path' => $schemaPath,
							'packageKey' => $packageKey
						);
					}
				}
			}
		}

		if (count($schemaFileInfos) === 0) {
			throw new Exception\SchemaValidationException('No schema files found for configuration type "' . $configurationType . '"' . ($path !== NULL ? ' and path "' . $path . '".': '.'), 1364985056);
		}

		$result = new Result();
		foreach ($schemaFileInfos as $schemaFileInfo) {
			$loadedSchemaFiles[] = $schemaFileInfo['file'];

			if ($schemaFileInfo['path'] !== NULL) {
				$data = \TYPO3\Flow\Utility\Arrays::getValueByPath($configuration, $schemaFileInfo['path']);
			} else {
				$data = $configuration;
			}

			if (empty($data)) {
				$result->addNotice(new Notice('No configuration found, skipping schema "%s".', 1364985445, array(substr($schemaFileInfo['file'], strlen(FLOW_PATH_ROOT)))));
			} else {
				$parsedSchema = \Symfony\Component\Yaml\Yaml::parse($schemaFileInfo['file']);
				$validationResultForSingleSchema = $this->schemaValidator->validate($data, $parsedSchema);

				if ($schemaFileInfo['path'] !== NULL) {
					$result->forProperty($schemaFileInfo['path'])->merge($validationResultForSingleSchema);
				} else {
					$result->merge($validationResultForSingleSchema);
				}
			}
		}

		return $result;
	}
}
namespace TYPO3\Flow\Configuration;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A validator for all configuration entries using Schema
 * 
 * Writing Custom Schemata
 * =======================
 * 
 * The schemas are searched in the path "Resources/Private/Schema" of all
 * active packages. The schema-filenames must match the pattern
 * [type].[path].schema.yaml. The type and/or the path can also be
 * expressed as subdirectories of Resources/Private/Schema. So
 * Settings/TYPO3/Flow.persistence.schema.yaml will match the same paths
 * like Settings.TYPO3.Flow.persistence.schema.yaml or
 * Settings/TYPO3.Flow/persistence.schema.yaml
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class ConfigurationSchemaValidator extends ConfigurationSchemaValidator_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Configuration\ConfigurationSchemaValidator') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Configuration\ConfigurationSchemaValidator', $this);
		if ('TYPO3\Flow\Configuration\ConfigurationSchemaValidator' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Configuration\ConfigurationSchemaValidator') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Configuration\ConfigurationSchemaValidator', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Configuration\ConfigurationSchemaValidator');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Configuration\ConfigurationSchemaValidator', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Configuration\ConfigurationSchemaValidator', $propertyName, 'var');
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
		$configurationManager_reference = &$this->configurationManager;
		$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Configuration\ConfigurationManager');
		if ($this->configurationManager === NULL) {
			$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('13edcae8fd67699bb78dadc8c1eac29c', $configurationManager_reference);
			if ($this->configurationManager === NULL) {
				$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('13edcae8fd67699bb78dadc8c1eac29c',  $configurationManager_reference, 'TYPO3\Flow\Configuration\ConfigurationManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager'); });
			}
		}
		$packageManager_reference = &$this->packageManager;
		$this->packageManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Package\PackageManagerInterface');
		if ($this->packageManager === NULL) {
			$this->packageManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('aad0cdb65adb124cf4b4d16c5b42256c', $packageManager_reference);
			if ($this->packageManager === NULL) {
				$this->packageManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('aad0cdb65adb124cf4b4d16c5b42256c',  $packageManager_reference, 'TYPO3\Flow\Package\PackageManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Package\PackageManagerInterface'); });
			}
		}
		$schemaValidator_reference = &$this->schemaValidator;
		$this->schemaValidator = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Utility\SchemaValidator');
		if ($this->schemaValidator === NULL) {
			$this->schemaValidator = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('1aee6e37460cf41f65ff674c80107cff', $schemaValidator_reference);
			if ($this->schemaValidator === NULL) {
				$this->schemaValidator = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('1aee6e37460cf41f65ff674c80107cff',  $schemaValidator_reference, 'TYPO3\Flow\Utility\SchemaValidator', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Utility\SchemaValidator'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'configurationManager',
  1 => 'packageManager',
  2 => 'schemaValidator',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Configuration/ConfigurationSchemaValidator.php
#