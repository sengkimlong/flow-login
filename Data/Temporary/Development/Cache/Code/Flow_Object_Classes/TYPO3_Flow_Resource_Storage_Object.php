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

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Resource\ResourceMetaDataInterface;
use TYPO3\Flow\Utility\MediaTypes;
use TYPO3\Flow\Utility\Unicode\Functions as UnicodeFunctions;

/**
 * An Object which is stored in a Storage
 *
 * This class is used internally as a representation of the actual storage data.
 *
 * The main purpose for Object is to transfer data and meta data from a storage to a publishing target. It must not be
 * used outside the resource management framework.
 */
class Object_Original implements ResourceMetaDataInterface {

	/**
	 * The IANA media type of the stored data
	 *
	 * @var string
	 */
	protected $mediaType;

	/**
	 * The suggested filename
	 *
	 * @var string
	 */
	protected $filename = '';

	/**
	 * The size of this object's data
	 *
	 * @var integer
	 */
	protected $fileSize;

	/**
	 * A suggested relative path for publication of this data
	 *
	 * @var string
	 */
	protected $relativePublicationPath = '';

	/**
	 * SHA1 hash identifying this object's data
	 *
	 * @var string
	 */
	protected $sha1;

	/**
	 * MD5 hash identifying this object's data
	 *
	 * @var string
	 */
	protected $md5;

	/**
	 * A stream (or, before it is used the first time, a Closure which returns a stream) which can deliver the data of this Object
	 *
	 * @var \Closure|resource
	 */
	protected $stream;

	/**
	 * Set the IANA media type of this Object
	 *
	 * @param string $mediaType
	 * @return void
	 */
	public function setMediaType($mediaType) {
		$this->mediaType = $mediaType;
	}

	/**
	 * Retrieve the IANA media type of this Object
	 *
	 * @return string
	 */
	public function getMediaType() {
		return $this->mediaType;
	}

	/**
	 * Set the suggested filename of this Object
	 *
	 * @param string $filename
	 * @return void
	 */
	public function setFilename($filename) {
		$pathInfo = UnicodeFunctions::pathinfo($filename);
		$extension = (isset($pathInfo['extension']) ? '.' . strtolower($pathInfo['extension']) : '');
		$this->filename = $pathInfo['filename'] . $extension;
		$this->mediaType = MediaTypes::getMediaTypeFromFilename($this->filename);
	}

	/**
	 * Retrieve the suggested filename of this Object
	 *
	 * @return string
	 */
	public function getFilename() {
		return $this->filename;
	}

	/**
	 * Set the suggested relative publication path
	 *
	 * @param string $relativePublicationPath
	 * @return void
	 */
	public function setRelativePublicationPath($relativePublicationPath) {
		$this->relativePublicationPath = $relativePublicationPath;
	}

	/**
	 * Retrieve the suggested relative publication path
	 *
	 * @return string
	 */
	public function getRelativePublicationPath() {
		return $this->relativePublicationPath;
	}

	/**
	 * Returns the size of the content of this storage object
	 *
	 * @return integer The content size
	 */
	public function getFileSize() {
		return $this->fileSize;
	}

	/**
	 * Sets the size of the content of this storage object
	 *
	 * @param integer $fileSize The content size
	 * @return void
	 */
	public function setFileSize($fileSize) {
		$this->fileSize = $fileSize;
	}

	/**
	 * Set the SHA1 hash identifying the data of this Object
	 *
	 * @param string $sha1
	 * @return void
	 */
	public function setSha1($sha1) {
		$this->sha1 = $sha1;
	}

	/**
	 * Retrieve the SHA1 hash identifying the data of this object
	 *
	 * @return string
	 */
	public function getSha1() {
		return $this->sha1;
	}

	/**
	 * Returns the md5 hash of the content of this storage object
	 *
	 * @return string The MD5 hash
	 */
	public function getMd5() {
		return $this->md5;
	}

	/**
	 * Sets the md5 hash of the content of this storage object
	 *
	 * @param string $md5 The MD5 hash
	 * @return void
	 */
	public function setMd5($md5) {
		$this->md5 = $md5;
	}

	/**
	 * Sets the data stream which can deliver the content of this storage object
	 *
	 * Instead of providing a stream (PHP resource), you can also pass a Closure which returns a stream when it is
	 * evaluated.
	 *
	 * @param resource|\Closure $stream The data stream, or a Closure which returns one
	 * @return void
	 */
	public function setStream($stream) {
		if (!is_resource($stream) && !$stream instanceof \Closure) {
			throw new \InvalidArgumentException(sprintf('setStream() expects a stream or Closure, %s given.', gettype($stream)), 1416311979);
		}
		$this->stream = $stream;
	}

	/**
	 * Returns the data stream which can deliver the content of this storage object
	 *
	 * @return resource A data stream resource; if the stream is seekable, it is rewound to the start
	 */
	public function getStream() {
		if ($this->stream instanceof \Closure) {
			$this->stream = $this->stream->__invoke();
		}
		if (is_resource($this->stream)) {
			$meta = stream_get_meta_data($this->stream);
			if ($meta['seekable']) {
				rewind($this->stream);
			}
		}
		return $this->stream;
	}

}
namespace TYPO3\Flow\Resource\Storage;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * An Object which is stored in a Storage
 * 
 * This class is used internally as a representation of the actual storage data.
 * 
 * The main purpose for Object is to transfer data and meta data from a storage to a publishing target. It must not be
 * used outside the resource management framework.
 */
class Object extends Object_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\Storage\Object');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\Storage\Object', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\Storage\Object', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/Storage/Object.php
#