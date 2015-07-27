<?php 
namespace TYPO3\Flow\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Symfony\Component\Yaml\Yaml;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Cli\CommandController;
use TYPO3\Flow\Configuration\ConfigurationManager;
use TYPO3\Flow\Configuration\ConfigurationSchemaValidator;
use TYPO3\Flow\Configuration\Exception\SchemaValidationException;
use TYPO3\Flow\Error\Error;
use TYPO3\Flow\Error\Notice;
use TYPO3\Flow\Utility\Arrays;
use TYPO3\Flow\Utility\SchemaGenerator;

/**
 * Configuration command controller for the TYPO3.Flow package
 *
 * @Flow\Scope("singleton")
 */
class ConfigurationCommandController_Original extends CommandController {

	/**
	 * @Flow\Inject
	 * @var ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @Flow\Inject(lazy = FALSE)
	 * @var ConfigurationSchemaValidator
	 */
	protected $configurationSchemaValidator;

	/**
	 * @Flow\Inject
	 * @var SchemaGenerator
	 */
	protected $schemaGenerator;

	/**
	 * Show the active configuration settings
	 *
	 * The command shows the configuration of the current context as it is used by Flow itself.
	 * You can specify the configuration type and path if you want to show parts of the configuration.
	 *
	 * ./flow configuration:show --type Settings --path TYPO3.Flow.persistence
	 *
	 * @param string $type Configuration type to show
	 * @param string $path path to subconfiguration separated by "." like "TYPO3.Flow"
	 * @return void
	 */
	public function showCommand($type = NULL, $path = NULL) {
		$availableConfigurationTypes = $this->configurationManager->getAvailableConfigurationTypes();
		if (in_array($type, $availableConfigurationTypes)) {
			$configuration = $this->configurationManager->getConfiguration($type);
			if ($path !== NULL) {
				$configuration = Arrays::getValueByPath($configuration, $path);
			}
			$typeAndPath = $type . ($path ? ': ' . $path : '');
			if ($configuration === NULL) {
				$this->outputLine('<b>Configuration "%s" was empty!</b>', array($typeAndPath));
			} else {
				$yaml = Yaml::dump($configuration, 99);
				$this->outputLine('<b>Configuration "%s":</b>', array($typeAndPath));
				$this->outputLine();
				$this->outputLine($yaml . chr(10));
			}
		} else {
			if ($type !== NULL) {
				$this->outputLine('<b>Configuration type "%s" was not found!</b>', array($type));
			}
			$this->outputLine('<b>Available configuration types:</b>');
			foreach ($availableConfigurationTypes as $availableConfigurationType) {
				$this->outputLine('  ' . $availableConfigurationType);
			}
			$this->outputLine();
			$this->outputLine('Hint: <b>%s configuration:show --type <configurationType></b>', array($this->getFlowInvocationString()));
			$this->outputLine('      shows the configuration of the specified type.');
		}
	}

	/**
	 * List registered configuration types
	 *
	 * @return void
	 */
	public function listTypesCommand() {
		$this->outputLine('The following configuration types are registered:');
		$this->outputLine();

		foreach ($this->configurationManager->getAvailableConfigurationTypes() as $type) {
			$this->outputFormatted('- %s', array($type));
		}
	}

