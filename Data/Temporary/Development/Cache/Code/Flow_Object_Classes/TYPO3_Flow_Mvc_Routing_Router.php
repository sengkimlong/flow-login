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
use TYPO3\Flow\Configuration\ConfigurationManager;
use TYPO3\Flow\Http\Request;
use TYPO3\Flow\Log\SystemLoggerInterface;
use TYPO3\Flow\Mvc\Exception\InvalidRouteSetupException;
use TYPO3\Flow\Mvc\Exception\NoMatchingRouteException;

/**
 * The default web router
 *
 * @Flow\Scope("singleton")
 * @api
 */
class Router_Original implements RouterInterface {

	/**
	 * @Flow\Inject
	 * @var SystemLoggerInterface
	 */
	protected $systemLogger;

	/**
	 * @Flow\Inject
	 * @var ConfigurationManager
	 */
	protected $configurationManager;

	/**
	 * @Flow\Inject
	 * @var RouterCachingService
	 */
	protected $routerCachingService;

	/**
	 * Array containing the configuration for all routes
	 *
	 * @var array
	 */
	protected $routesConfiguration = NULL;

	/**
	 * Array of routes to match against
	 *
	 * @var array
	 */
	protected $routes = array();

	/**
	 * TRUE if route object have been created, otherwise FALSE
	 *
	 * @var boolean
	 */
	protected $routesCreated = FALSE;

	/**
	 * @var Route
	 */
	protected $lastMatchedRoute;

	/**
	 * @var Route
	 */
	protected $lastResolvedRoute;

	/**
	 * Sets the routes configuration.
	 *
	 * @param array $routesConfiguration The routes configuration or NULL if it should be fetched from configuration
	 * @return void
	 */
	public function setRoutesConfiguration(array $routesConfiguration = NULL) {
		$this->routesConfiguration = $routesConfiguration;
		$this->routesCreated = FALSE;
	}

	/**
	 * Iterates through all configured routes and calls matches() on them.
	 * Returns the matchResults of the matching route or NULL if no matching
	 * route could be found.
	 *
	 * @param Request $httpRequest The web request to be analyzed. Will be modified by the router.
	 * @return array The results of the matching route or NULL if no route matched
	 */
	public function route(Request $httpRequest) {
		$cachedMatchResults = $this->routerCachingService->getCachedMatchResults($httpRequest);
		if ($cachedMatchResults !== FALSE) {
			return $cachedMatchResults;
		}
		$this->lastMatchedRoute = NULL;
		$this->createRoutesFromConfiguration();

		/** @var $route Route */
		foreach ($this->routes as $route) {
			if ($route->matches($httpRequest) === TRUE) {
				$this->lastMatchedRoute = $route;
				$matchResults = $route->getMatchResults();
				if ($matchResults !== NULL) {
					$this->routerCachingService->storeMatchResults($httpRequest, $matchResults);
				}
				$this->systemLogger->log(sprintf('Router route(): Route "%s" matched the path "%s".', $route->getName(), $httpRequest->getRelativePath()), LOG_DEBUG);
				return $matchResults;
			}
		}
		$this->systemLogger->log(sprintf('Router route(): No route matched the route path "%s".', $httpRequest->getRelativePath()), LOG_NOTICE);
		return NULL;
	}

	/**
	 * Returns the route that has been matched with the last route() call.
	 * Returns NULL if no route matched or route() has not been called yet
	 *
	 * @return Route
	 */
	public function getLastMatchedRoute() {
		return $this->lastMatchedRoute;
	}

	/**
	 * Returns a list of configured routes
	 *
	 * @return array
	 */
	public function getRoutes() {
		$this->createRoutesFromConfiguration();
		return $this->routes;
	}

	/**
	 * Manually adds a route to the beginning of the configured routes
	 *
	 * @param Route $route
	 * @return void
	 */
	public function addRoute(Route $route) {
		$this->createRoutesFromConfiguration();
		array_unshift($this->routes, $route);
	}

	/**
	 * Builds the corresponding uri (excluding protocol and host) by iterating
	 * through all configured routes and calling their respective resolves()
	 * method. If no matching route is found, an empty string is returned.
	 * Note: calls of this message are cached by RouterCachingAspect
	 *
	 * @param array $routeValues Key/value pairs to be resolved. E.g. array('@package' => 'MyPackage', '@controller' => 'MyController');
	 * @return string
	 * @throws NoMatchingRouteException
	 */
	public function resolve(array $routeValues) {
		$cachedResolvedUriPath = $this->routerCachingService->getCachedResolvedUriPath($routeValues);
		if ($cachedResolvedUriPath !== FALSE) {
			return $cachedResolvedUriPath;
		}

		$this->lastResolvedRoute = NULL;
		$this->createRoutesFromConfiguration();

		/** @var $route Route */
		foreach ($this->routes as $route) {
			if ($route->resolves($routeValues)) {
				$this->lastResolvedRoute = $route;
				$resolvedUriPath = $route->getResolvedUriPath();
				if ($resolvedUriPath !== NULL) {
					$this->routerCachingService->storeResolvedUriPath($resolvedUriPath, $routeValues);
				}
				return $resolvedUriPath;
			}
		}
		$this->systemLogger->log('Router resolve(): Could not resolve a route for building an URI for the given route values.', LOG_WARNING, $routeValues);
		throw new NoMatchingRouteException('Could not resolve a route and its corresponding URI for the given parameters. This may be due to referring to a not existing package / controller / action while building a link or URI. Refer to log and check the backtrace for more details.', 1301610453);
	}

