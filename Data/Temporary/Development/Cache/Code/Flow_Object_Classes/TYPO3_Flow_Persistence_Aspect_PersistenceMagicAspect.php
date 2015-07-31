<?php 
namespace TYPO3\Flow\Persistence\Aspect;

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
use TYPO3\Flow\Aop\JoinPointInterface;
use TYPO3\Flow\Reflection\ObjectAccess;
use TYPO3\Flow\Reflection\ReflectionService;
use TYPO3\Flow\Utility\Algorithms;

/**
 * Adds the aspect of persistence magic to relevant objects
 *
 * @Flow\Scope("singleton")
 * @Flow\Aspect
 * @Flow\Introduce("TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect->isEntityOrValueObject", interfaceName="TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface")
 */
class PersistenceMagicAspect_Original {

	/**
	 * If the extension "igbinary" is installed, use it for increased performance
	 *
	 * @var boolean
	 */
	protected $useIgBinary;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @Flow\Inject
	 * @var ReflectionService
	 */
	protected $reflectionService;

	/**
	 * @Flow\Pointcut("classAnnotatedWith(TYPO3\Flow\Annotations\Entity) || classAnnotatedWith(Doctrine\ORM\Mapping\Entity)")
	 */
	public function isEntity() {}

	/**
	 * @Flow\Pointcut("TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect->isEntity || classAnnotatedWith(TYPO3\Flow\Annotations\ValueObject)")
	 */
	public function isEntityOrValueObject() {}

	/**
	 * @var string
	 * @ORM\Id
	 * @ORM\Column(length=40)
	 * @Flow\Introduce("TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect->isEntityOrValueObject && filter(TYPO3\Flow\Persistence\Doctrine\Mapping\Driver\FlowAnnotationDriver)")
	 */
	protected $Persistence_Object_Identifier;

	/**
	 * Initializes this aspect
	 *
	 * @return void
	 */
	public function initializeObject() {
		$this->useIgBinary = extension_loaded('igbinary');
	}

	/**
	 * After returning advice, making sure we have an UUID for each and every entity.
	 *
	 * @param \TYPO3\Flow\Aop\JoinPointInterface $joinPoint The current join point
	 * @return void
	 * @Flow\Before("TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect->isEntity && method(.*->(__construct|__clone)()) && filter(TYPO3\Flow\Persistence\Doctrine\Mapping\Driver\FlowAnnotationDriver)")
	 */
	public function generateUuid(JoinPointInterface $joinPoint) {
		/** @var $proxy \TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface */
		$proxy = $joinPoint->getProxy();
		ObjectAccess::setProperty($proxy, 'Persistence_Object_Identifier', Algorithms::generateUUID(), TRUE);
		$this->persistenceManager->registerNewObject($proxy);
	}

	/**
	 * After returning advice, generates the value hash for the object
	 *
	 * @param \TYPO3\Flow\Aop\JoinPointInterface $joinPoint The current join point
	 * @return void
	 * @Flow\After("classAnnotatedWith(TYPO3\Flow\Annotations\ValueObject) && method(.*->__construct()) && filter(TYPO3\Flow\Persistence\Doctrine\Mapping\Driver\FlowAnnotationDriver)")
	 */
	public function generateValueHash(JoinPointInterface $joinPoint) {
		$proxy = $joinPoint->getProxy();
		$proxyClassName = get_class($proxy);
		$hashSourceParts = array();

		$properties = $this->reflectionService->getClassPropertyNames($proxyClassName);
		foreach ($properties as $property) {
			// Currently, private properties are transient. Should this behaviour change, they need to be included
			// in the value hash generation
			if ($this->reflectionService->isPropertyAnnotatedWith($proxyClassName, $property, 'TYPO3\\Flow\\Annotations\\Transient')
				|| $this->reflectionService->isPropertyPrivate($proxyClassName, $property)) {
				continue;
			}

			$propertyValue = ObjectAccess::getProperty($proxy, $property, TRUE);

			if (is_object($propertyValue) === TRUE) {
				// The persistence manager will return NULL if the given object is unknown to persistence
				$propertyValue = ($this->persistenceManager->getIdentifierByObject($propertyValue)) ?: $propertyValue;
			}

			$hashSourceParts[$property] = $propertyValue;
		}

		ksort($hashSourceParts);

		$hashSourceParts['__class_name__'] = $proxyClassName;
		$serializedSource = ($this->useIgBinary === TRUE) ? igbinary_serialize($hashSourceParts) : serialize($hashSourceParts);

		$proxy = $joinPoint->getProxy();
		ObjectAccess::setProperty($proxy, 'Persistence_Object_Identifier', sha1($serializedSource), TRUE);
	}

	/**
	 * Mark object as cloned after cloning.
	 *
	 * Note: this is not used by anything in the Flow base distribution,
	 * but might be needed by custom backends (like TYPO3.CouchDB).
	 *
	 * @param \TYPO3\Flow\Aop\JoinPointInterface $joinPoint
	 * @return void
	 * @Flow\AfterReturning("TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect->isEntityOrValueObject && method(.*->__clone())")
	 */
	public function cloneObject(JoinPointInterface $joinPoint) {
		$joinPoint->getProxy()->Flow_Persistence_clone = TRUE;
	}

}
namespace TYPO3\Flow\Persistence\Aspect;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Adds the aspect of persistence magic to relevant objects
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 * @\TYPO3\Flow\Annotations\Aspect
 * @\TYPO3\Flow\Annotations\Introduce(pointcutExpression="TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect->isEntityOrValueObject", interfaceName="TYPO3\Flow\Persistence\Aspect\PersistenceMagicInterface")
 */
class PersistenceMagicAspect extends PersistenceMagicAspect_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', $this);
		if ('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect') {
			$this->initializeObject(1);
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', $this);

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

		if (get_class($this) === 'TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect') {
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Persistence\Aspect\PersistenceMagicAspect', $propertyName, 'var');
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
		$reflectionService_reference = &$this->reflectionService;
		$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Reflection\ReflectionService');
		if ($this->reflectionService === NULL) {
			$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('921ad637f16d2059757a908fceaf7076', $reflectionService_reference);
			if ($this->reflectionService === NULL) {
				$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('921ad637f16d2059757a908fceaf7076',  $reflectionService_reference, 'TYPO3\Flow\Reflection\ReflectionService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService'); });
			}
		}
$this->Flow_Injected_Properties = array (
  0 => 'persistenceManager',
  1 => 'reflectionService',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Persistence/Aspect/PersistenceMagicAspect.php
#