<?php 
namespace TYPO3\Flow\I18n\Cldr\Reader;

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

/**
 * A reader for data placed in "numbers" tag in CLDR.
 *
 * The most important functionality of this class is formatting numbers. This is
 * an implementation of Number Format Patterns as defined in Unicode Technical
 * Standard #35. However, it's not complete implementation as for now.
 *
 * Following features are missing (in brackets - chapter from specification):
 * - support for escaping of special characters in format string [part of G.2]
 * - formatting numbers to scientific notation [G.4]
 * - support for significant digits [G.5]
 * - support for padding [G.6]
 * - formatting numbers in other number systems than "latn"
 * - currency symbol substitution is simplified
 *
 * @Flow\Scope("singleton")
 * @see http://www.unicode.org/reports/tr35/#Number_Elements
 * @see http://www.unicode.org/reports/tr35/#Number_Format_Patterns
 */
class NumbersReader_Original {

	/**
	 * An expression to catch one subformat. One format string can have
	 * one or two subformats (positive and negative, separated by semicolon).
	 */
	const PATTERN_MATCH_SUBFORMAT = '/^(.*?)[0-9#\.,]+(.*?)$/';

	/**
	 * An expression to catch float or decimal number embedded in the format
	 * string, which sets a rounding used during formatting. For example, when
	 * format string looks like '#,##0.05', it means that formatted number
	 * should be rounded to the nearest 0.05.
	 */
	const PATTERN_MATCH_ROUNDING = '/([0-9]+(?:\.[0-9]+)?)/';

	/**
	 * Constants for available format types.
	 */
	const FORMAT_TYPE_DECIMAL = 'decimal';
	const FORMAT_TYPE_PERCENT = 'percent';
	const FORMAT_TYPE_CURRENCY = 'currency';

	/**
	 * Constants for available format lengths.
	 */
	const FORMAT_LENGTH_DEFAULT = 'default';
	const FORMAT_LENGTH_FULL = 'full';
	const FORMAT_LENGTH_LONG = 'long';
	const FORMAT_LENGTH_MEDIUM = 'medium';
	const FORMAT_LENGTH_SHORT = 'short';

	/**
	 * @var \TYPO3\Flow\I18n\Cldr\CldrRepository
	 */
	protected $cldrRepository;

	/**
	 * @var \TYPO3\Flow\Cache\Frontend\VariableFrontend
	 */
	protected $cache;

	/**
	 * An array of parsed formats, indexed by format strings.
	 *
	 * Example of data stored in this array (default values):
	 * '#,##0.###' => array(
	 *     'positivePrefix' => '',
	 *     'positiveSuffix' => '',
	 *     'negativePrefix' => '-',
	 *     'negativeSuffix' => '',
	 *
	 *     'multiplier' => 1,
	 *
	 *     'minDecimalDigits' => 0,
	 *     'maxDecimalDigits' => 0,
	 *
	 *     'minIntegerDigits' => 1,
	 *
	 *     'primaryGroupingSize' => 0,
	 *     'secondaryGroupingSize' => 0,
	 *
	 *     'rounding' => 0.0,
	 * );
	 *
	 * Legend:
	 * - positivePrefix / positiveSuffix: a character to place before / after
	 *     the number, if it's positive.
	 * - negativePrefix / Suffix: same as above, but for negative numbers.
	 * - multiplier: Used for percents or permiles (100 and 1000 accordingly).
	 * - minDecimalDigits: same as above, but for decimal part of the number.
	 *     No less than 0 (which means no decimal part).
	 * - maxDecimalDigits: same as above, but for decimal part of the number.
	 *     No less than 0 (which means no decimal part).
	 * - minIntegerDigits: at least so many digits will be printed for integer
	 *     part of the number (padded with zeros if needed). No less than 1.
	 * - primaryGroupingSize: Where to put the first grouping separator (e.g.
	 *     thousands). Zero means no separator (also no secondary separator!).
	 * - secondaryGroupingSize: Where to put the second grouping separators (used
	 *     after the primary separator - eg for primaryGroupingSize set to 3 and
	 *     secondaryGroupingSize set to 2, number 123456789 will be 12,34,56,789).
	 *     For most languages, this is the same as primaryGroupingSize.
	 * - rounding: If set, number will be rounded to the multiple of this value.
	 *     Can be float or integer. Zero means no rounding.
	 *
	 * Note: there can be characters in prefix / suffix elements which will be
	 * localized during formatting (eg minus sign, percent etc), or other chars
	 * which will be used as-is.
	 *
	 * @var array
	 */
	protected $parsedFormats;

