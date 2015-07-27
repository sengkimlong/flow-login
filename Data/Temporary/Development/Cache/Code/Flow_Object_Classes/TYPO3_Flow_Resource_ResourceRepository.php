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
use TYPO3\Flow\Persistence\QueryResultInterface;
use TYPO3\Flow\Persistence\Repository;

/**
 * Resource Repository
 *
 * Note that this repository is not part of the public API and must not be used in client code. Please use the API
 * provided by Resource Manager instead.
 *
 * @Flow\Scope("singleton")
 * @see \TYPO3\Flow\Resource\ResourceManager
 */
class ResourceRepository_Original extends Repository {

	/**
	 * @var string
	 */
	const ENTITY_CLASSNAME = 'TYPO3\Flow\Resource\Resource';

	/**
	 * @var \SplObjectStorage
	 */
	protected $removedResources;

	/**
	 * @var \SplObjectStorage
	 */
	protected $addedResources;

	/**
	 * Constructor
	 */
	public function __construct() {
		parent::__construct();
		$this->removedResources = new \SplObjectStorage();
		$this->addedResources = new \SplObjectStorage();
	}

	/**
	 * @param object $object
	 * @throws \TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException
	 */
	public function add($object) {
		$this->persistenceManager->whitelistObject($object);
		if ($this->removedResources->contains($object)) {
			$this->removedResources->detach($object);
		}
		if (!$this->addedResources->contains($object)) {
			$this->addedResources->attach($object);
			parent::add($object);
		}
	}

	/**
	 * Removes a Resource object from this repository
	 *
	 * @param object $object
	 * @return void
	 */
	public function remove($object) {
		// Intercept a second call for the same Resource object because it might cause an endless loop caused by
		// the ResourceManager's deleteResource() method which also calls this remove() function:
		if (!$this->removedResources->contains($object)) {
			$this->removedResources->attach($object);
			parent::remove($object);
		}
	}

	/**
	 * Finds an object matching the given identifier.
	 *
	 * @param mixed $identifier The identifier of the object to find
	 * @return object The matching object if found, otherwise NULL
	 * @api
	 */
	public function findByIdentifier($identifier) {
		$object = $this->persistenceManager->getObjectByIdentifier($identifier, $this->entityClassName);
		if ($object === NULL) {
			foreach ($this->addedResources as $addedResource) {
				if ($this->persistenceManager->getIdentifierByObject($addedResource) === $identifier) {
					$object = $addedResource;
					break;
				}
			}
		}

		return $object;
	}

	/**
	 * Finds other resources which are referring to the same resource data and filename
	 *
	 * @param Resource $resource The resource used for finding similar resources
	 * @return QueryResultInterface The result, including the given resource
	 */
	public function findSimilarResources(Resource $resource) {
		$query = $this->createQuery();
		$query->matching(
			$query->logicalAnd(
				$query->equals('sha1', $resource->getSha1()),
				$query->equals('filename', $resource->getFilename())
			)
		);
		return $query->execute();
	}

	/**
	 * Find all resources with the same SHA1 hash
	 *
	 * @param string $sha1Hash
	 * @return array
	 */
	public function findBySha1($sha1Hash) {
		$query = $this->createQuery();
		$query->matching($query->equals('sha1', $sha1Hash));
		$resources = $query->execute()->toArray();
		foreach ($this->addedResources as $importedResource) {
			if ($importedResource->getSha1() === $sha1Hash) {
				$resources[] = $importedResource;
			}
		}

		return $resources;
	}

	/**
	 * Find one resource by SHA1
	 *
	 * @param string $sha1Hash
	 * @return Resource
	 */
	public function findOneBySha1($sha1Hash) {
		$query = $this->createQuery();
		$query->matching($query->equals('sha1', $sha1Hash))->setLimit(1);
		$resource = $query->execute()->getFirst();
		if ($resource === NULL) {
			foreach ($this->addedResources as $importedResource) {
				if ($importedResource->getSha1() === $sha1Hash) {
					return $importedResource;
				}
			}
		}

		return $resource;
	}

	/**
	 * @return \SplObjectStorage
	 */
	public function getAddedResources() {
		return clone $this->addedResources;
	}

}
namespace TYPO3\Flow\Resource;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Resource Repository
 * 
 * Note that this repository is not part of the public API and must not be used in client code. Please use the API
 * provided by Resource Manager instead.
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class ResourceRepository extends ResourceRepository_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceRepository') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Resource\ResourceRepository', $this);
		parent::__construct();
		if ('TYPO3\Flow\Resource\ResourceRepository' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Resource\ResourceRepository') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Resource\ResourceRepository', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Resource\ResourceRepository');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Resource\ResourceRepository', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Resource\ResourceRepository', $propertyName, 'var');
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
		$persistenceManager_reference = &$this->persistenceManager;
		$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Persistence\PersistenceManagerInterface');
		if ($this->persistenceManager === NULL) {
			$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('f1bc82ad47156d95485678e33f27c110', $persistenceManager_reference);
			if ($this->persistenceManager === NULL) {
				$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('f1bc82ad47156d95485678e33f27c110',  $persistenceManager_reference, 'TYPO3\Flow\Persistence\Doctrine\PersistenceManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'persistenceManager',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Resource/ResourceRepository.php
#