	/**
	 * Returns the route that has been resolved with the last resolve() call.
	 * Returns NULL if no route was found or resolve() has not been called yet
	 *
	 * @return Route
	 */
	public function getLastResolvedRoute() {
		return $this->lastResolvedRoute;
	}

	/**
	 * Creates \TYPO3\Flow\Mvc\Routing\Route objects from the injected routes
	 * configuration.
	 *
	 * @return void
	 * @throws InvalidRouteSetupException
	 */
	protected function createRoutesFromConfiguration() {
		if ($this->routesCreated === TRUE) {
			return;
		}
		$this->initializeRoutesConfiguration();
		$this->routes = array();
		$routesWithHttpMethodConstraints = array();
		foreach ($this->routesConfiguration as $routeConfiguration) {
			$route = new Route();
			if (isset($routeConfiguration['name'])) {
				$route->setName($routeConfiguration['name']);
			}
			$uriPattern = $routeConfiguration['uriPattern'];
			$route->setUriPattern($uriPattern);
			if (isset($routeConfiguration['defaults'])) {
				$route->setDefaults($routeConfiguration['defaults']);
			}
			if (isset($routeConfiguration['routeParts'])) {
				$route->setRoutePartsConfiguration($routeConfiguration['routeParts']);
			}
			if (isset($routeConfiguration['toLowerCase'])) {
				$route->setLowerCase($routeConfiguration['toLowerCase']);
			}
			if (isset($routeConfiguration['appendExceedingArguments'])) {
				$route->setAppendExceedingArguments($routeConfiguration['appendExceedingArguments']);
			}
			if (isset($routeConfiguration['httpMethods'])) {
				if (isset($routesWithHttpMethodConstraints[$uriPattern]) && $routesWithHttpMethodConstraints[$uriPattern] === FALSE) {
					throw new InvalidRouteSetupException(sprintf('There are multiple routes with the uriPattern "%s" and "httpMethods" option set. Please specify accepted HTTP methods for all of these, or adjust the uriPattern', $uriPattern), 1365678427);
				}
				$routesWithHttpMethodConstraints[$uriPattern] = TRUE;
				$route->setHttpMethods($routeConfiguration['httpMethods']);
			} else {
				if (isset($routesWithHttpMethodConstraints[$uriPattern]) && $routesWithHttpMethodConstraints[$uriPattern] === TRUE) {
					throw new InvalidRouteSetupException(sprintf('There are multiple routes with the uriPattern "%s" and "httpMethods" option set. Please specify accepted HTTP methods for all of these, or adjust the uriPattern', $uriPattern), 1365678432);
				}
				$routesWithHttpMethodConstraints[$uriPattern] = FALSE;
			}
			$this->routes[] = $route;
		}
		$this->routesCreated = TRUE;
	}

	/**
	 * Checks if a routes configuration was set and otherwise loads the configuration from the configuration manager.
	 *
	 * @return void
	 */
	protected function initializeRoutesConfiguration() {
		if ($this->routesConfiguration === NULL) {
			$this->routesConfiguration = $this->configurationManager->getConfiguration(ConfigurationManager::CONFIGURATION_TYPE_ROUTES);
		}
	}
}
namespace TYPO3\Flow\Mvc\Routing;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * The default web router
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class Router extends Router_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Mvc\Routing\Router') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Routing\Router', $this);
		if (get_class($this) === 'TYPO3\Flow\Mvc\Routing\Router') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Routing\RouterInterface', $this);
		if ('TYPO3\Flow\Mvc\Routing\Router' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Mvc\Routing\Router') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Routing\Router', $this);
		if (get_class($this) === 'TYPO3\Flow\Mvc\Routing\Router') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Routing\RouterInterface', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Mvc\Routing\Router');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Mvc\Routing\Router', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Mvc\Routing\Router', $propertyName, 'var');
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
		$systemLogger_reference = &$this->systemLogger;
		$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Log\SystemLoggerInterface');
		if ($this->systemLogger === NULL) {
			$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('6d57d95a1c3cd7528e3e6ea15012dac8', $systemLogger_reference);
			if ($this->systemLogger === NULL) {
				$this->systemLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('6d57d95a1c3cd7528e3e6ea15012dac8',  $systemLogger_reference, '', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Log\SystemLoggerInterface'); });
			}
		}
		$configurationManager_reference = &$this->configurationManager;
		$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Configuration\ConfigurationManager');
		if ($this->configurationManager === NULL) {
			$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('13edcae8fd67699bb78dadc8c1eac29c', $configurationManager_reference);
			if ($this->configurationManager === NULL) {
				$this->configurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('13edcae8fd67699bb78dadc8c1eac29c',  $configurationManager_reference, 'TYPO3\Flow\Configuration\ConfigurationManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager'); });
			}
		}
		$routerCachingService_reference = &$this->routerCachingService;
		$this->routerCachingService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Mvc\Routing\RouterCachingService');
		if ($this->routerCachingService === NULL) {
			$this->routerCachingService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('cf8e637408d150842eb90b1190a52096', $routerCachingService_reference);
			if ($this->routerCachingService === NULL) {
				$this->routerCachingService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('cf8e637408d150842eb90b1190a52096',  $routerCachingService_reference, 'TYPO3\Flow\Mvc\Routing\RouterCachingService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Mvc\Routing\RouterCachingService'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'systemLogger',
  1 => 'configurationManager',
  2 => 'routerCachingService',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Mvc/Routing/Router.php
#