	/**
	 * An array which stores references to formats used by particular locales.
	 *
	 * As for one locale there can be defined many formats (at most 3 format
	 * types supported by this class - decimal, percent, currency - multiplied by
	 * at most 5 format lengths - full, long, medium, short, and implicit length
	 * referred in this class as 'default'), references are organized in arrays.
	 *
	 * Example of data stored in this array:
	 * 'pl' => array(
	 *     'decimal' => array(
	 *         'default' => '#,##0.###',
	 *         ...
	 *     ),
	 *     ...
	 * );
	 *
	 * @var array
	 */
	protected $parsedFormatsIndices;

	/**
	 * Associative array of symbols used in particular locales.
	 *
	 * Locale identifiers are keys for this array. Values are arrays of symbols,
	 * as defined in /ldml/numbers/symbols path in CLDR files.
	 *
	 * @var array
	 */
	protected $localizedSymbols;

	/**
	 * @param \TYPO3\Flow\I18n\Cldr\CldrRepository $repository
	 * @return void
	 */
	public function injectCldrRepository(\TYPO3\Flow\I18n\Cldr\CldrRepository $repository) {
		$this->cldrRepository = $repository;
	}

	/**
	 * Injects the Flow_I18n_CDLR_Reader_NumbersReader cache
	 *
	 * @param \TYPO3\Flow\Cache\Frontend\VariableFrontend $cache
	 * @return void
	 */
	public function injectCache(\TYPO3\Flow\Cache\Frontend\VariableFrontend $cache) {
		$this->cache = $cache;
	}

	/**
	 * Constructs the reader, loading parsed data from cache if available.
	 *
	 * @return void
	 */
	public function initializeObject() {
		if ($this->cache->has('parsedFormats') && $this->cache->has('parsedFormatsIndices') && $this->cache->has('localizedSymbols')) {
			$this->parsedFormats = $this->cache->get('parsedFormats');
			$this->parsedFormatsIndices = $this->cache->get('parsedFormatsIndices');
			$this->localizedSymbols = $this->cache->get('localizedSymbols');
		}
	}

	/**
	 * Shutdowns the object, saving parsed format strings to the cache.
	 *
	 * @return void
	 */
	public function shutdownObject() {
		$this->cache->set('parsedFormats', $this->parsedFormats);
		$this->cache->set('parsedFormatsIndices', $this->parsedFormatsIndices);
		$this->cache->set('localizedSymbols', $this->localizedSymbols);
	}

	/**
	 * Returns parsed number format basing on locale and desired format length
	 * if provided.
	 *
	 * When third parameter ($formatLength) equals 'default', default format for a
	 * locale will be used.
	 *
	 * @param \TYPO3\Flow\I18n\Locale $locale
	 * @param string $formatType A type of format (one of constant values)
	 * @param string $formatLength A length of format (one of constant values)
	 * @return array An array representing parsed format
	 * @throws \TYPO3\Flow\I18n\Cldr\Reader\Exception\UnableToFindFormatException When there is no proper format string in CLDR
	 */
	public function parseFormatFromCldr(\TYPO3\Flow\I18n\Locale $locale, $formatType, $formatLength = self::FORMAT_LENGTH_DEFAULT) {
		self::validateFormatType($formatType);
		self::validateFormatLength($formatLength);

		if (isset($this->parsedFormatsIndices[(string)$locale][$formatType][$formatLength])) {
			return $this->parsedFormats[$this->parsedFormatsIndices[(string)$locale][$formatType][$formatLength]];
		}

		if ($formatLength === self::FORMAT_LENGTH_DEFAULT) {
			$formatPath = 'numbers/' . $formatType . 'Formats/' . $formatType . 'FormatLength/' . $formatType . 'Format/pattern';
		} else {
			$formatPath = 'numbers/' . $formatType . 'Formats/' . $formatType . 'FormatLength[@type="' . $formatLength . '"]/' . $formatType . 'Format/pattern';
		}

		$model = $this->cldrRepository->getModelForLocale($locale);
		$format = $model->getElement($formatPath);

		if (empty($format)) {
			throw new \TYPO3\Flow\I18n\Cldr\Reader\Exception\UnableToFindFormatException('Number format was not found. Please check whether CLDR repository is valid.', 1280218995);
		}

		$parsedFormat = $this->parseFormat($format);

		$this->parsedFormatsIndices[(string)$locale][$formatType][$formatLength] = $format;
		return $this->parsedFormats[$format] = $parsedFormat;
	}

	/**
	 * Returns parsed date or time format string provided as parameter.
	 *
	 * @param string $format Format string to parse
	 * @return array An array representing parsed format
	 */
	public function parseCustomFormat($format) {
		if (isset($this->parsedFormats[$format])) {
			return $this->parsedFormats[$format];
		}

		return $this->parsedFormats[$format] = $this->parseFormat($format);
	}

