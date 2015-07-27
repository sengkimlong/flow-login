<?php 
namespace TYPO3\Flow\Resource\Target;

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
use TYPO3\Flow\Http\HttpRequestHandlerInterface;
use TYPO3\Flow\Http\Request;
use TYPO3\Flow\Resource\Collection;
use TYPO3\Flow\Resource\CollectionInterface;
use TYPO3\Flow\Resource\Resource;
use TYPO3\Flow\Resource\ResourceMetaDataInterface;
use TYPO3\Flow\Utility\Files;

/**
 * A target which publishes resources to a specific directory in a file system.
 */
class FileSystemTarget_Original implements TargetInterface {

	/**
	 * @var array
	 */
	protected $options = array();

	/**
	 * Name which identifies this publishing target
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The path (in a filesystem) where resources are published to
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * Publicly accessible web URI which points to the root path of this target.
	 * Can be relative to website's base Uri, for example "_Resources/MySpecialTarget/"
	 *
	 * @var string
	 */
	protected $baseUri = '';

	/**
	 * If the generated URI path segment containing the sha1 should be divided into multiple segments
	 *
	 * @var boolean
	 */
	protected $subdivideHashPathSegment = TRUE;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Resource\ResourceRepository
	 */
	protected $resourceRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Core\Bootstrap
	 */
	protected $bootstrap;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Log\SystemLoggerInterface
	 */
	protected $systemLogger;

	/**
	 * Constructor
	 *
	 * @param string $name Name of this target instance, according to the resource settings
	 * @param array $options Options for this target
	 */
	public function __construct($name, array $options = array()) {
		$this->name = $name;
		$this->options = $options;
	}

	/**
	 * Initializes this resource publishing target
	 *
	 * @return void
	 * @throws \TYPO3\Flow\Resource\Exception
	 */
	public function initializeObject() {
		foreach ($this->options as $key => $value) {
			switch ($key) {
				case 'baseUri':
					if (strpos($value, '://') === FALSE && $value[0] !== '/') {
						$this->baseUri = $this->detectResourcesBaseUri() . $value;
					} else {
						$this->baseUri = $value;
					}
					break;
				case 'path':
					$this->$key = $value;
					break;
				case 'subdivideHashPathSegment':
					$this->subdivideHashPathSegment = (boolean)$value;
					break;
				default:
					throw new Exception(sprintf('An unknown option "%s" was specified in the configuration of a resource FileSystemTarget. Please check your settings.', $key), 1361525952);
			}
		}

		if (!is_writable($this->path)) {
			@Files::createDirectoryRecursively($this->path);
		}
		if (!is_dir($this->path) && !is_link($this->path)) {
			throw new Exception('The directory "' . $this->path . '" which was configured as a publishing target does not exist and could not be created.', 1207124538);
		}
		if (!is_writable($this->path)) {
			throw new Exception('The directory "' . $this->path . '" which was configured as a publishing target is not writable.', 1207124546);
		}
	}

	/**
	 * Returns the name of this target instance
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Publishes the whole collection to this target
	 *
	 * @param \TYPO3\Flow\Resource\Collection $collection The collection to publish
	 * @return void
	 * @throws Exception
	 */
	public function publishCollection(Collection $collection) {
		foreach ($collection->getObjects() as $object) {
			/** @var \TYPO3\Flow\Resource\Storage\Object $object */
			$sourceStream = $object->getStream();
			if ($sourceStream === FALSE) {
				throw new Exception(sprintf('Could not publish resource %s with SHA1 hash %s of collection %s because there seems to be no corresponding data in the storage.', $object->getFilename(), $object->getSha1(), $collection->getName()), 1417168142);
			}
			$this->publishFile($sourceStream, $this->getRelativePublicationPathAndFilename($object));
			fclose($sourceStream);
		}
	}

	/**
	 * Publishes the given persistent resource from the given storage
	 *
	 * @param \TYPO3\Flow\Resource\Resource $resource The resource to publish
	 * @param CollectionInterface $collection The collection the given resource belongs to
	 * @return void
	 * @throws Exception
	 */
	public function publishResource(Resource $resource, CollectionInterface $collection) {
		$sourceStream = $resource->getStream();
		if ($sourceStream === FALSE) {
			throw new Exception(sprintf('Could not publish resource %s with SHA1 hash %s of collection %s because there seems to be no corresponding data in the storage.', $resource->getFilename(), $resource->getSha1(), $collection->getName()), 1375258146);
		}
		$this->publishFile($sourceStream, $this->getRelativePublicationPathAndFilename($resource));
		fclose($sourceStream);
	}

