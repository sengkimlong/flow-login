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

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Log\SystemLoggerInterface;
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Persistence\PersistenceManagerInterface;
use TYPO3\Flow\Reflection\ObjectAccess;
use TYPO3\Flow\Resource\Storage\StorageInterface;
use TYPO3\Flow\Resource\Storage\WritableStorageInterface;
use TYPO3\Flow\Resource\Streams\StreamWrapperAdapter;
use TYPO3\Flow\Resource\Target\TargetInterface;
use TYPO3\Flow\Utility\Unicode\Functions as UnicodeFunctions;

/**
 * The Resource Manager
 *
 * @Flow\Scope("singleton")
 * @api
 */
class ResourceManager_Original {

	/**
	 * Names of the default collections for static and persistent resources.
	 */
	const DEFAULT_STATIC_COLLECTION_NAME = 'static';
	const DEFAULT_PERSISTENT_COLLECTION_NAME = 'persistent';

	/**
	 * @Flow\Inject
	 * @var ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @Flow\Inject
	 * @var SystemLoggerInterface
	 */
	protected $systemLogger;

	/**
	 * @Flow\Inject
	 * @var ResourceRepository
	 */
	protected $resourceRepository;

	/**
	 * @Flow\Inject
	 * @var PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Utility\Environment
	 */
	protected $environment;

	/**
	 * @var array<\TYPO3\Flow\Resource\Storage\StorageInterface>
	 */
	protected $storages;

	/**
	 * @var array<\TYPO3\Flow\Resource\Target\TargetInterface>
	 */
	protected $targets;

	/**
	 * @var array<\TYPO3\Flow\Resource\CollectionInterface>
	 */
	protected $collections;

	/**
	 * Injects the settings of this package
	 *
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Initializes the Resource Manager by parsing the related configuration and registering the resource
	 * stream wrapper.
	 *
	 * @return void
	 */
	public function initialize() {
		$this->initializeStreamWrapper();
		$this->initializeStorages();
		$this->initializeTargets();
		$this->initializeCollections();
	}

	/**
	 * Imports a resource (file) from the given location as a persistent resource.
	 *
	 * On a successful import this method returns a Resource object representing the
	 * newly imported persistent resource and automatically publishes it to the configured
	 * publication target.
	 *
	 * @param string | resource $source A URI (can therefore also be a path and filename) or a PHP resource stream(!) pointing to the Resource to import
	 * @param string $collectionName Name of the collection this new resource should be added to. By default the standard collection for persistent resources is used.
	 * @param string $forcedPersistenceObjectIdentifier INTERNAL: Force the object identifier for this resource to the given UUID
	 * @return \TYPO3\Flow\Resource\Resource A resource object representing the imported resource
	 * @throws Exception
	 * @api
	 */
	public function importResource($source, $collectionName = ResourceManager::DEFAULT_PERSISTENT_COLLECTION_NAME, $forcedPersistenceObjectIdentifier = NULL) {
		if (!isset($this->collections[$collectionName])) {
			throw new Exception(sprintf('Tried to import a file into the resource collection "%s" but no such collection exists. Please check your settings and the code which triggered the import.', $collectionName), 1375196643);
		}

		/* @var CollectionInterface $collection */
		$collection = $this->collections[$collectionName];

		try {
			$resource = $collection->importResource($source);
			if ($forcedPersistenceObjectIdentifier !== NULL) {
				ObjectAccess::setProperty($resource, 'Persistence_Object_Identifier', $forcedPersistenceObjectIdentifier, TRUE);
			}
			if (!is_resource($source)) {
				$pathInfo = UnicodeFunctions::pathinfo($source);
				$resource->setFilename($pathInfo['basename']);
			}
		} catch (Exception $e) {
			throw new Exception(sprintf('Importing a file into the resource collection "%s" failed: %s', $collectionName, $e->getMessage()), 1375197120, $e);
		}

		$this->resourceRepository->add($resource);
		$this->systemLogger->log(sprintf('Successfully imported file "%s" into the resource collection "%s" (storage: %s, a %s. SHA1: %s)', $source, $collectionName, $collection->getStorage()->getName(), get_class($collection), $resource->getSha1()), LOG_DEBUG);
		return $resource;
	}

