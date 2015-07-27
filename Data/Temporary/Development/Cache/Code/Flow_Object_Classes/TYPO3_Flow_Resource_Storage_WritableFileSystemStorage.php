<?php 
namespace TYPO3\Flow\Resource\Storage;

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
use TYPO3\Flow\Resource\Resource;
use TYPO3\Flow\Utility\Files;

/**
 * A resource storage based on the (local) file system
 */
class WritableFileSystemStorage_Original extends FileSystemStorage implements WritableStorageInterface {

	/**
	 * Initializes this resource storage
	 *
	 * @return void
	 * @throws Exception
	 */
	public function initializeObject() {
		if (!is_writable($this->path)) {
			Files::createDirectoryRecursively($this->path);
		}
		if (!is_dir($this->path) && !is_link($this->path)) {
			throw new Exception('The directory "' . $this->path . '" which was configured as a resource storage does not exist.', 1361533189);
		}
		if (!is_writable($this->path)) {
			throw new Exception('The directory "' . $this->path . '" which was configured as a resource storage is not writable.', 1361533190);
		}
	}

	/**
	 * Imports a resource (file) from the given URI or PHP resource stream into this storage.
	 *
	 * On a successful import this method returns a Resource object representing the newly imported persistent resource.
	 *
	 * @param string | resource $source The URI (or local path and filename) or the PHP resource stream to import the resource from
	 * @param string $collectionName Name of the collection the new Resource belongs to
	 * @throws Exception
	 * @return Resource A resource object representing the imported resource
	 */
	public function importResource($source, $collectionName) {
		$temporaryTargetPathAndFilename = $this->environment->getPathToTemporaryDirectory() . uniqid('TYPO3_Flow_ResourceImport_');

		if (is_resource($source)) {
			try {
				$target = fopen($temporaryTargetPathAndFilename, 'wb');
				stream_copy_to_stream($source, $target);
				fclose($target);
			} catch (\Exception $e) {
				throw new Exception(sprintf('Could import the content stream to temporary file "%s".', $temporaryTargetPathAndFilename), 1380880079);
			}
		} else {
			try {
				copy($source, $temporaryTargetPathAndFilename);
			} catch (\Exception $e) {
				throw new Exception(sprintf('Could not copy the file from "%s" to temporary file "%s".', $source, $temporaryTargetPathAndFilename), 1375198876);
			}
		}

		return $this->importTemporaryFile($temporaryTargetPathAndFilename, $collectionName);
	}

	/**
	 * Imports a resource from the given string content into this storage.
	 *
	 * On a successful import this method returns a Resource object representing the newly
	 * imported persistent resource.
	 *
	 * The specified filename will be used when presenting the resource to a user. Its file extension is
	 * important because the resource management will derive the IANA Media Type from it.
	 *
	 * @param string $content The actual content to import
	 * @param string $collectionName Name of the collection the new Resource belongs to
	 * @return Resource A resource object representing the imported resource
	 * @throws Exception
	 */
	public function importResourceFromContent($content, $collectionName) {
		$temporaryTargetPathAndFilename = $this->environment->getPathToTemporaryDirectory() . uniqid('TYPO3_Flow_ResourceImport_');
		try {
			file_put_contents($temporaryTargetPathAndFilename, $content);
		} catch (\Exception $e) {
			throw new Exception(sprintf('Could import the content stream to temporary file "%s".', $temporaryTargetPathAndFilename), 1381156098);
		}

		return $this->importTemporaryFile($temporaryTargetPathAndFilename, $collectionName);
	}

	/**
	 * Deletes the storage data related to the given Resource object
	 *
	 * @param \TYPO3\Flow\Resource\Resource $resource The Resource to delete the storage data of
	 * @return boolean TRUE if removal was successful
	 */
	public function deleteResource(Resource $resource) {
		$pathAndFilename = $this->getStoragePathAndFilenameByHash($resource->getSha1());
		if (!file_exists($pathAndFilename)) {
			return TRUE;
		}
		if (unlink($pathAndFilename) === FALSE) {
			return FALSE;
		}
		Files::removeEmptyDirectoriesOnPath(dirname($pathAndFilename));
		return TRUE;
	}

	/**
	 * Imports the given temporary file into the storage and creates the new resource object.
	 *
	 * @param string $temporaryFile
	 * @param string $collectionName
	 * @return Resource
	 * @throws Exception
	 */
	protected function importTemporaryFile($temporaryFile, $collectionName) {
		$this->fixFilePermissions($temporaryFile);
		$sha1Hash = sha1_file($temporaryFile);
		$finalTargetPathAndFilename = $this->getStoragePathAndFilenameByHash($sha1Hash);
		if (!file_exists(dirname($finalTargetPathAndFilename))) {
			Files::createDirectoryRecursively(dirname($finalTargetPathAndFilename));
		}
		if (rename($temporaryFile, $finalTargetPathAndFilename) === FALSE) {
			unlink($temporaryFile);
			throw new Exception(sprintf('The temporary file of the file import could not be moved to the final target "%s".', $finalTargetPathAndFilename), 1381156103);
		}

		$this->fixFilePermissions($finalTargetPathAndFilename);

		$resource = new Resource();
		$resource->setFileSize(filesize($finalTargetPathAndFilename));
		$resource->setCollectionName($collectionName);
		$resource->setSha1($sha1Hash);
		$resource->setMd5(md5_file($finalTargetPathAndFilename));

		return $resource;
	}

	/**
	 * Fixes the permissions as needed for Flow to run fine in web and cli context.
	 *
	 * @param string $pathAndFilename
	 * @return void
	 */
	protected function fixFilePermissions($pathAndFilename) {
		@chmod($pathAndFilename, 0666 ^ umask());
	}

}
namespace TYPO3\Flow\Resource\Storage;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A resource storage based on the (local) file system
 */
class WritableFileSystemStorage extends WritableFileSystemStorage_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 * @param string $name Name of this storage instance, according to the resource settings
	 * @param array $options Options for this storage
	 * @throws Exception
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(1, $arguments)) $arguments[1] = array (
);
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $name in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		call_user_func_array('parent::__construct', $arguments);
		if ('TYPO3\Flow\Resource\Storage\WritableFileSystemStorage' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\Resource\Storage\WritableFileSystemStorage') {
			$this->initializeObject(1);
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
		$result = NULL;

		if (get_class($this) === 'TYPO3\Flow\Resource\Storage\WritableFileSystemStorage') {
			$this->initializeObject(2);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\Storage\WritableFileSystemStorage');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\Storage\WritableFileSystemStorage', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\Storage\WritableFileSystemStorage', $propertyName, 'var');
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
		$environment_reference = &$this->environment;
		$this->environment = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Utility\Environment');
		if ($this->environment === NULL) {
			$this->environment = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('d7473831479e64d04a54de9aedcdc371', $environment_reference);
			if ($this->environment === NULL) {
				$this->environment = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('d7473831479e64d04a54de9aedcdc371',  $environment_reference, 'TYPO3\Flow\Utility\Environment', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Utility\Environment'); });
			}
		}
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
$this->Flow_Injected_Properties = array (
  0 => 'environment',
  1 => 'resourceManager',
  2 => 'resourceRepository',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/Storage/WritableFileSystemStorage.php
#