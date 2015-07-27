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
use TYPO3\Flow\Resource\Collection;
use TYPO3\Flow\Resource\Storage\PackageStorage;
use TYPO3\Flow\Utility\Files;

/**
 * A target which publishes resources by creating symlinks.
 */
class FileSystemSymlinkTarget_Original extends FileSystemTarget {


	/**
	 * Publishes the whole collection to this target
	 *
	 * @param \TYPO3\Flow\Resource\Collection $collection The collection to publish
	 * @return void
	 */
	public function publishCollection(Collection $collection) {
		$storage = $collection->getStorage();
		if($storage instanceof PackageStorage) {
			foreach ($storage->getPublicResourcePaths() as $packageKey => $path) {
				$this->publishDirectory($path, $packageKey);
			}
		} else {
			parent::publishCollection($collection);
		}
	}

	/**
	 * Publishes the given source stream to this target, with the given relative path.
	 *
	 * @param resource $sourceStream Stream of the source to publish
	 * @param string $relativeTargetPathAndFilename relative path and filename in the target directory
	 * @throws Exception
	 * @throws \TYPO3\Flow\Utility\Exception
	 */
	protected function publishFile($sourceStream, $relativeTargetPathAndFilename) {
		$streamMetaData = stream_get_meta_data($sourceStream);

		if ($streamMetaData['wrapper_type'] !== 'plainfile' || $streamMetaData['stream_type'] !== 'STDIO') {
			throw new Exception(sprintf('Could not publish stream "%s" into resource publishing target "%s" because the source is not a local file.', $streamMetaData['uri'], $this->name), 1416242392);
		}

		$sourcePathAndFilename = $streamMetaData['uri'];
		$targetPathAndFilename = $this->path . $relativeTargetPathAndFilename;

		if (@stat($sourcePathAndFilename) === FALSE) {
			throw new Exception(sprintf('Could not publish "%s" into resource publishing target "%s" because the source file is not accessible (file stat failed).', $sourcePathAndFilename, $this->name), 1415716366);
		}

		if (!file_exists(dirname($targetPathAndFilename))) {
			Files::createDirectoryRecursively(dirname($targetPathAndFilename));
		}

		try {
			$temporaryTargetPathAndFilename = uniqid($targetPathAndFilename . '.') . '.tmp';
			symlink($sourcePathAndFilename, $temporaryTargetPathAndFilename);
			$result = rename($temporaryTargetPathAndFilename, $targetPathAndFilename);
		} catch (\Exception $exception) {
			$result = FALSE;
		}
		if ($result === FALSE) {
			throw new Exception(sprintf('Could not publish "%s" into resource publishing target "%s" because the source file could not be symlinked at target location.', $sourcePathAndFilename, $this->name), 1415716368, (isset($exception) ? $exception : NULL));
		}

		$this->systemLogger->log(sprintf('FileSystemSymlinkTarget: Published file. (target: %s, file: %s)', $this->name, $relativeTargetPathAndFilename), LOG_DEBUG);
	}

	/**
	 * Publishes the specified directory to this target, with the given relative path.
	 *
	 * @param string $sourcePath Absolute path to the source directory
	 * @param string $relativeTargetPathAndFilename relative path and filename in the target directory
	 * @throws Exception
	 * @return void
	 */
	protected function publishDirectory($sourcePath, $relativeTargetPathAndFilename) {
		$targetPathAndFilename = $this->path . $relativeTargetPathAndFilename;

		if (@stat($sourcePath) === FALSE) {
			throw new Exception(sprintf('Could not publish directory "%s" into resource publishing target "%s" because the source is not accessible (file stat failed).', $sourcePath, $this->name), 1416244512);
		}

		if (!file_exists(dirname($targetPathAndFilename))) {
			Files::createDirectoryRecursively(dirname($targetPathAndFilename));
		}

		try {
			$temporaryTargetPathAndFilename = uniqid($targetPathAndFilename . '.') . '.tmp';
			symlink($sourcePath, $temporaryTargetPathAndFilename);
			$result = rename($temporaryTargetPathAndFilename, $targetPathAndFilename);
		} catch (\Exception $exception) {
			$result = FALSE;
		}
		if ($result === FALSE) {
			throw new Exception(sprintf('Could not publish "%s" into resource publishing target "%s" because the source directory could not be symlinked at target location.', $sourcePath, $this->name), 1416244515, (isset($exception) ? $exception : NULL));
		}

		$this->systemLogger->log(sprintf('FileSystemSymlinkTarget: Published directory. (target: %s, file: %s)', $this->name, $relativeTargetPathAndFilename), LOG_DEBUG);
	}

}

namespace TYPO3\Flow\Resource\Target;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A target which publishes resources by creating symlinks.
 */
class FileSystemSymlinkTarget extends FileSystemSymlinkTarget_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
		if ('TYPO3\Flow\Resource\Target\FileSystemSymlinkTarget' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\Resource\Target\FileSystemSymlinkTarget') {
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

		if (get_class($this) === 'TYPO3\Flow\Resource\Target\FileSystemSymlinkTarget') {
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\Target\FileSystemSymlinkTarget');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\Target\FileSystemSymlinkTarget', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\Target\FileSystemSymlinkTarget', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/Target/FileSystemSymlinkTarget.php
#