	/**
	 * Imports the given content passed as a string as a new persistent resource.
	 *
	 * The given content typically is binary data or a text format. On a successful import this method
	 * returns a Resource object representing the imported content and automatically publishes it to the
	 * configured publication target.
	 *
	 * The specified filename will be used when presenting the resource to a user. Its file extension is
	 * important because the resource management will derive the IANA Media Type from it.
	 *
	 * @param string $content The binary content to import
	 * @param string $filename The filename to use for the newly generated resource
	 * @param string $collectionName Name of the collection this new resource should be added to. By default the standard collection for persistent resources is used.
	 * @param string $forcedPersistenceObjectIdentifier INTERNAL: Force the object identifier for this resource to the given UUID
	 * @return Resource A resource object representing the imported resource
	 * @throws Exception
	 * @api
	 */
	public function importResourceFromContent($content, $filename, $collectionName = ResourceManager::DEFAULT_PERSISTENT_COLLECTION_NAME, $forcedPersistenceObjectIdentifier = NULL) {
		if (!is_string($content)) {
			throw new Exception(sprintf('Tried to import content into the resource collection "%s" but the given content was a %s instead of a string.', $collectionName, gettype($content)), 1380878115);
		}
		if (!isset($this->collections[$collectionName])) {
			throw new Exception(sprintf('Tried to import a file into the resource collection "%s" but no such collection exists. Please check your settings and the code which triggered the import.', $collectionName), 1380878131);
		}

		/* @var CollectionInterface $collection */
		$collection = $this->collections[$collectionName];

		try {
			$resource = $collection->importResourceFromContent($content);
			$resource->setFilename($filename);
			if ($forcedPersistenceObjectIdentifier !== NULL) {
				ObjectAccess::setProperty($resource, 'Persistence_Object_Identifier', $forcedPersistenceObjectIdentifier, TRUE);
			}
		} catch (Exception $e) {
			throw new Exception(sprintf('Importing content into the resource collection "%s" failed: %s', $collectionName, $e->getMessage()), 1381156155, $e);
		}

		$this->resourceRepository->add($resource);
		$this->systemLogger->log(sprintf('Successfully imported content into the resource collection "%s" (storage: %s, a %s. SHA1: %s)', $collectionName, $collection->getStorage()->getName(), get_class($collection->getStorage()), $resource->getSha1()), LOG_DEBUG);

		return $resource;
	}

	/**
	 * Imports a resource (file) from the given upload info array as a persistent
	 * resource.
	 *
	 * On a successful import this method returns a Resource object representing
	 * the newly imported persistent resource.
	 *
	 * @param array $uploadInfo An array detailing the resource to import (expected keys: name, tmp_name)
	 * @param string $collectionName Name of the collection this uploaded resource should be added to
	 * @return Resource A resource object representing the imported resource or FALSE if an error occurred.
	 * @throws Exception
	 */
	public function importUploadedResource(array $uploadInfo, $collectionName = self::DEFAULT_PERSISTENT_COLLECTION_NAME) {
		if (!isset($this->collections[$collectionName])) {
			throw new Exception(sprintf('Tried to import an uploaded file into the resource collection "%s" but no such collection exists. Please check your settings and HTML forms.', $collectionName), 1375197544);
		}

		/* @var CollectionInterface $collection */
		$collection = $this->collections[$collectionName];

		try {
			$uploadedFile = $this->prepareUploadedFileForImport($uploadInfo);
			$resource = $collection->importResource($uploadedFile['filepath']);
			$resource->setFilename($uploadedFile['filename']);
		} catch (Exception $e) {
			throw new Exception(sprintf('Importing an uploaded file into the resource collection "%s" failed.', $collectionName), 1375197680, $e);
		}

		$this->resourceRepository->add($resource);
		$this->systemLogger->log(sprintf('Successfully imported the uploaded file "%s" into the resource collection "%s" (storage: "%s", a %s. SHA1: %s)', $resource->getFilename(), $collectionName, $this->collections[$collectionName]->getStorage()->getName(), get_class($this->collections[$collectionName]->getStorage()), $resource->getSha1()), LOG_DEBUG);

		return $resource;
	}

	/**
	 * Returns the resource object identified by the given SHA1 hash over the content, or NULL if no such Resource
	 * object is known yet.
	 *
	 * @param string $sha1Hash The SHA1 identifying the data the Resource stands for
	 * @return Resource | NULL
	 * @api
	 */
	public function getResourceBySha1($sha1Hash) {
		return $this->resourceRepository->findOneBySha1($sha1Hash);
	}

