<?php 
namespace TYPO3\Flow\Resource;

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
use TYPO3\Flow\Error\Error;
use TYPO3\Flow\Property\Exception;
use TYPO3\Flow\Property\Exception\InvalidPropertyMappingConfigurationException;
use TYPO3\Flow\Property\PropertyMappingConfigurationInterface;
use TYPO3\Flow\Property\TypeConverter\AbstractTypeConverter;
use TYPO3\Flow\Utility\Files;

/**
 * A type converter for converting strings, array and uploaded files to Resource objects.
 *
 * Has two major working modes:
 *
 * 1. File Uploads by PHP
 *
 *    In this case, the input array is expected to be a fresh file upload following the native PHP handling. The
 *    temporary upload file is then imported through the resource manager.
 *
 *    To enable the handling of files that have already been uploaded earlier, the special field ['originallySubmittedResource']
 *    is checked. If set, it is used to fetch a file that has already been uploaded even if no file has been actually uploaded in the current request.
 *
 *
 * 2. Strings / arbitrary Arrays
 *
 *    If the source

 *    - is an array and contains the key '__identity'
 *
 *    the converter will find an existing resource with the given identity or continue and assign the given identity if
 *    CONFIGURATION_IDENTITY_CREATION_ALLOWED is set.
 *
 *    - is a string looking like a SHA1 (40 characters [0-9a-f]) or
 *    - is an array and contains the key 'hash' with a value looking like a SHA1 (40 characters [0-9a-f])
 *
 *    the converter will look up an existing Resource with that hash and return it if found. If that fails,
 *    the converter will try to import a file named like that hash from the configured CONFIGURATION_RESOURCE_LOAD_PATH.
 *
 *    If no hash is given in an array source but the key 'data' is set, the content of that key is assumed a binary string
 *    and a Resource representing this content is created and returned.
 *
 *    The imported Resource will be given a 'filename' if set in the source array in both cases (import from file or data).
 *
 * @Flow\Scope("singleton")
 */
class ResourceTypeConverter_Original extends AbstractTypeConverter {

	/**
	 * @var string
	 */
	const CONFIGURATION_RESOURCE_LOAD_PATH = 'resourceLoadPath';

	/**
	 * @var integer
	 */
	const CONFIGURATION_IDENTITY_CREATION_ALLOWED = 1;

	/**
	 * Sets the default resource collection name (see Settings: TYPO3.Flow.resource.collections) to use for this resource,
	 * will fallback to \TYPO3\Flow\Resource\ResourceManager::DEFAULT_PERSISTENT_COLLECTION_NAME
	 *
	 * @var string
	 */
	const CONFIGURATION_COLLECTION_NAME = 'collectionName';

	/**
	 * @var array<string>
	 */
	protected $sourceTypes = array('string', 'array');

	/**
	 * @var string
	 */
	protected $targetType = 'TYPO3\Flow\Resource\Resource';

	/**
	 * @var integer
	 */
	protected $priority = 1;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Resource\ResourceManager
	 */
	protected $resourceManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Resource\ResourceRepository
	 */
	protected $resourceRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Log\SystemLoggerInterface
	 */
	protected $systemLogger;

	/**
	 * @var array
	 */
	protected $convertedResources = array();

	/**
	 * Converts the given string or array to a Resource object.
	 *
	 * If the input format is an array, this method assumes the resource to be a
	 * fresh file upload and imports the temporary upload file through the
	 * ResourceManager.
	 *
	 * Note that $source['error'] will also be present if a file was successfully
	 * uploaded. In that case its value will be \UPLOAD_ERR_OK.
	 *
	 * @param array $source The upload info (expected keys: error, name, tmp_name)
	 * @param string $targetType
	 * @param array $convertedChildProperties
	 * @param PropertyMappingConfigurationInterface $configuration
	 * @return Resource|Error if the input format is not supported or could not be converted for other reasons
	 */
	public function convertFrom($source, $targetType, array $convertedChildProperties = array(), PropertyMappingConfigurationInterface $configuration = NULL) {
		if (is_string($source)) {
			$source = array('hash' => $source);
		}

		// $source is ALWAYS an array at this point
		if (isset($source['error']) || isset($source['originallySubmittedResource'])) {
			return $this->handleFileUploads($source, $configuration);
		} elseif (isset($source['hash']) || isset($source['data'])) {
			return $this->handleHashAndData($source, $configuration);
		}
		return NULL;
	}

