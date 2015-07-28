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
use TYPO3\Flow\Cache\CacheAwareInterface;
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Utility\Files;
use TYPO3\Flow\Utility\MediaTypes;
use TYPO3\Flow\Utility\Unicode\Functions as UnicodeFunctions;

/**
 * Model representing a persistable resource
 *
 * @Flow\Entity
 */
class Resource_Original implements ResourceMetaDataInterface, CacheAwareInterface {

	/**
	 * Name of a collection whose storage is used for storing this resource and whose
	 * target is used for publishing.
	 *
	 * @var string
	 */
	protected $collectionName = ResourceManager::DEFAULT_PERSISTENT_COLLECTION_NAME;

	/**
	 * Filename which is used when the data of this resource is downloaded as a file or acting as a label
	 *
	 * @var string
	 * @Flow\Validate(type="StringLength", options={ "maximum"=255 })
	 * @ORM\Column(length=255)
	 */
	protected $filename = '';

	/**
	 * The size of this object's data
	 *
	 * @var integer
	 * @ORM\Column(type="decimal", scale=0, precision=20, nullable=false)
	 */
	protected $fileSize;

	/**
	 * An optional relative path which can be used by a publishing target for structuring resources into directories
	 *
	 * @var string
	 */
	protected $relativePublicationPath = '';

	/**
	 * The IANA media type of this resource
	 *
	 * @var string
	 * @Flow\Validate(type="StringLength", options={ "maximum"=100 })
	 * @ORM\Column(length=100)
	 */
	protected $mediaType;

	/**
	 * SHA1 hash identifying the content attached to this resource
	 *
	 * @var string
	 * @ORM\Column(length=40)
	 */
	protected $sha1;

	/**
	 * MD5 hash identifying the content attached to this resource
	 *
	 * @var string
	 * @ORM\Column(length=32)
	 */
	protected $md5;

	/**
	 * As soon as the Resource has been published, modifying this object is not allowed
	 *
	 * @Flow\Transient
	 * @var boolean
	 */
	protected $protected = FALSE;

	/**
	 * @Flow\Transient
	 * @var boolean
	 */
	protected $lifecycleEventsActive = TRUE;

	/**
	 * An internal flag which tells if this Resource object has been deleted during the current request
	 *
	 * @Flow\Transient
	 * @var boolean
	 */
	protected $deleted = FALSE;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Resource\ResourceManager
	 */
	protected $resourceManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Log\SystemLoggerInterface
	 */
	protected $systemLogger;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Utility\Environment
	 */
	protected $environment;

	/**
	 * @Flow\Transient
	 * @var string
	 */
	protected $temporaryLocalCopyPathAndFilename;

	/**
	 * Protects this Resource if it has been persisted already.
	 *
	 * @param integer $initializationCause
	 * @return void
	 */
	public function initializeObject($initializationCause) {
		if ($initializationCause === ObjectManagerInterface::INITIALIZATIONCAUSE_RECREATED) {
			$this->protected = TRUE;
		}
	}

	/**
	 * Returns a stream for use with read-only file operations such as reading or copying.
	 *
	 * Note: The caller is responsible to close the returned resource by calling fclose($stream)
	 *
	 * @return resource | boolean A stream which points to the data of this resource for read-access or FALSE if the stream could not be obtained
	 * @api
	 */
	public function getStream() {
		return $this->resourceManager->getStreamByResource($this);
	}

	/**
	 * Sets the name of the collection this resource should be part of
	 *
	 * @param string $collectionName Name of the collection
	 * @return void
	 * @api
	 */
	public function setCollectionName($collectionName) {
		$this->throwExceptionIfProtected();
		$this->collectionName = $collectionName;
	}

	/**
	 * Returns the name of the collection this resource is part of
	 *
	 * @return string Name of the collection, for example "persistentResources"
	 * @api
	 */
	public function getCollectionName() {
		return $this->collectionName;
	}

