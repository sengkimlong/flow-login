<?php 
namespace TYPO3\Flow\Persistence\Doctrine\DataTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Utility\TypeHandling;

/**
 * A datatype that replaces references to entities in arrays with a type/identifier tuple
 * and strips singletons from the data to be stored.
 */
class ObjectArray_Original extends Types\ArrayType {

	/**
	 * @var string
	 */
	const OBJECTARRAY = 'objectarray';

	/**
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * @var \TYPO3\Flow\Reflection\ReflectionService
	 */
	protected $reflectionService;

	/**
	 * Gets the name of this type.
	 *
	 * @return string
	 */
	public function getName() {
		return self::OBJECTARRAY;
	}

	/**
	 * Gets the SQL declaration snippet for a field of this type.
	 *
	 * @param array $fieldDeclaration
	 * @param AbstractPlatform $platform
	 * @return string
	 */
	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
		return $platform->getBlobTypeDeclarationSQL($fieldDeclaration);
	}

	/**
	 * Gets the (preferred) binding type for values of this type that
	 * can be used when binding parameters to prepared statements.
	 *
	 * @return integer
	 */
	public function getBindingType() {
		return \PDO::PARAM_LOB;
	}

	/**
	 * Converts a value from its database representation to its PHP representation
	 * of this type.
	 *
	 * @param mixed $value The value to convert.
	 * @param AbstractPlatform $platform The currently used database platform.
	 * @return array The PHP representation of the value.
	 */
	public function convertToPHPValue($value, AbstractPlatform $platform) {
		$this->initializeDependencies();

		switch ($platform->getName()) {
			case 'postgresql':
				$value = (is_resource($value)) ? stream_get_contents($value) : $value;
				$array = parent::convertToPHPValue(hex2bin($value), $platform);
				break;
			default:
				$array = parent::convertToPHPValue($value, $platform);
		}
		$this->decodeObjectReferences($array);

		return $array;
	}

	/**
	 * Converts a value from its PHP representation to its database representation
	 * of this type.
	 *
	 * @param array $array The value to convert.
	 * @param AbstractPlatform $platform The currently used database platform.
	 * @return mixed The database representation of the value.
	 */
	public function convertToDatabaseValue($array, AbstractPlatform $platform) {
		$this->initializeDependencies();

		$this->encodeObjectReferences($array);

		switch ($platform->getName()) {
			case 'postgresql':
				return bin2hex(parent::convertToDatabaseValue($array, $platform));
			default:
				return parent::convertToDatabaseValue($array, $platform);
		}
	}

	/**
	 * Fetches dependencies from the static object manager.
	 *
	 * Injection cannot be used, since __construct on Types\Type is final.
	 *
	 * @return void
	 */
	protected function initializeDependencies() {
		if ($this->persistenceManager === NULL) {
			$this->persistenceManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Persistence\PersistenceManagerInterface');
			$this->reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
		}
	}

	/**
	 * Traverses the $array and replaces known persisted objects (tuples of
	 * type and identifier) with actual instances.
	 *
	 * @param array $array
	 * @return void
	 */
	protected function decodeObjectReferences(array &$array) {
		foreach ($array as &$value) {
			if (!is_array($value)) {
				continue;
			}

			if (isset($value['__flow_object_type'])) {
				$value = $this->persistenceManager->getObjectByIdentifier($value['__identifier'], $value['__flow_object_type'], TRUE);
			} else {
				$this->decodeObjectReferences($value);
			}
		}
	}

	/**
	 * Traverses the $array and replaces known persisted objects with a tuple of
	 * type and identifier.
	 *
	 * @param array $array
	 * @return void
	 * @throws \RuntimeException
	 */
	protected function encodeObjectReferences(array &$array) {
		foreach ($array as &$value) {
			if (is_array($value)) {
				$this->encodeObjectReferences($value);
			}
			if (!is_object($value) || (is_object($value) && $value instanceof \TYPO3\Flow\Object\DependencyInjection\DependencyProxy)) {
				continue;
			}

			$propertyClassName = TypeHandling::getTypeForValue($value);

			if ($value instanceof \SplObjectStorage) {
				throw new \RuntimeException('SplObjectStorage in array properties is not supported', 1375196580);
			} elseif ($value instanceof \Doctrine\Common\Collections\Collection) {
				throw new \RuntimeException('Collection in array properties is not supported', 1375196581);
			} elseif ($value instanceof \ArrayObject) {
				throw new \RuntimeException('ArrayObject in array properties is not supported', 1375196582);
			} elseif ($this->persistenceManager->isNewObject($value) === FALSE
				&& (
					$this->reflectionService->isClassAnnotatedWith($propertyClassName, 'TYPO3\Flow\Annotations\Entity')
					|| $this->reflectionService->isClassAnnotatedWith($propertyClassName, 'TYPO3\Flow\Annotations\ValueObject')
					|| $this->reflectionService->isClassAnnotatedWith($propertyClassName, 'Doctrine\ORM\Mapping\Entity')
				)
			) {
				$value = array(
					'__flow_object_type' => $propertyClassName,
					'__identifier' => $this->persistenceManager->getIdentifierByObject($value)
				);
			}
		}
	}
}
namespace TYPO3\Flow\Persistence\Doctrine\DataTypes;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A datatype that replaces references to entities in arrays with a type/identifier tuple
 * and strips singletons from the data to be stored.
 */
class ObjectArray extends ObjectArray_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Persistence\Doctrine\DataTypes\ObjectArray');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Persistence\Doctrine\DataTypes\ObjectArray', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Persistence\Doctrine\DataTypes\ObjectArray', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Persistence/Doctrine/DataTypes/ObjectArray.php
#