	/**
	 * Validate the given configuration
	 *
	 * <b>Validate all configuration</b>
	 * ./flow configuration:validate
	 *
	 * <b>Validate configuration at a certain subtype</b>
	 * ./flow configuration:validate --type Settings --path TYPO3.Flow.persistence
	 *
	 * You can retrieve the available configuration types with:
	 * ./flow configuration:listtypes
	 *
	 * @param string $type Configuration type to validate
	 * @param string $path path to the subconfiguration separated by "." like "TYPO3.Flow"
	 * @param boolean $verbose if TRUE, output more verbose information on the schema files which were used
	 * @return void
	 */
	public function validateCommand($type = NULL, $path = NULL, $verbose = FALSE) {
		if ($type === NULL) {
			$this->outputLine('Validating <b>all</b> configuration');
		} else {
			$this->outputLine('Validating <b>' . $type . '</b> configuration' . ($path !== NULL ? ' on path <b>' . $path . '</b>' : ''));
		}
		$this->outputLine();

		$validatedSchemaFiles = array();
		try {
			$result = $this->configurationSchemaValidator->validate($type, $path, $validatedSchemaFiles);
		} catch (SchemaValidationException $exception) {
			$this->outputLine('<b>Exception:</b>');
			$this->outputFormatted($exception->getMessage(), array(), 4);
			$this->quit(2);
			return;
		}

		if ($verbose) {
			$this->outputLine('<b>Loaded Schema Files:</b>');
			foreach ($validatedSchemaFiles as $validatedSchemaFile) {
				$this->outputLine('- ' . substr($validatedSchemaFile, strlen(FLOW_PATH_ROOT)));
			}
			$this->outputLine();
			if ($result->hasNotices()) {
				$notices = $result->getFlattenedNotices();
				$this->outputLine('<b>%d notices:</b>', array(count($notices)));
				/** @var Notice $notice */
				foreach ($notices as $path => $pathNotices) {
					foreach ($pathNotices as $notice) {
						$this->outputLine(' - %s -> %s', array($path, $notice->render()));
					}
				}
				$this->outputLine();
			}
		}

		if ($result->hasErrors()) {
			$errors = $result->getFlattenedErrors();
			$this->outputLine('<b>%d errors were found:</b>', array(count($errors)));
			/** @var Error $error */
			foreach ($errors as $path => $pathErrors) {
				foreach ($pathErrors as $error) {
					$this->outputLine(' - %s -> %s', array($path, $error->render()));
				}
			}
			$this->quit(1);
		} else {
			$this->outputLine('<b>All Valid!</b>');
		}
	}

	/**
	 * Generate a schema for the given configuration or YAML file.
	 *
	 * ./flow configuration:generateschema --type Settings --path TYPO3.Flow.persistence
	 *
	 * The schema will be output to standard output.
	 *
	 * @param string $type Configuration type to create a schema for
	 * @param string $path path to the subconfiguration separated by "." like "TYPO3.Flow"
	 * @param string $yaml YAML file to create a schema for
	 * @return void
	 */
	public function generateSchemaCommand($type = NULL, $path = NULL, $yaml = NULL) {
		$data = NULL;
		if ($yaml !== NULL && is_file($yaml) && is_readable($yaml)) {
			$data = Yaml::parse($yaml);
		} elseif ($type !== NULL) {
			$data = $this->configurationManager->getConfiguration($type);
			if ($path !== NULL) {
				$data = Arrays::getValueByPath($data, $path);
			}
		}

		if (empty($data)) {
			$this->outputLine('Data was not found or is empty');
			$this->quit(1);
		}

		$this->outputLine(Yaml::dump($this->schemaGenerator->generate($data), 99));
	}

}
namespace TYPO3\Flow\Command;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Configuration command controller for the TYPO3.Flow package
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class ConfigurationCommandController extends ConfigurationCommandController_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Command\ConfigurationCommandController') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Command\ConfigurationCommandController', $this);
		parent::__construct();
		if ('TYPO3\Flow\Command\ConfigurationCommandController' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Command\ConfigurationCommandController') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Command\ConfigurationCommandController', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Command\ConfigurationCommandController');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Command\ConfigurationCommandController', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Command\ConfigurationCommandController', $propertyName, 'var');
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
		$this->injectReflectionService(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService'));
		$configurationManager_reference = &$this->configurationManager;
		$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Configuration\ConfigurationManager');
		if ($this->configurationManager === NULL) {
			$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('13edcae8fd67699bb78dadc8c1eac29c', $configurationManager_reference);
			if ($this->configurationManager === NULL) {
				$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('13edcae8fd67699bb78dadc8c1eac29c',  $configurationManager_reference, 'TYPO3\Flow\Configuration\ConfigurationManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager'); });
			}
		}
		$this->configurationSchemaValidator = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationSchemaValidator');
		$schemaGenerator_reference = &$this->schemaGenerator;
		$this->schemaGenerator = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Utility\SchemaGenerator');
		if ($this->schemaGenerator === NULL) {
			$this->schemaGenerator = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('a96b1c047313d06a902dbb0d1d6f06d3', $schemaGenerator_reference);
			if ($this->schemaGenerator === NULL) {
				$this->schemaGenerator = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('a96b1c047313d06a902dbb0d1d6f06d3',  $schemaGenerator_reference, 'TYPO3\Flow\Utility\SchemaGenerator', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Utility\SchemaGenerator'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'reflectionService',
  1 => 'configurationManager',
  2 => 'configurationSchemaValidator',
  3 => 'schemaGenerator',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Command/ConfigurationCommandController.php
#