	/**
	 * Sets the filename which is used when this resource is downloaded or saved as a file
	 *
	 * @param string $filename
	 * @return void
	 * @api
	 */
	public function setFilename($filename) {
		$this->throwExceptionIfProtected();

		$pathInfo = UnicodeFunctions::pathinfo($filename);
		$extension = (isset($pathInfo['extension']) ? '.' . strtolower($pathInfo['extension']) : '');
		$this->filename = $pathInfo['filename'] . $extension;
		$this->mediaType = MediaTypes::getMediaTypeFromFilename($this->filename);
	}

	/**
	 * Gets the filename
	 *
	 * @return string The filename
	 * @api
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * Returns the file extension used for this resource
	 *
	 * @return string The file extension used for this file
	 * @api
	 */
	public function getFileExtension() {
		$pathInfo = pathInfo($this->filename);
		return isset($pathInfo['extension']) ? $pathInfo['extension'] : '';
	}

	/**
	 * Sets a relative path which can be used by a publishing target for structuring resources into directories
	 *
	 * @param string $path
	 * @return void
	 * @api
	 */
	public function setRelativePublicationPath($path) {
		$this->throwExceptionIfProtected();
		$this->relativePublicationPath = $path;
	}

	/**
	 * Returns the relative publication path
	 *
	 * @return string
	 * @api
	 */
	public function getRelativePublicationPath() {
		return $this->relativePublicationPath;
	}

	/**
	 * Explicitly sets the Media Type for this resource
	 *
	 * @param string $mediaType The IANA Media Type
	 * @return void
	 * @api
	 */
	public function setMediaType($mediaType) {
		$this->mediaType = $mediaType;
	}

	/**
	 * Returns the Media Type for this resource
	 *
	 * @return string The IANA Media Type
	 * @api
	 */
	public function getMediaType() {
		if ($this->mediaType === NULL) {
			return MediaTypes::getMediaTypeFromFilename($this->filename);
		} else {
			return $this->mediaType;
		}
	}

	/**
	 * Sets the size of the content of this resource
	 *
	 * @param integer $fileSize The content size
	 * @return void
	 */
	public function setFileSize($fileSize) {
		$this->throwExceptionIfProtected();
		$this->fileSize = $fileSize;
	}

	/**
	 * Returns the size of the content of this resource
	 *
	 * @return integer The content size
	 */
	public function getFileSize() {
		return $this->fileSize;
	}

	/**
	 * Returns the sha1 hash of the content of this resource
	 *
	 * @return string The sha1 hash
	 * @api
	 * @deprecated Since version 3.0, please use getSha1() instead
	 */
	public function getHash() {
		return $this->sha1;
	}

	/**
	 * Sets the SHA1 hash of the content of this resource
	 *
	 * @param string $hash The sha1 hash
	 * @return void
	 * @api
	 * @deprecated Since version 3.0, please use setSha1() instead
	 */
	public function setHash($hash) {
		$this->setSha1($hash);
	}

	/**
	 * Returns the SHA1 hash of the content of this resource
	 *
	 * @return string The sha1 hash
	 * @api
	 */
	public function getSha1() {
		return $this->sha1;
	}

	/**
	 * Sets the SHA1 hash of the content of this resource
	 *
	 * @param string $sha1 The sha1 hash
	 * @return void
	 * @api
	 */
	public function setSha1($sha1) {
		$this->throwExceptionIfProtected();
		if (preg_match('/[a-f0-9]{40}/', $sha1) !== 1) {
			throw new \InvalidArgumentException('Specified invalid hash to setSha1()', 1362564220);
		}
		$this->sha1 = $sha1;
	}

	/**
	 * Returns the MD5 hash of the content of this resource
	 *
	 * @return string The MD5 hash
	 * @api
	 */
	public function getMd5() {
		return $this->md5;
	}