	/**
	 * Returns a stream handle of the given persistent resource which allows for opening / copying the resource's
	 * data. Note that this stream handle may only be used read-only.
	 *
	 * @param Resource $resource The resource to retrieve the stream for
	 * @return resource | boolean The resource stream or FALSE if the stream could not be obtained
	 * @api
	 */
	public function getStreamByResource(Resource $resource) {
		$collectionName = $resource->getCollectionName();
		if (!isset($this->collections[$collectionName])) {
			return FALSE;
		}
		return $this->collections[$collectionName]->getStreamByResource($resource);
	}

	/**
	 * Returns an object storage with all resource objects which have been imported
	 * by the Resource Manager during this script call. Each resource comes with
	 * an array of additional information about its import.
	 *
	 * Example for a returned object storage:
	 *
	 * $resource1 => array('originalFilename' => 'Foo.txt'),
	 * $resource2 => array('originalFilename' => 'Bar.txt'),
	 * ...
	 *
	 * @return \SplObjectStorage
	 * @api
	 */
	public function getImportedResources() {
		return $this->resourceRepository->getAddedResources();
	}

	/**
	 * Deletes the given Resource from the Resource Repository and, if the storage data is no longer used in another
	 * Resource object, also deletes the data from the storage.
	 *
	 * This method will also remove the Resource object from the (internal) ResourceRepository.
	 *
	 * @param Resource $resource The resource to delete
	 * @param boolean $unpublishResource If the resource should be unpublished before deleting it from the storage
	 * @return boolean TRUE if the resource was deleted, otherwise FALSE
	 * @api
	 */
	public function deleteResource(Resource $resource, $unpublishResource = TRUE) {
		$collectionName = $resource->getCollectionName();

		$result = $this->resourceRepository->findBySha1($resource->getSha1());
		if (count($result) > 1) {
			$this->systemLogger->log(sprintf('Not removing storage data of resource %s (%s) because it is still in use by %s other Resource object(s).', $resource->getFilename(), $resource->getSha1(), count($result) - 1), LOG_DEBUG);
		} else {
			if (!isset($this->collections[$collectionName])) {
				$this->systemLogger->log(sprintf('Could not remove storage data of resource %s (%s) because it refers to the unknown collection "%s".', $resource->getFilename(), $resource->getSha1(), $collectionName), LOG_WARNING);
				return FALSE;
			}
			$storage = $this->collections[$collectionName]->getStorage();
			if (!$storage instanceof WritableStorageInterface) {
				$this->systemLogger->log(sprintf('Could not remove storage data of resource %s (%s) because it its collection "%s" is read-only.', $resource->getFilename(), $resource->getSha1(), $collectionName), LOG_WARNING);
				return FALSE;
			}
			try {
				$storage->deleteResource($resource);
			} catch (\Exception $e) {
				$this->systemLogger->log(sprintf('Could not remove storage data of resource %s (%s): %s.', $resource->getFilename(), $resource->getSha1(), $e->getMessage()), LOG_WARNING);
				return FALSE;
			}
			if ($unpublishResource) {
				/** @var TargetInterface $target */
				$target = $this->collections[$collectionName]->getTarget();
				$target->unpublishResource($resource);
				$this->systemLogger->log(sprintf('Removed storage data and unpublished resource %s (%s) because it not used by any other Resource object.', $resource->getFilename(), $resource->getSha1()), LOG_DEBUG);
			} else {
				$this->systemLogger->log(sprintf('Removed storage data of resource %s (%s) because it not used by any other Resource object.', $resource->getFilename(), $resource->getSha1()), LOG_DEBUG);
			}
		}

		$resource->setDeleted();
		$this->resourceRepository->remove($resource);
		return TRUE;
	}

	/**
	 * Returns the web accessible URI for the given resource object
	 *
	 * @param Resource $resource The resource object
	 * @return string | boolean A URI as a string or FALSE if the collection of the resource is not found
	 * @api
	 */
	public function getPublicPersistentResourceUri(Resource $resource) {
		if (!isset($this->collections[$resource->getCollectionName()])) {
			return FALSE;
		}
		/** @var TargetInterface $target */
		$target = $this->collections[$resource->getCollectionName()]->getTarget();
		return $target->getPublicPersistentResourceUri($resource);
	}