	/**
	 * Unpublishes the given persistent resource
	 *
	 * @param \TYPO3\Flow\Resource\Resource $resource The resource to unpublish
	 * @return void
	 */
	public function unpublishResource(Resource $resource) {
		$resources = $this->resourceRepository->findSimilarResources($resource);
		if (count($resources) > 1) {
			return;
		}
		$this->unpublishFile($this->getRelativePublicationPathAndFilename($resource));
	}

	/**
	 * Returns the web accessible URI pointing to the given static resource
	 *
	 * @param string $relativePathAndFilename Relative path and filename of the static resource
	 * @return string The URI
	 */
	public function getPublicStaticResourceUri($relativePathAndFilename) {
		return $this->baseUri . $this->encodeRelativePathAndFilenameForUri($relativePathAndFilename);
	}

	/**
	 * Returns the web accessible URI pointing to the specified persistent resource
	 *
	 * @param \TYPO3\Flow\Resource\Resource $resource Resource object
	 * @return string The URI
	 * @throws Exception
	 */
	public function getPublicPersistentResourceUri(Resource $resource) {
		return $this->baseUri . $this->encodeRelativePathAndFilenameForUri($this->getRelativePublicationPathAndFilename($resource));
	}

	/**
	 * Applies rawurlencode() to all path segments of the given $relativePathAndFilename
	 *
	 * @param string $relativePathAndFilename
	 * @return string
	 */
	protected function encodeRelativePathAndFilenameForUri($relativePathAndFilename) {
		return implode('/', array_map('rawurlencode', explode('/', $relativePathAndFilename)));
	}

	/**
	 * Publishes the given source stream to this target, with the given relative path.
	 *
	 * @param resource $sourceStream Stream of the source to publish
	 * @param string $relativeTargetPathAndFilename relative path and filename in the target directory
	 * @return void
	 * @throws Exception
	 * @throws \Exception
	 * @throws \TYPO3\Flow\Utility\Exception
	 */
	protected function publishFile($sourceStream, $relativeTargetPathAndFilename) {
		$targetPathAndFilename = $this->path . $relativeTargetPathAndFilename;

		if (@fstat($sourceStream) === FALSE) {
			throw new Exception(sprintf('Could not publish "%s" into resource publishing target "%s" because the source file is not accessible (file stat failed).', $sourceStream, $this->name), 1375258499);
		}

		if (!file_exists(dirname($targetPathAndFilename))) {
			Files::createDirectoryRecursively(dirname($targetPathAndFilename));
		}

		try {
			$targetFileHandle = fopen($targetPathAndFilename, 'w');
			$result = stream_copy_to_stream($sourceStream, $targetFileHandle);
			fclose($targetFileHandle);
		} catch (\Exception $exception) {
			$result = FALSE;
		}
		if ($result === FALSE) {
			throw new Exception(sprintf('Could not publish "%s" into resource publishing target "%s" because the source file could not be copied to the target location.', $sourceStream, $this->name), 1375258399, (isset($exception) ? $exception : NULL));
		}

		$this->systemLogger->log(sprintf('FileSystemTarget: Published file. (target: %s, file: %s)', $this->name, $relativeTargetPathAndFilename), LOG_DEBUG);
	}

	/**
	 * Removes the specified target file from the public directory
	 *
	 * This method fails silently if the given file could not be unpublished or already didn't exist anymore.
	 *
	 * @param string $relativeTargetPathAndFilename relative path and filename in the target directory
	 * @return void
	 */
	protected function unpublishFile($relativeTargetPathAndFilename) {
		$targetPathAndFilename = $this->path . $relativeTargetPathAndFilename;
		if (!file_exists($targetPathAndFilename)) {
			return;
		}
		if (!Files::unlink($targetPathAndFilename)) {
			return;
		}
		Files::removeEmptyDirectoriesOnPath(dirname($targetPathAndFilename));
	}