	/**
	 * Sets the MD5 hash of the content of this resource
	 *
	 * @param string $md5 The MD5 hash
	 * @return void
	 * @api
	 */
	public function setMd5($md5) {
		$this->throwExceptionIfProtected();
		$this->md5 = $md5;
	}

	/**
	 * Returns the path to a local file representing this resource for use with read-only file operations such as reading or copying.
	 *
	 * Note that you must not store or publish file paths returned from this method as they will change with every request.
	 *
	 * @return string Absolute path and filename pointing to the temporary local copy of this resource
	 * @throws Exception
	 * @api
	 */
	public function createTemporaryLocalCopy() {
		if ($this->temporaryLocalCopyPathAndFilename === NULL) {
			$temporaryPathAndFilename = $this->environment->getPathToTemporaryDirectory() . 'ResourceFiles/';
			try {
				Files::createDirectoryRecursively($temporaryPathAndFilename);
			} catch (\TYPO3\Flow\Utility\Exception $e) {
				throw new Exception(sprintf('Could not create the temporary directory %s while trying to create a temporary local copy of resource %s (%s).', $temporaryPathAndFilename, $this->sha1, $this->filename), 1416221864);
			}

			$temporaryPathAndFilename .= $this->getCacheEntryIdentifier();
			$temporaryPathAndFilename .= '-' . microtime(TRUE);

			if (function_exists('posix_getpid')) {
				$temporaryPathAndFilename .= '-' . str_pad(posix_getpid(), 10);
			} else {
				$temporaryPathAndFilename .= '-' . (string) getmypid();
			}

			$temporaryPathAndFilename = trim($temporaryPathAndFilename);
			$temporaryFileHandle = fopen($temporaryPathAndFilename, 'w');
			if ($temporaryFileHandle === FALSE) {
				throw new Exception(sprintf('Could not create the temporary file %s while trying to create a temporary local copy of resource %s (%s).', $temporaryPathAndFilename, $this->sha1, $this->filename), 1416221864);
			}
			$resourceStream = $this->getStream();
			if ($resourceStream === FALSE) {
				throw new Exception(sprintf('Could not open stream for resource %s ("%s") from collection "%s" while trying to create a temporary local copy.', $this->sha1, $this->filename, $this->collectionName), 1416221863);
			}
			stream_copy_to_stream($resourceStream, $temporaryFileHandle);
			fclose($resourceStream);
			fclose($temporaryFileHandle);
			$this->temporaryLocalCopyPathAndFilename = $temporaryPathAndFilename;
		}

		return $this->temporaryLocalCopyPathAndFilename;
	}

	/**
	 * Sets the resource pointer
	 *
	 * Deprecated – use setSha1() instead!
	 *
	 * @param \TYPO3\Flow\Resource\ResourcePointer $resourcePointer
	 * @return void
	 * @deprecated Since version 3.0, use setSha1() to set the raw hash of the resourcePointer
	 * @see setSha1()
	 */
	public function setResourcePointer(ResourcePointer $resourcePointer) {
		$this->throwExceptionIfProtected();
		$this->sha1 = $resourcePointer->getHash();
	}

	/**
	 * Returns the resource pointer
	 *
	 * Deprecated – use getSha1() instead!
	 *
	 * @return \TYPO3\Flow\Resource\ResourcePointer $resourcePointer
	 * @api
	 * @deprecated Since version 3.0, use getSha1() which is the same value
	 * @see getSha1()
	 */
	public function getResourcePointer() {
		return new ResourcePointer($this->sha1);
	}

	/**
	 * Returns the SHA1 of the content this Resource is related to
	 *
	 * @return string
	 * @deprecated Since version 3.0. Use getSha1() to get a textual representation
	 */
	public function __toString() {
		return $this->sha1;
	}

	/**
	 * Doctrine lifecycle event callback which is triggered on "postPersist" events.
	 * This method triggers the publication of this resource.
	 *
	 * @return void
	 * @ORM\PostPersist
	 */
	public function postPersist() {
		if ($this->lifecycleEventsActive) {
			$collection = $this->resourceManager->getCollection($this->collectionName);
			$collection->getTarget()->publishResource($this, $collection);
		}
	}