	/**
	 * @param array $source
	 * @param PropertyMappingConfigurationInterface $configuration
	 * @return Resource|Error
	 * @throws Exception
	 */
	protected function handleFileUploads(array $source, PropertyMappingConfigurationInterface $configuration = NULL) {
		if (!isset($source['error']) || $source['error'] === \UPLOAD_ERR_NO_FILE) {
			if (isset($source['originallySubmittedResource']) && isset($source['originallySubmittedResource']['__identity'])) {
				return $this->persistenceManager->getObjectByIdentifier($source['originallySubmittedResource']['__identity'], 'TYPO3\Flow\Resource\Resource');
			}
			return NULL;
		}

		if ($source['error'] !== \UPLOAD_ERR_OK) {
			switch ($source['error']) {
				case \UPLOAD_ERR_INI_SIZE:
				case \UPLOAD_ERR_FORM_SIZE:
				case \UPLOAD_ERR_PARTIAL:
					return new Error(Files::getUploadErrorMessage($source['error']), 1264440823);
				default:
					$this->systemLogger->log(sprintf('A server error occurred while converting an uploaded resource: "%s"', Files::getUploadErrorMessage($source['error'])), LOG_ERR);
					return new Error('An error occurred while uploading. Please try again or contact the administrator if the problem remains', 1340193849);
			}
		}

		if (isset($this->convertedResources[$source['tmp_name']])) {
			return $this->convertedResources[$source['tmp_name']];
		}

		$resource = $this->resourceManager->importUploadedResource($source, $this->getCollectionName($source, $configuration));
		if ($resource === FALSE) {
			return new Error('The Resource Manager could not create a Resource instance for an uploaded file. See log for more details.' , 1264517906);
		} else {
			$this->convertedResources[$source['tmp_name']] = $resource;
			return $resource;
		}
	}

	/**
	 * @param array $source
	 * @param PropertyMappingConfigurationInterface $configuration
	 * @return Resource|Error
	 * @throws Exception
	 * @throws InvalidPropertyMappingConfigurationException
	 */
	protected function handleHashAndData(array $source, PropertyMappingConfigurationInterface $configuration = NULL) {
		$hash = NULL;
		$resource = FALSE;
		$givenResourceIdentity = NULL;
		if (isset($source['__identity'])) {
			$givenResourceIdentity = $source['__identity'];
			unset($source['__identity']);
			$resource = $this->resourceRepository->findByIdentifier($givenResourceIdentity);
			if ($resource instanceof Resource) {
				return $resource;
			}

			if ($configuration->getConfigurationValue('TYPO3\Flow\Resource\ResourceTypeConverter', self::CONFIGURATION_IDENTITY_CREATION_ALLOWED) !== TRUE) {
				throw new InvalidPropertyMappingConfigurationException('Creation of resource objects with identity not allowed. To enable this, you need to set the PropertyMappingConfiguration Value "CONFIGURATION_IDENTITY_CREATION_ALLOWED" to TRUE');
			}
		}

		if (isset($source['hash']) && preg_match('/[0-9a-f]{40}/', $source['hash'])) {
			$hash = $source['hash'];
		}

		if ($hash !== NULL && count($source) === 1) {
			$resource = $this->resourceManager->getResourceBySha1($hash);
		}
		if ($resource === NULL) {
			$collectionName = $this->getCollectionName($source, $configuration);
			if (isset($source['data'])) {
				$resource = $this->resourceManager->importResourceFromContent($source['data'], $source['filename'], $collectionName, $givenResourceIdentity);
			} elseif ($hash !== NULL) {
				$resource = $this->resourceManager->importResource($configuration->getConfigurationValue('TYPO3\Flow\Resource\ResourceTypeConverter', self::CONFIGURATION_RESOURCE_LOAD_PATH) . '/' . $hash, $collectionName, $givenResourceIdentity);
				if (is_array($source) && isset($source['filename'])) {
					$resource->setFilename($source['filename']);
				}
			}
		}

		if ($resource instanceof Resource) {
			return $resource;
		} else {
			return new Error('The resource manager could not create a Resource instance.', 1404312901);
		}
	}

