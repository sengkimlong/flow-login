<?php 
namespace TYPO3\Flow\Mvc\Routing;

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
use TYPO3\Flow\Cache\CacheAwareInterface;
use TYPO3\Flow\Http\Request;
use TYPO3\Flow\Utility\Arrays;
use TYPO3\Flow\Validation\Validator\UuidValidator;

/**
 * Caching of findMatchResults() and resolve() calls on the web Router.
 *
 * @Flow\Scope("singleton")
 */
class RouterCachingService_Original {

	/**
	 * @var \TYPO3\Flow\Cache\Frontend\VariableFrontend
	 * @Flow\Inject
	 */
	protected $routeCache;

	/**
	 * @var \TYPO3\Flow\Cache\Frontend\StringFrontend
	 * @Flow\Inject
	 */
	protected $resolveCache;

	/**
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 * @Flow\Inject
	 */
	protected $persistenceManager;

	/**
	 * @var \TYPO3\Flow\Log\SystemLoggerInterface
	 * @Flow\Inject
	 */
	protected $systemLogger;

	/**
	 * Checks the cache for the route path given in the Request and returns the result
	 *
	 * @param Request $httpRequest
	 * @return array|boolean the cached route values or FALSE if no cache entry was found
	 */
	public function getCachedMatchResults(Request $httpRequest) {
		$cachedResult = $this->routeCache->get($this->buildRouteCacheIdentifier($httpRequest));
		if ($cachedResult !== FALSE) {
			$this->systemLogger->log(sprintf('Router route(): A cached Route with the cache identifier "%s" matched the path "%s".', $this->buildRouteCacheIdentifier($httpRequest), $httpRequest->getRelativePath()), LOG_DEBUG);
		}

		return $cachedResult;
	}

	/**
	 * Stores the $matchResults in the cache
	 *
	 * @param Request $httpRequest
	 * @param array $matchResults
	 * @return void
	 */
	public function storeMatchResults(Request $httpRequest, array $matchResults) {
		if ($this->containsObject($matchResults)) {
			return;
		}
		$this->routeCache->set($this->buildRouteCacheIdentifier($httpRequest), $matchResults, $this->extractUuids($matchResults));
	}

	/**
	 * Checks the cache for the given route values and returns the cached resolvedUriPath if a cache entry is found
	 *
	 * @param array $routeValues
	 * @return string|boolean the cached request path or FALSE if no cache entry was found
	 */
	public function getCachedResolvedUriPath(array $routeValues) {
		$routeValues = $this->convertObjectsToHashes($routeValues);
		if ($routeValues === NULL) {
			return FALSE;
		}
		return $this->resolveCache->get($this->buildResolveCacheIdentifier($routeValues));
	}

	/**
	 * Stores the $uriPath in the cache together with the $routeValues
	 *
	 * @param string $uriPath
	 * @param array $routeValues
	 * @return void
	 */
	public function storeResolvedUriPath($uriPath, array $routeValues) {
		$routeValues = $this->convertObjectsToHashes($routeValues);
		if ($routeValues === NULL) {
			return;
		}

		$cacheIdentifier = $this->buildResolveCacheIdentifier($routeValues);
		if ($cacheIdentifier !== NULL) {
			$this->resolveCache->set($cacheIdentifier, $uriPath, $this->extractUuids($routeValues));
		}
	}

	/**
	 * Flushes 'route' and 'resolve' caches.
	 *
	 * @return void
	 */
	public function flushCaches() {
		$this->routeCache->flush();
		$this->resolveCache->flush();
	}

	/**
	 * Flushes 'findMatchResults' and 'resolve' caches for the given $tag
	 *
	 * @param string $tag
	 * @return void
	 */
	public function flushCachesByTag($tag) {
		$this->routeCache->flushByTag($tag);
		$this->resolveCache->flushByTag($tag);
	}

	/**
	 * Checks if the given subject contains an object
	 *
	 * @param mixed $subject
	 * @return boolean TRUE if $subject contains an object, otherwise FALSE
	 */
	protected function containsObject($subject) {
		if (is_object($subject)) {
			return TRUE;
		}
		if (!is_array($subject)) {
			return FALSE;
		}
		foreach ($subject as $value) {
			if ($this->containsObject($value)) {
				return TRUE;
			}
		}
		return FALSE;
	}