	/**
	 * Doctrine lifecycle event callback which is triggered on "preRemove" events.
	 * This method triggers the deletion of data related to this resource.
	 *
	 * @return void
	 * @ORM\PreRemove
	 */
	public function preRemove() {
		if ($this->lifecycleEventsActive && $this->deleted === FALSE) {
			$this->resourceManager->deleteResource($this);
		}
	}

	/**
	 * A very internal function which disables the Doctrine lifecycle events for this Resource.
	 *
	 * This is needed when some low-level operations need to be done, for example deleting a Resource from the
	 * ResourceRepository without unpublishing the (probably not existing) data from the storage.
	 *
	 * @return void
	 */
	public function disableLifecycleEvents() {
		$this->lifecycleEventsActive = FALSE;
	}

	/**
	 * An internal method which marks the Resource object as deleted.
	 *
	 * This method is called by the Resource Manager in order to prevent other code parts, for example the Doctrine
	 * lifecycle events, to delete this resource again.
	 *
	 * @param boolean $flag
	 * @return void
	 */
	public function setDeleted($flag = TRUE) {
		$this->deleted = $flag;
	}

	/**
	 * An internal method which tells if this Resource object has been already deleted by the Resource Manager.
	 *
	 * @return boolean
	 */
	public function isDeleted() {
		return $this->deleted;
	}

	/**
	 * Returns a string which distinctly identifies this object and thus can be used as an identifier for cache entries
	 * related to this object. Introduced through the CacheAwareInterface.
	 *
	 * @return string
	 */
	public function getCacheEntryIdentifier() {
		return $this->sha1;
	}

	/**
	 * Throws an exception if this Resource object is protected against modifications.
	 *
	 * @return void
	 * @throws Exception
	 */
	protected function throwExceptionIfProtected() {
		if ($this->protected) {
			throw new Exception(sprintf('Tried to set a property of the resource object with SHA1 hash %s after it has been protected. Modifications are not allowed as soon as the Resource has been published or persisted.', $this->sha1), 1377852347);
		}
	}

	/**
	 * Takes care of removing a possibly existing temporary local copy on destruction of this object.
	 *
	 * Note: we can't use __destruct() here because this would lead Doctrine to create a proxy method __destruct() which
	 *       will run __load(), which in turn will trigger the SQL protection in Flow Security, which will then discover
	 *       that a possibly previously existing session has been half-destroyed already (see FLOW-121).
	 *
	 * @return void
	 */
	public function shutdownObject() {
		if ($this->temporaryLocalCopyPathAndFilename !== NULL) {
			unlink($this->temporaryLocalCopyPathAndFilename);
		}
	}
}
namespace TYPO3\Flow\Resource;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Model representing a persistable resource
 * @\TYPO3\Flow\Annotations\Entity
 */
class Resource extends Resource_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface, \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface {

	/**
	 * @var string
	 * @ORM\Id
	 * @ORM\Column(length=40)
	 * introduced by TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect
	 */
	protected $Persistence_Object_Identifier = NULL;

	private $Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array();

	private $Flow_Aop_Proxy_groupedAdviceChains = array();

	private $Flow_Aop_Proxy_methodIsInAdviceMode = array();


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