	/**
	 * Returns symbols array for provided locale.
	 *
	 * Symbols are elements defined in tag symbols from CLDR. They define
	 * localized versions of various number-related elements, like decimal
	 * separator, group separator or minus sign.
	 *
	 * Symbols arrays for every requested locale are cached.
	 *
	 * @param \TYPO3\Flow\I18n\Locale $locale
	 * @return array Symbols array
	 */
	public function getLocalizedSymbolsForLocale(\TYPO3\Flow\I18n\Locale $locale) {
		if (isset($this->localizedSymbols[(string)$locale])) {
			return $this->localizedSymbols[(string)$locale];
		}

		$model = $this->cldrRepository->getModelForLocale($locale);
		return $this->localizedSymbols[(string)$locale] = $model->getRawArray('numbers/symbols');
	}

	/**
	 * Validates provided format type and throws exception if value is not
	 * allowed.
	 *
	 * @param string $formatType
	 * @return void
	 * @throws \TYPO3\Flow\I18n\Cldr\Reader\Exception\InvalidFormatTypeException When value is unallowed
	 */
	static public function validateFormatType($formatType) {
		if (!in_array($formatType, array(self::FORMAT_TYPE_DECIMAL, self::FORMAT_TYPE_PERCENT, self::FORMAT_TYPE_CURRENCY))) {
			throw new \TYPO3\Flow\I18n\Cldr\Reader\Exception\InvalidFormatTypeException('Provided formatType, "' . $formatType . '", is not one of allowed values.', 1281439179);
		}
	}

	/**
	 * Validates provided format length and throws exception if value is not
	 * allowed.
	 *
	 * @param string $formatLength
	 * @return void
	 * @throws \TYPO3\Flow\I18n\Cldr\Reader\Exception\InvalidFormatLengthException When value is unallowed
	 */
	static public function validateFormatLength($formatLength) {
		if (!in_array($formatLength, array(self::FORMAT_LENGTH_DEFAULT, self::FORMAT_LENGTH_FULL, self::FORMAT_LENGTH_LONG, self::FORMAT_LENGTH_MEDIUM, self::FORMAT_LENGTH_SHORT))) {
			throw new \TYPO3\Flow\I18n\Cldr\Reader\Exception\InvalidFormatLengthException('Provided formatLength, "' . $formatLength . '", is not one of allowed values.', 1281439180);
		}
	}