	/**
	 * Get the collection name this resource will be stored in. Default will be ResourceManager::DEFAULT_PERSISTENT_COLLECTION_NAME
	 * The propertyMappingConfiguration CONFIGURATION_COLLECTION_NAME will directly override the default. Then if CONFIGURATION_ALLOW_COLLECTION_OVERRIDE is TRUE
	 * and __collectionName is in the $source this will finally be the value.
	 *
	 * @param array $source
	 * @param PropertyMappingConfigurationInterface $configuration
	 * @return string
	 * @throws InvalidPropertyMappingConfigurationException
	 */
	protected function getCollectionName($source, PropertyMappingConfigurationInterface $configuration = NULL) {
		if ($configuration === NULL) {
			return ResourceManager::DEFAULT_PERSISTENT_COLLECTION_NAME;
		}
		$collectionName = $configuration->getConfigurationValue('TYPO3\Flow\Resource\ResourceTypeConverter', self::CONFIGURATION_COLLECTION_NAME) ?: ResourceManager::DEFAULT_PERSISTENT_COLLECTION_NAME;
		if (isset($source['__collectionName']) && $source['__collectionName'] !== '') {
			$collectionName = $source['__collectionName'];
		}

		if ($this->resourceManager->getCollection($collectionName) === NULL) {
			throw new InvalidPropertyMappingConfigurationException(sprintf('The selected resource collection named "%s" does not exist, a resource could not be imported.', $collectionName), 1416687475);
		}

		return $collectionName;
	}

}
namespace TYPO3\Flow\Resource;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A type converter for converting strings, array and uploaded files to Resource objects.
 * 
 * Has two major working modes:
 * 
 * 1. File Uploads by PHP
 * 
 *    In this case, the input array is expected to be a fresh file upload following the native PHP handling. The
 *    temporary upload file is then imported through the resource manager.
 * 
 *    To enable the handling of files that have already been uploaded earlier, the special field ['originallySubmittedResource']
 *    is checked. If set, it is used to fetch a file that has already been uploaded even if no file has been actually uploaded in the current request.
 * 
 * 
 * 2. Strings / arbitrary Arrays
 * 
 *    If the source
 * 
 *    - is an array and contains the key '__identity'
 * 
 *    the converter will find an existing resource with the given identity or continue and assign the given identity if
 *    CONFIGURATION_IDENTITY_CREATION_ALLOWED is set.
 * 
 *    - is a string looking like a SHA1 (40 characters [0-9a-f]) or
 *    - is an array and contains the key 'hash' with a value looking like a SHA1 (40 characters [0-9a-f])
 * 
 *    the converter will look up an existing Resource with that hash and return it if found. If that fails,
 *    the converter will try to import a file named like that hash from the configured CONFIGURATION_RESOURCE_LOAD_PATH.
 * 
 *    If no hash is given in an array source but the key 'data' is set, the content of that key is assumed a binary string
 *    and a Resource representing this content is created and returned.
 * 
 *    The imported Resource will be given a 'filename' if set in the source array in both cases (import from file or data).
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class ResourceTypeConverter extends ResourceTypeConverter_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceTypeConverter') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Resource\ResourceTypeConverter', $this);
		if ('TYPO3\Flow\Resource\ResourceTypeConverter' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceTypeConverter') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Resource\ResourceTypeConverter', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\ResourceTypeConverter');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\ResourceTypeConverter', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\ResourceTypeConverter', $propertyName, 'var');
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
		$resourceManager_reference = &$this->resourceManager;
		$this->resourceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Resource\ResourceManager');
		if ($this->resourceManager === NULL) {
			$this->resourceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('3b3239258e396ed88334e6f7199a1678', $resourceManager_reference);
			if ($this->resourceManager === NULL) {
				$this->resourceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('3b3239258e396ed88334e6f7199a1678',  $resourceManager_reference, 'TYPO3\Flow\Resource\ResourceManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Resource\ResourceManager'); });
			}
		}
		$resourceRepository_reference = &$this->resourceRepository;
		$this->resourceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Resource\ResourceRepository');
		if ($this->resourceRepository === NULL) {
			$this->resourceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('bb0e0fb67bce65073a482bd8ef9ffa4a', $resourceRepository_reference);
			if ($this->resourceRepository === NULL) {
				$this->resourceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('bb0e0fb67bce65073a482bd8ef9ffa4a',  $resourceRepository_reference, 'TYPO3\Flow\Resource\ResourceRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Resource\ResourceRepository'); });
			}
		}
		$persistenceManager_reference = &$this->persistenceManager;
		$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		if ($this->persistenceManager === NULL) {
			$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('f1bc82ad47156d95485678e33f27c110', $persistenceManager_reference);
			if ($this->persistenceManager === NULL) {
				$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('f1bc82ad47156d95485678e33f27c110',  $persistenceManager_reference, 'TYPO3\Flow\Persistence\Doctrine\PersistenceManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface'); });
			}
		}
		$systemLogger_reference = &$this->systemLogger;
		$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Log\SystemLoggerInterface');
		if ($this->systemLogger === NULL) {
			$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6d57d95a1c3cd7528e3e6ea15012dac8', $systemLogger_reference);
			if ($this->systemLogger === NULL) {
				$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6d57d95a1c3cd7528e3e6ea15012dac8',  $systemLogger_reference, '', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Log\SystemLoggerInterface'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'resourceManager',
  1 => 'resourceRepository',
  2 => 'persistenceManager',
  3 => 'systemLogger',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/ResourceTypeConverter.php
#