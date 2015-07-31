<?php 
namespace TYPO3\Flow\Persistence\Doctrine;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Configuration;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Configuration\Exception\InvalidConfigurationException;
use TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException;

/**
 * EntityManager factory for Doctrine integration
 *
 * @Flow\Scope("singleton")
 */
class EntityManagerFactory_Original {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Object\ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Reflection\ReflectionService
	 */
	protected $reflectionService;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Utility\Environment
	 */
	protected $environment;

	/**
	 * @var array
	 */
	protected $settings = array();

	/**
	 * Injects the Flow settings, the persistence part is kept
	 * for further use.
	 *
	 * @param array $settings
	 * @return void
	 * @throws InvalidConfigurationException
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings['persistence'];
		if (!is_array($this->settings['doctrine'])) {
			throw new InvalidConfigurationException(sprintf('The TYPO3.Flow.persistence.doctrine settings need to be an array, %s given.', gettype($this->settings['doctrine'])), 1392800005);
		}
		if (!is_array($this->settings['backendOptions'])) {
			throw new InvalidConfigurationException(sprintf('The TYPO3.Flow.persistence.backendOptions settings need to be an array, %s given.', gettype($this->settings['backendOptions'])), 1426149224);
		}

	}

	/**
	 * Factory method which creates an EntityManager.
	 *
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function create() {
		$config = new Configuration();
		$config->setClassMetadataFactoryName('TYPO3\Flow\Persistence\Doctrine\Mapping\ClassMetadataFactory');

		$cache = new \TYPO3\Flow\Persistence\Doctrine\CacheAdapter();
		// must use ObjectManager in compile phase...
		$cache->setCache($this->objectManager->get('TYPO3\Flow\Cache\CacheManager')->getCache('Flow_Persistence_Doctrine'));
		$config->setMetadataCacheImpl($cache);
		$config->setQueryCacheImpl($cache);

		$resultCache = new \TYPO3\Flow\Persistence\Doctrine\CacheAdapter();
		// must use ObjectManager in compile phase...
		$resultCache->setCache($this->objectManager->get('TYPO3\Flow\Cache\CacheManager')->getCache('Flow_Persistence_Doctrine_Results'));
		$config->setResultCacheImpl($resultCache);

		if (is_string($this->settings['doctrine']['sqlLogger']) && class_exists($this->settings['doctrine']['sqlLogger'])) {
			$sqlLoggerInstance = new $this->settings['doctrine']['sqlLogger']();
			if ($sqlLoggerInstance instanceof \Doctrine\DBAL\Logging\SQLLogger) {
				$config->setSQLLogger($sqlLoggerInstance);
			} else {
				throw new InvalidConfigurationException(sprintf('TYPO3.Flow.persistence.doctrine.sqlLogger must point to a \Doctrine\DBAL\Logging\SQLLogger implementation, %s given.', get_class($sqlLoggerInstance)), 1426150388);
			}
		}

		$eventManager = $this->buildEventManager();

		$flowAnnotationDriver = $this->objectManager->get('TYPO3\Flow\Persistence\Doctrine\Mapping\Driver\FlowAnnotationDriver');
		$config->setMetadataDriverImpl($flowAnnotationDriver);

		$proxyDirectory = \TYPO3\Flow\Utility\Files::concatenatePaths(array($this->environment->getPathToTemporaryDirectory(), 'Doctrine/Proxies'));
		\TYPO3\Flow\Utility\Files::createDirectoryRecursively($proxyDirectory);
		$config->setProxyDir($proxyDirectory);
		$config->setProxyNamespace('TYPO3\Flow\Persistence\Doctrine\Proxies');
		$config->setAutoGenerateProxyClasses(FALSE);

		// The following code tries to connect first, if that succeeds, all is well. If not, the platform is fetched directly from the
		// driver - without version checks to the database server (to which no connection can be made) - and is added to the config
		// which is then used to create a new connection. This connection will then return the platform directly, without trying to
		// detect the version it runs on, which fails if no connection can be made. But the platform is used even if no connection can
		// be made, which was no problem with Doctrine DBAL 2.3. And then came version-aware drivers and platforms...
		$connection = \Doctrine\DBAL\DriverManager::getConnection($this->settings['backendOptions'], $config, $eventManager);
		try {
			$connection->connect();
		} catch (\Doctrine\DBAL\Exception\ConnectionException $e) {
			$settings = $this->settings['backendOptions'];
			$settings['platform'] = $connection->getDriver()->getDatabasePlatform();
			$connection = \Doctrine\DBAL\DriverManager::getConnection($settings, $config, $eventManager);
		}

		$entityManager = \Doctrine\ORM\EntityManager::create($connection, $config, $eventManager);
		$flowAnnotationDriver->setEntityManager($entityManager);

		if (isset($this->settings['doctrine']['dbal']['mappingTypes']) && is_array($this->settings['doctrine']['dbal']['mappingTypes'])) {
			foreach ($this->settings['doctrine']['dbal']['mappingTypes'] as $typeName => $typeConfiguration) {
				Type::addType($typeName, $typeConfiguration['className']);
				$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping($typeConfiguration['dbType'], $typeName);
			}
		}

		if (isset($this->settings['doctrine']['filters']) && is_array($this->settings['doctrine']['filters'])) {
			foreach ($this->settings['doctrine']['filters'] as $filterName => $filterClass) {
				$config->addFilter($filterName, $filterClass);
				$entityManager->getFilters()->enable($filterName);
			}
		}

		if (isset($this->settings['doctrine']['dql']) && is_array($this->settings['doctrine']['dql'])) {
			$this->applyDqlSettingsToConfiguration($this->settings['doctrine']['dql'], $config);
		}

		return $entityManager;
	}

	/**
	 * Add configured event subscribers and listeners to the event manager
	 *
	 * @return \Doctrine\Common\EventManager
	 * @throws \TYPO3\Flow\Persistence\Exception\IllegalObjectTypeException
	 */
	protected function buildEventManager() {
		$eventManager = new \Doctrine\Common\EventManager();
		if (isset($this->settings['doctrine']['eventSubscribers']) && is_array($this->settings['doctrine']['eventSubscribers'])) {
			foreach ($this->settings['doctrine']['eventSubscribers'] as $subscriberClassName) {
				$subscriber = $this->objectManager->get($subscriberClassName);
				if (!$subscriber instanceof \Doctrine\Common\EventSubscriber) {
					throw new IllegalObjectTypeException('Doctrine eventSubscribers must extend class \Doctrine\Common\EventSubscriber, ' . $subscriberClassName . ' fails to do so.', 1366018193);
				}
				$eventManager->addEventSubscriber($subscriber);
			}
		}
		if (isset($this->settings['doctrine']['eventListeners']) && is_array($this->settings['doctrine']['eventListeners'])) {
			foreach ($this->settings['doctrine']['eventListeners'] as $listenerOptions) {
				$listener = $this->objectManager->get($listenerOptions['listener']);
				$eventManager->addEventListener($listenerOptions['events'], $listener);
			}
		}
		return $eventManager;
	}