	/**
	 * Returns the web accessible URI for the resource object specified by the
	 * given SHA1 hash.
	 *
	 * @param string $resourceHash The SHA1 hash identifying the resource content
	 * @param string $collectionName Name of the collection the resource is part of
	 * @return string A URI as a string
	 * @throws Exception
	 * @api
	 */
	public function getPublicPersistentResourceUriByHash($resourceHash, $collectionName = self::DEFAULT_PERSISTENT_COLLECTION_NAME) {
		if (!isset($this->collections[$collectionName])) {
			throw new Exception(sprintf('Could not determine persistent resource URI for "%s" because the specified collection "%s" does not exist.', $resourceHash, $collectionName), 1375197875);
		}
		/** @var TargetInterface $target */
		$target = $this->collections[$collectionName]->getTarget();
		$resource = $this->resourceRepository->findOneBySha1($resourceHash);
		if ($resource === NULL) {
			throw new Exception(sprintf('Could not determine persistent resource URI for "%s" because no Resource object with that SHA1 hash could be found.', $resourceHash), 1375347691);
		}
		return $target->getPublicPersistentResourceUri($resourceHash);
	}

	/**
	 * Returns the public URI for a static resource provided by the specified package and in the given
	 * path below the package's resources directory.
	 *
	 * @param string $packageKey Package key
	 * @param string $relativePathAndFilename A relative path below the "Resources" directory of the package
	 * @return string
	 * @api
	 */
	public function getPublicPackageResourceUri($packageKey, $relativePathAndFilename) {
		/** @var TargetInterface $target */
		$target = $this->collections[self::DEFAULT_STATIC_COLLECTION_NAME]->getTarget();
		return $target->getPublicStaticResourceUri($packageKey . '/' . $relativePathAndFilename);
	}

	/**
	 * Returns a Storage instance by the given name
	 *
	 * @param string $storageName Name of the storage as defined in the settings
	 * @return \TYPO3\Flow\Resource\Storage\StorageInterface or NULL
	 */
	public function getStorage($storageName) {
		return isset($this->storages[$storageName]) ? $this->storages[$storageName] : NULL;
	}

	/**
	 * Returns a Collection instance by the given name
	 *
	 * @param string $collectionName Name of the collection as defined in the settings
	 * @return \TYPO3\Flow\Resource\CollectionInterface or NULL
	 * @api
	 */
	public function getCollection($collectionName) {
		return isset($this->collections[$collectionName]) ? $this->collections[$collectionName] : NULL;
	}

	/**
	 * Returns an array of currently known Collection instances
	 *
	 * @return array<\TYPO3\Flow\Resource\CollectionInterface>
	 */
	public function getCollections() {
		return $this->collections;
	}

	/**
	 * Returns an array of Collection instances which use the given storage
	 *
	 * @param StorageInterface $storage
	 * @return array<\TYPO3\Flow\Resource\CollectionInterface>
	 */
	public function getCollectionsByStorage(StorageInterface $storage) {
		$collections = array();
		foreach ($this->collections as $collectionName => $collection) {
			/** @var CollectionInterface $collection */
			if ($collection->getStorage() === $storage) {
				$collections[$collectionName] = $collection;
			}
		}
		return $collections;
	}

	/**
	 * Checks if recently imported resources really have been persisted - and if not, removes its data from the
	 * respective storage.
	 *
	 * @return void
	 */
	public function shutdownObject() {
		foreach ($this->resourceRepository->getAddedResources() as $resource) {
			if ($this->persistenceManager->isNewObject($resource)) {
				$this->deleteResource($resource, FALSE);
			}
		}
	}

	/**
	 * Initializes the Storage objects according to the current settings
	 *
	 * @return void
	 * @throws Exception if the storage configuration is invalid
	 */
	protected function initializeStorages() {
		foreach ($this->settings['resource']['storages'] as $storageName => $storageDefinition) {
			if (!isset($storageDefinition['storage'])) {
				throw new Exception(sprintf('The configuration for the resource storage "%s" defined in your settings has no valid "storage" option. Please check the configuration syntax and make sure to specify a valid storage class name.', $storageName), 1361467211);
			}
			if (!class_exists($storageDefinition['storage'])) {
				throw new Exception(sprintf('The configuration for the resource storage "%s" defined in your settings has not defined a valid "storage" option. Please check the configuration syntax and make sure that the specified class "%s" really exists.', $storageName, $storageDefinition['storage']), 1361467212);
			}
			$options = (isset($storageDefinition['storageOptions']) ? $storageDefinition['storageOptions'] : array());
			$this->storages[$storageName] = new $storageDefinition['storage']($storageName, $options);
		}
	}