			if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct'])) {

			} else {
				$this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct'] = TRUE;
				try {
				
					$methodArguments = array();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__construct']['TYPO3\Flow\Aop\Advice\BeforeAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__construct']['TYPO3\Flow\Aop\Advice\BeforeAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Resource\Resource', '__construct', $methodArguments);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

				$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Resource\Resource', '__construct', $methodArguments);
				$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
				$methodArguments = $joinPoint->getMethodArguments();

				} catch (\Exception $e) {
					unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct']);
					throw $e;
				}
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__construct']);
				return;
			}
		if ('TYPO3\Flow\Resource\Resource' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\Resource\Resource') {
			$this->initializeObject(1);
		}

		if (get_class($this) === 'TYPO3\Flow\Resource\Resource') {
		\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->registerShutdownObject($this, 'shutdownObject');
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 protected function Flow_Aop_Proxy_buildMethodsAndAdvicesArray() {
		if (method_exists(get_parent_class($this), 'Flow_Aop_Proxy_buildMethodsAndAdvicesArray') && is_callable('parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray')) parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

		$objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager;
		$this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array(
			'__construct' => array(
				'TYPO3\Flow\Aop\Advice\BeforeAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\BeforeAdvice('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', 'generateUuid', $objectManager, NULL),
				),
			),
			'__clone' => array(
				'TYPO3\Flow\Aop\Advice\BeforeAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\BeforeAdvice('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', 'generateUuid', $objectManager, NULL),
				),
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', 'cloneObject', $objectManager, NULL),
				),
			),
		);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

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
		if (method_exists(get_parent_class($this), '__wakeup') && is_callable('parent::__wakeup')) parent::__wakeup();

		if (get_class($this) === 'TYPO3\Flow\Resource\Resource') {
			$this->initializeObject(2);
		}

		if (get_class($this) === 'TYPO3\Flow\Resource\Resource') {
		\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->registerShutdownObject($this, 'shutdownObject');
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies() {
		if (!isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices) || empty($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices)) {
			$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
			if (is_callable('parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies')) parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixInjectedPropertiesForDoctrineProxies() {
		if (!$this instanceof \Doctrine\ORM\Proxy\Proxy || isset($this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies)) {
			return;
		}
		$this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies = TRUE;
		if (is_callable(array($this, 'Flow_Proxy_injectProperties'))) {
			$this->Flow_Proxy_injectProperties();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Aop_Proxy_getAdviceChains($methodName) {
		$adviceChains = array();
		if (isset($this->Flow_Aop_Proxy_groupedAdviceChains[$methodName])) {
			$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
		} else {
			if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName])) {
				$groupedAdvices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName];
				if (isset($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice'])) {
					$this->Flow_Aop_Proxy_groupedAdviceChains[$methodName]['TYPO3\Flow\Aop\Advice\AroundAdvice'] = new \TYPO3\Flow\Aop\Advice\AdviceChain($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice']);
					$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
				}
			}
		}
		return $adviceChains;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_invokeJoinPoint(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint) {
		if (__CLASS__ !== $joinPoint->getClassName()) return parent::Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode[$joinPoint->getMethodName()])) {
			return call_user_func_array(array('self', $joinPoint->getMethodName()), $joinPoint->getMethodArguments());
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __clone() {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone'])) {
		$result = NULL;

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone'] = TRUE;
			try {
			
					$methodArguments = array();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__clone']['TYPO3\Flow\Aop\Advice\BeforeAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__clone']['TYPO3\Flow\Aop\Advice\BeforeAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Resource\Resource', '__clone', $methodArguments);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

				$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Resource\Resource', '__clone', $methodArguments);
				$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
				$methodArguments = $joinPoint->getMethodArguments();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__clone']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['__clone']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Resource\Resource', '__clone', $methodArguments, NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['__clone']);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\Resource');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\Resource', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\Resource', $propertyName, 'var');
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
		$systemLogger_reference = &$this->systemLogger;
		$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Log\SystemLoggerInterface');
		if ($this->systemLogger === NULL) {
			$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6d57d95a1c3cd7528e3e6ea15012dac8', $systemLogger_reference);
			if ($this->systemLogger === NULL) {
				$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6d57d95a1c3cd7528e3e6ea15012dac8',  $systemLogger_reference, '', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Log\SystemLoggerInterface'); });
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
  0 => 'resourceManager',
  1 => 'systemLogger',
  2 => 'environment',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/Resource.php
#