	/**
	 * Recursively converts objects in an array to their identifiers
	 *
	 * @param array $routeValues the array to be processed
	 * @return array the modified array or NULL if $routeValues contain an object and its identifier could not be determined
	 */
	protected function convertObjectsToHashes(array $routeValues) {
		foreach ($routeValues as &$value) {
			if (is_object($value)) {
				if ($value instanceof CacheAwareInterface) {
					$identifier = $value->getCacheEntryIdentifier();
				} else {
					$identifier = $this->persistenceManager->getIdentifierByObject($value);
				}
				if ($identifier === NULL) {
					return NULL;
				}
				$value = $identifier;
			} elseif (is_array($value)) {
				$value = $this->convertObjectsToHashes($value);
				if ($value === NULL) {
					return NULL;
				}
			}
		}
		return $routeValues;
	}

	/**
	 * Generates the Matching cache identifier for the given Request
	 *
	 * @param Request $httpRequest
	 * @return string
	 */
	protected function buildRouteCacheIdentifier(Request $httpRequest) {
		return md5(sprintf('%s_%s_%s', $httpRequest->getUri()->getHost(), $httpRequest->getRelativePath(), $httpRequest->getMethod()));
	}

	/**
	 * Generates the Resolve cache identifier for the given Request
	 *
	 * @param array $routeValues
	 * @return string
	 */
	protected function buildResolveCacheIdentifier(array $routeValues) {
		Arrays::sortKeysRecursively($routeValues);
		return md5(http_build_query($routeValues));
	}

	/**
	 * Helper method to generate tags by taking all UUIDs contained
	 * in the given $routeValues or $matchResults
	 *
	 * @param array $values
	 * @return array
	 */
	protected function extractUuids(array $values) {
		$uuids = array();
		foreach ($values as $value) {
			if (is_string($value)) {
				if (preg_match(UuidValidator::PATTERN_MATCH_UUID, $value) !== 0) {
					$uuids[] = $value;
				}
			} elseif (is_array($value)) {
				$uuids = array_merge($uuids, $this->extractUuids($value));
			}
		}
		return $uuids;
	}

}namespace TYPO3\Flow\Mvc\Routing;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Caching of findMatchResults() and resolve() calls on the web Router.
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class RouterCachingService extends RouterCachingService_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Mvc\Routing\RouterCachingService') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Routing\RouterCachingService', $this);
		if ('TYPO3\Flow\Mvc\Routing\RouterCachingService' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Mvc\Routing\RouterCachingService') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Routing\RouterCachingService', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Mvc\Routing\RouterCachingService');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Mvc\Routing\RouterCachingService', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Mvc\Routing\RouterCachingService', $propertyName, 'var');
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
		$routeCache_reference = &$this->routeCache;
		$this->routeCache = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('');
		if ($this->routeCache === NULL) {
			$this->routeCache = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('e72581e0dac2ce555ce990e1443a0545', $routeCache_reference);
			if ($this->routeCache === NULL) {
				$this->routeCache = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('e72581e0dac2ce555ce990e1443a0545',  $routeCache_reference, '', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Cache\CacheManager')->getCache('Flow_Mvc_Routing_Route'); });
			}
		}
		$resolveCache_reference = &$this->resolveCache;
		$this->resolveCache = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('');
		if ($this->resolveCache === NULL) {
			$this->resolveCache = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('945ae5d4f12ecd95f7db31e14a26896e', $resolveCache_reference);
			if ($this->resolveCache === NULL) {
				$this->resolveCache = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('945ae5d4f12ecd95f7db31e14a26896e',  $resolveCache_reference, '', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Cache\CacheManager')->getCache('Flow_Mvc_Routing_Resolve'); });
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
  0 => 'routeCache',
  1 => 'resolveCache',
  2 => 'persistenceManager',
  3 => 'systemLogger',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Mvc/Routing/RouterCachingService.php
#