	/**
	 * Initializes the Target objects according to the current settings
	 *
	 * @return void
	 * @throws Exception if the target configuration is invalid
	 */
	protected function initializeTargets() {
		foreach ($this->settings['resource']['targets'] as $targetName => $targetDefinition) {
			if (!isset($targetDefinition['target'])) {
				throw new Exception(sprintf('The configuration for the resource target "%s" defined in your settings has no valid "target" option. Please check the configuration syntax and make sure to specify a valid target class name.', $targetName), 1361467838);
			}
			if (!class_exists($targetDefinition['target'])) {
				throw new Exception(sprintf('The configuration for the resource target "%s" defined in your settings has not defined a valid "target" option. Please check the configuration syntax and make sure that the specified class "%s" really exists.', $targetName, $targetDefinition['target']), 1361467839);
			}
			$options = (isset($targetDefinition['targetOptions']) ? $targetDefinition['targetOptions'] : array());
			$this->targets[$targetName] = new $targetDefinition['target']($targetName, $options);
		}
	}

	/**
	 * Initializes the Collection objects according to the current settings
	 *
	 * @return void
	 * @throws Exception if the collection configuration is invalid
	 */
	protected function initializeCollections() {
		foreach ($this->settings['resource']['collections'] as $collectionName => $collectionDefinition) {
			if (!isset($collectionDefinition['storage'])) {
				throw new Exception(sprintf('The configuration for the resource collection "%s" defined in your settings has no valid "storage" option. Please check the configuration syntax.', $collectionName), 1361468805);
			}
			if (!isset($this->storages[$collectionDefinition['storage']])) {
				throw new Exception(sprintf('The configuration for the resource collection "%s" defined in your settings referred to a non-existing storage "%s". Please check the configuration syntax and make sure to specify a valid storage class name.', $collectionName, $collectionDefinition['storage']), 1361481031);
			}
			if (!isset($collectionDefinition['target'])) {
				throw new Exception(sprintf('The configuration for the resource collection "%s" defined in your settings has no valid "target" option. Please check the configuration syntax and make sure to specify a valid target class name.', $collectionName), 1361468923);
			}
			if (!isset($this->targets[$collectionDefinition['target']])) {
				throw new Exception(sprintf('The configuration for the resource collection "%s" defined in your settings has not defined a valid "target" option. Please check the configuration syntax and make sure that the specified class "%s" really exists.', $collectionName, $collectionDefinition['target']), 1361468924);
			}

			$pathPatterns = (isset($collectionDefinition['pathPatterns'])) ? $collectionDefinition['pathPatterns'] : array();
			$filenames = (isset($collectionDefinition['filenames'])) ? $collectionDefinition['filenames'] : array();

			$this->collections[$collectionName] = new Collection($collectionName, $this->storages[$collectionDefinition['storage']], $this->targets[$collectionDefinition['target']], $pathPatterns, $filenames);
		}
	}

	/**
	 * Registers a Stream Wrapper Adapter for the resource:// scheme.
	 *
	 * @return void
	 */
	protected function initializeStreamWrapper() {
		$streamWrapperClassNames = static::getStreamWrapperImplementationClassNames($this->objectManager);
		foreach ($streamWrapperClassNames as $streamWrapperClassName) {
			$scheme = $streamWrapperClassName::getScheme();
			if (in_array($scheme, stream_get_wrappers())) {
				stream_wrapper_unregister($scheme);
			}
			stream_wrapper_register($scheme, 'TYPO3\Flow\Resource\Streams\StreamWrapperAdapter');
			StreamWrapperAdapter::registerStreamWrapper($scheme, $streamWrapperClassName);
		}
	}