	/**
	 * Apply configured settings regarding DQL to the Doctrine Configuration.
	 * At the moment, these are custom DQL functions.
	 *
	 * @param array $configuredSettings
	 * @param Configuration $doctrineConfiguration
	 * @return void
	 */
	protected function applyDqlSettingsToConfiguration(array $configuredSettings, Configuration $doctrineConfiguration) {
		if (isset($configuredSettings['customStringFunctions'])) {
			$doctrineConfiguration->setCustomStringFunctions($configuredSettings['customStringFunctions']);
		}
		if (isset($configuredSettings['customNumericFunctions'])) {
			$doctrineConfiguration->setCustomNumericFunctions($configuredSettings['customNumericFunctions']);
		}
		if (isset($configuredSettings['customDatetimeFunctions'])) {
			$doctrineConfiguration->setCustomDatetimeFunctions($configuredSettings['customDatetimeFunctions']);
		}
	}

}
namespace TYPO3\Flow\Persistence\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * EntityManager factory for Doctrine integration
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class EntityManagerFactory extends EntityManagerFactory_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory', $this);
		if ('TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Persistence\Doctrine\EntityManagerFactory', $propertyName, 'var');
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
		$reflectionService_reference = &$this->reflectionService;
		$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Reflection\ReflectionService');
		if ($this->reflectionService === NULL) {
			$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('921ad637f16d2059757a908fceaf7076', $reflectionService_reference);
			if ($this->reflectionService === NULL) {
				$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('921ad637f16d2059757a908fceaf7076',  $reflectionService_reference, 'TYPO3\Flow\Reflection\ReflectionService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService'); });
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
  0 => 'settings',
  1 => 'objectManager',
  2 => 'reflectionService',
  3 => 'environment',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Persistence/Doctrine/EntityManagerFactory.php
#