	/**
	 * Detects and returns the website's base URI
	 *
	 * @return string The website's base URI
	 */
	protected function detectResourcesBaseUri() {
		$uri = '';
		$requestHandler = $this->bootstrap->getActiveRequestHandler();
		if ($requestHandler instanceof HttpRequestHandlerInterface) {
			// In functional tests or some other obscure scenarios we might end up without a current HTTP request:
			$request = $requestHandler->getHttpRequest();
			if ($request instanceof Request) {
				$uri = $requestHandler->getHttpRequest()->getBaseUri();
			}
		}
		return (string)$uri;
	}

	/**
	 * Determines and returns the relative path and filename for the given Storage Object or Resource. If the given
	 * object represents a persistent resource, its own relative publication path will be empty. If the given object
	 * represents a static resources, it will contain a relative path.
	 *
	 * No matter which kind of resource, persistent or static, this function will return a sub directory structure
	 * if no relative publication path was defined in the given object.
	 *
	 * @param ResourceMetaDataInterface $object Resource or Storage Object
	 * @return string The relative path and filename, for example "c/8/2/8/c828d0f88ce197be1aff7cc2e5e86b1244241ac6/MyPicture.jpg" (if subdivideHashPathSegment is on) or "c828d0f88ce197be1aff7cc2e5e86b1244241ac6/MyPicture.jpg" (if it's off)
	 */
	protected function getRelativePublicationPathAndFilename(ResourceMetaDataInterface $object) {
		if ($object->getRelativePublicationPath() !== '') {
			$pathAndFilename = $object->getRelativePublicationPath() . $object->getFilename();
		} else {
			if ($this->subdivideHashPathSegment) {
				$sha1Hash = $object->getSha1();
				$pathAndFilename = $sha1Hash[0] . '/' . $sha1Hash[1] . '/' . $sha1Hash[2] . '/' . $sha1Hash[3] . '/' . $sha1Hash . '/' . $object->getFilename();
			} else {
				$pathAndFilename = $object->getSha1() . '/' . $object->getFilename();
			}
		}
		return $pathAndFilename;
	}
}
namespace TYPO3\Flow\Resource\Target;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A target which publishes resources to a specific directory in a file system.
 */
class FileSystemTarget extends FileSystemTarget_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 * @param string $name Name of this target instance, according to the resource settings
	 * @param array $options Options for this target
	 */
	public function __construct() {
		$arguments = func_get_args();

		if (!array_key_exists(0, $arguments)) $arguments[0] = NULL;
		if (!array_key_exists(1, $arguments)) $arguments[1] = array (
);
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $name in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
		call_user_func_array('parent::__construct', $arguments);
		if ('TYPO3\Flow\Resource\Target\FileSystemTarget' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\Resource\Target\FileSystemTarget') {
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

		if (get_class($this) === 'TYPO3\Flow\Resource\Target\FileSystemTarget') {
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\Target\FileSystemTarget');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\Target\FileSystemTarget', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\Target\FileSystemTarget', $propertyName, 'var');
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
		$resourceRepository_reference = &$this->resourceRepository;
		$this->resourceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Resource\ResourceRepository');
		if ($this->resourceRepository === NULL) {
			$this->resourceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('bb0e0fb67bce65073a482bd8ef9ffa4a', $resourceRepository_reference);
			if ($this->resourceRepository === NULL) {
				$this->resourceRepository = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('bb0e0fb67bce65073a482bd8ef9ffa4a',  $resourceRepository_reference, 'TYPO3\Flow\Resource\ResourceRepository', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Resource\ResourceRepository'); });
			}
		}
		$bootstrap_reference = &$this->bootstrap;
		$this->bootstrap = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Core\Bootstrap');
		if ($this->bootstrap === NULL) {
			$this->bootstrap = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('40349277c7c94f4ce301e0b7a2784a70', $bootstrap_reference);
			if ($this->bootstrap === NULL) {
				$this->bootstrap = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('40349277c7c94f4ce301e0b7a2784a70',  $bootstrap_reference, 'TYPO3\Flow\Core\Bootstrap', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Core\Bootstrap'); });
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
  0 => 'resourceRepository',
  1 => 'bootstrap',
  2 => 'systemLogger',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/Target/FileSystemTarget.php
#