	/**
	 * Prepare an uploaded file to be imported as resource object. Will check the validity of the file,
	 * move it outside of upload folder if open_basedir is enabled and check the filename.
	 *
	 * @param array $uploadInfo
	 * @return array Array of string with the two keys "filepath" (the path to get the filecontent from) and "filename" the filename of the originally uploaded file.
	 * @throws Exception
	 */
	protected function prepareUploadedFileForImport(array $uploadInfo) {
		$openBasedirEnabled = (boolean)ini_get('open_basedir');
		$temporaryTargetPathAndFilename = $uploadInfo['tmp_name'];
		$pathInfo = UnicodeFunctions::pathinfo($uploadInfo['name']);

		if (!is_uploaded_file($temporaryTargetPathAndFilename)) {
			throw new Exception('The given upload file "' . strip_tags($pathInfo['basename']) . '" was not uploaded through PHP. As it could pose a security risk it cannot be imported.', 1422461503);
		}

		if ($openBasedirEnabled === TRUE) {
			// Move uploaded file to a readable folder before trying to read sha1 value of file
			$newTemporaryTargetPathAndFilename = $this->environment->getPathToTemporaryDirectory() . 'ResourceUpload.' . uniqid() . '.tmp';
			if (move_uploaded_file($temporaryTargetPathAndFilename, $newTemporaryTargetPathAndFilename) === FALSE) {
				throw new Exception(sprintf('The uploaded file "%s" could not be moved to the temporary location "%s".', $temporaryTargetPathAndFilename, $newTemporaryTargetPathAndFilename), 1375199056);
			}
			$temporaryTargetPathAndFilename = $newTemporaryTargetPathAndFilename;
		}

		if (!is_file($temporaryTargetPathAndFilename)) {
			throw new Exception(sprintf('The temporary file "%s" of the file upload does not exist (anymore).', $temporaryTargetPathAndFilename), 1375198998);
		}

		return array(
			'filepath' => $temporaryTargetPathAndFilename,
			'filename' => $pathInfo['basename']
		);
	}

	/**
	 * Returns all class names implementing the StreamWrapperInterface.
	 *
	 * @param ObjectManagerInterface $objectManager
	 * @return array Array of stream wrapper implementations
	 * @Flow\CompileStatic
	 */
	static protected function getStreamWrapperImplementationClassNames($objectManager) {
		return $objectManager->get('TYPO3\Flow\Reflection\ReflectionService')->getAllImplementationClassNamesForInterface('TYPO3\Flow\Resource\Streams\StreamWrapperInterface');
	}

	/**
	 * Creates a resource from the given binary content as a persistent resource.
	 *
	 * @param string $content The binary content to import
	 * @param string $filename The filename to use for the newly generated resource
	 * @return Resource A resource object representing the created resource or FALSE if an error occurred.
	 * @deprecated use importResourceFromContent() instead
	 * @see importResourceFromContent()
	 */
	public function createResourceFromContent($content, $filename) {
		return $this->importResourceFromContent($content, $filename);
	}

}
namespace TYPO3\Flow\Resource;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * The Resource Manager
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class ResourceManager extends ResourceManager_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceManager') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Resource\ResourceManager', $this);
		if ('TYPO3\Flow\Resource\ResourceManager' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceManager') {
		\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->registerShutdownObject($this, 'shutdownObject');
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceManager') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Resource\ResourceManager', $this);

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
		$result = NULL;

		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceManager') {
		\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->registerShutdownObject($this, 'shutdownObject');
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\ResourceManager');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\ResourceManager', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\ResourceManager', $propertyName, 'var');
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
		$this->injectSettings(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager')->getConfiguration('Settings', 'TYPO3.Flow'));
		$objectManager_reference = &$this->objectManager;
		$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Object\ObjectManagerInterface');
		if ($this->objectManager === NULL) {
			$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('0c3c44be7be16f2a287f1fb2d068dde4', $objectManager_reference);
			if ($this->objectManager === NULL) {
				$this->objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('0c3c44be7be16f2a287f1fb2d068dde4',  $objectManager_reference, 'TYPO3\Flow\Object\ObjectManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'); });
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
		$environment_reference = &$this->environment;
		$this->environment = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Utility\Environment');
		if ($this->environment === NULL) {
			$this->environment = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('d7473831479e64d04a54de9aedcdc371', $environment_reference);
			if ($this->environment === NULL) {
				$this->environment = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('d7473831479e64d04a54de9aedcdc371',  $environment_reference, 'TYPO3\Flow\Utility\Environment', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Utility\Environment'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'statusCache',
  1 => 'settings',
  2 => 'objectManager',
  3 => 'systemLogger',
  4 => 'resourceRepository',
  5 => 'persistenceManager',
  6 => 'environment',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/ResourceManager.php
#