	/**
	 * Parses a number format (with syntax defined in CLDR).
	 *
	 * Not all features from CLDR specification are implemented. Please see the
	 * documentation for this class for details what is missing.
	 *
	 * @param string $format
	 * @return array Parsed format
	 * @throws \TYPO3\Flow\I18n\Cldr\Reader\Exception\UnsupportedNumberFormatException When unsupported format characters encountered
	 * @see \TYPO3\Flow\I18n\Cldr\Reader\NumbersReader::$parsedFormats
	 */
	protected function parseFormat($format) {
		foreach (array('E', '@', '*', '\'') as $unsupportedFeature) {
			if (strpos($format, $unsupportedFeature) !== FALSE) {
				throw new \TYPO3\Flow\I18n\Cldr\Reader\Exception\UnsupportedNumberFormatException('Encountered unsupported format characters in format string.', 1280219449);
			}
		}

		$parsedFormat =  array(
			'positivePrefix' => '',
			'positiveSuffix' => '',
			'negativePrefix' => '-',
			'negativeSuffix' => '',

			'multiplier' => 1,

			'minDecimalDigits' => 0,
			'maxDecimalDigits' => 0,

			'minIntegerDigits' => 1,

			'primaryGroupingSize' => 0,
			'secondaryGroupingSize' => 0,

			'rounding' => 0.0,
		);

		if (strpos($format, ';') !== FALSE) {
			list($positiveFormat, $negativeFormat) = explode(';', $format);
			$format = $positiveFormat;
		} else {
			$positiveFormat = $format;
			$negativeFormat = NULL;
		}

		if (preg_match(self::PATTERN_MATCH_SUBFORMAT, $positiveFormat, $matches) === 1) {
			$parsedFormat['positivePrefix'] = $matches[1];
			$parsedFormat['positiveSuffix'] = $matches[2];
		}

		if ($negativeFormat !== NULL && preg_match(self::PATTERN_MATCH_SUBFORMAT, $negativeFormat, $matches) === 1) {
			$parsedFormat['negativePrefix'] = $matches[1];
			$parsedFormat['negativeSuffix'] = $matches[2];
		} else {
			$parsedFormat['negativePrefix'] = '-' . $parsedFormat['positivePrefix'];
			$parsedFormat['negativeSuffix'] = $parsedFormat['positiveSuffix'];
		}

		if (strpos($format, '%') !== FALSE) {
			$parsedFormat['multiplier'] = 100;
		} elseif (strpos($format, '‰') !== FALSE) {
			$parsedFormat['multiplier'] = 1000;
		}

		if (preg_match(self::PATTERN_MATCH_ROUNDING, $format, $matches) === 1) {
			$parsedFormat['rounding'] = (float)$matches[1];
			$format = preg_replace('/[1-9]/', '0', $format);
		}

		if (($positionOfDecimalSeparator = strpos($format, '.')) !== FALSE) {
			if (($positionOfLastZero = strrpos($format, '0')) > $positionOfDecimalSeparator) {
				$parsedFormat['minDecimalDigits'] = $positionOfLastZero - $positionOfDecimalSeparator;
			}

			if (($positionOfLastHash = strrpos($format, '#')) >= $positionOfLastZero) {
				$parsedFormat['maxDecimalDigits'] = $positionOfLastHash - $positionOfDecimalSeparator;
			} else {
				$parsedFormat['maxDecimalDigits'] = $parsedFormat['minDecimalDigits'];
			}

			$format = substr($format, 0, $positionOfDecimalSeparator);
		}

		$formatWithoutGroupSeparators = str_replace(',', '', $format);
		if (($positionOfFirstZero = strpos($formatWithoutGroupSeparators, '0')) !== FALSE) {
			$parsedFormat['minIntegerDigits'] = strrpos($formatWithoutGroupSeparators, '0') - $positionOfFirstZero + 1;
		}

		$formatWithoutHashes = str_replace('#', '0', $format);
		if (($positionOfPrimaryGroupSeparator = strrpos($format, ',')) !== FALSE) {
			$parsedFormat['primaryGroupingSize'] = strrpos($formatWithoutHashes, '0') - $positionOfPrimaryGroupSeparator;

			if (($positionOfSecondaryGroupSeparator = strrpos(substr($formatWithoutHashes, 0, $positionOfPrimaryGroupSeparator), ',')) !== FALSE) {
				$parsedFormat['secondaryGroupingSize'] = $positionOfPrimaryGroupSeparator - $positionOfSecondaryGroupSeparator - 1;
			} else {
				$parsedFormat['secondaryGroupingSize'] = $parsedFormat['primaryGroupingSize'];
			}
		}

		return $parsedFormat;
	}
}
namespace TYPO3\Flow\I18n\Cldr\Reader;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A reader for data placed in "numbers" tag in CLDR.
 * 
 * The most important functionality of this class is formatting numbers. This is
 * an implementation of Number Format Patterns as defined in Unicode Technical
 * Standard #35. However, it's not complete implementation as for now.
 * 
 * Following features are missing (in brackets - chapter from specification):
 * - support for escaping of special characters in format string [part of G.2]
 * - formatting numbers to scientific notation [G.4]
 * - support for significant digits [G.5]
 * - support for padding [G.6]
 * - formatting numbers in other number systems than "latn"
 * - currency symbol substitution is simplified
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class NumbersReader extends NumbersReader_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\I18n\Cldr\Reader\NumbersReader') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\I18n\Cldr\Reader\NumbersReader', $this);
		if ('TYPO3\Flow\I18n\Cldr\Reader\NumbersReader' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}

		if (get_class($this) === 'TYPO3\Flow\I18n\Cldr\Reader\NumbersReader') {
			$this->initializeObject(1);
		}

		if (get_class($this) === 'TYPO3\Flow\I18n\Cldr\Reader\NumbersReader') {
		\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->registerShutdownObject($this, 'shutdownObject');
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\I18n\Cldr\Reader\NumbersReader') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\I18n\Cldr\Reader\NumbersReader', $this);

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

		if (get_class($this) === 'TYPO3\Flow\I18n\Cldr\Reader\NumbersReader') {
			$this->initializeObject(2);
		}

		if (get_class($this) === 'TYPO3\Flow\I18n\Cldr\Reader\NumbersReader') {
		\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->registerShutdownObject($this, 'shutdownObject');
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\I18n\Cldr\Reader\NumbersReader');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\I18n\Cldr\Reader\NumbersReader', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\I18n\Cldr\Reader\NumbersReader', $propertyName, 'var');
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
		$this->injectCache(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Cache\CacheManager')->getCache('Flow_I18n_Cldr_Reader_NumbersReaderCache'));
		$this->injectCldrRepository(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\I18n\Cldr\CldrRepository'));
$this->Flow_Injected_Properties = array (
  0 => 'cache',
  1 => 'cldrRepository',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/I18n/Cldr/Reader/NumbersReader.php
#