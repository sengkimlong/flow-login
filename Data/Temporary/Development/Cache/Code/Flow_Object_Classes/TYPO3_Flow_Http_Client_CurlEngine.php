<?php 
namespace TYPO3\Flow\Http\Client;

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
use TYPO3\Flow\Http\Request;
use TYPO3\Flow\Http\Response;

/**
 * A Request Engine which uses cURL in order to send requests to external
 * HTTP servers.
 */
class CurlEngine_Original implements RequestEngineInterface {

	/**
	 * @var array
	 */
	protected $options = array(
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_HEADER => TRUE,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_FRESH_CONNECT => TRUE,
		CURLOPT_FORBID_REUSE => TRUE,
		CURLOPT_TIMEOUT => 30,
	);

	/**
	 * Sets an option to be used by cURL.
	 *
	 * @param integer $optionName One of the CURLOPT_* constants
	 * @param mixed $value The value to set
	 */
	public function setOption($optionName, $value) {
		$this->options[$optionName] = $value;
	}

	/**
	 * Sends the given HTTP request
	 *
	 * @param \TYPO3\Flow\Http\Request $request
	 * @return \TYPO3\Flow\Http\Response The response or FALSE
	 * @api
	 * @throws \TYPO3\Flow\Http\Exception
	 * @throws CurlEngineException
	 */
	public function sendRequest(Request $request) {
		if (!extension_loaded('curl')) {
			throw new \TYPO3\Flow\Http\Exception('CurlEngine requires the PHP CURL extension to be installed and loaded.', 1346319808);
		}

		$requestUri = $request->getUri();
		$curlHandle = curl_init((string)$requestUri);

		curl_setopt_array($curlHandle, $this->options);

		// Send an empty Expect header in order to avoid chunked data transfer (which we can't handle yet).
		// If we don't set this, cURL will set "Expect: 100-continue" for requests larger than 1024 bytes.
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array('Expect:'));

		// If the content is a stream resource, use cURL's INFILE feature to stream it
		$content = $request->getContent();
		if (is_resource($content)) {
			curl_setopt_array($curlHandle,
				array(
					CURLOPT_INFILE => $content,
					CURLOPT_INFILESIZE => $request->getHeader('Content-Length'),
				)
			);
		}

		switch ($request->getMethod()) {
			case 'GET' :
				if ($request->getContent()) {
					// workaround because else the request would implicitly fall into POST:
					curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, 'GET');
					if (!is_resource($content)) {
						curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $content);
					}
				}
			break;
			case 'POST' :
				curl_setopt($curlHandle, CURLOPT_POST, TRUE);
				if (!is_resource($content)) {
					$body = $content !== '' ? $content : http_build_query($request->getArguments());
					curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $body);
				}
			break;
			case 'PUT' :
				curl_setopt($curlHandle, CURLOPT_PUT, TRUE);
				if (!is_resource($content) && $content !== '') {
					$inFileHandler = fopen('php://temp', 'r+');
					fwrite($inFileHandler, $request->getContent());
					rewind($inFileHandler);
					curl_setopt_array($curlHandle, array(
						CURLOPT_INFILE => $inFileHandler,
						CURLOPT_INFILESIZE => strlen($request->getContent()),
					));
				}
			break;
			default:
				if (!is_resource($content)) {
					$body = $content !== '' ? $content : http_build_query($request->getArguments());
					curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $body);
				}
				curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $request->getMethod());
		}

		$preparedHeaders = array();
		foreach ($request->getHeaders()->getAll() as $fieldName => $values) {
			foreach ($values as $value) {
				$preparedHeaders[] = $fieldName . ': ' . $value;
			}
		}
		curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $preparedHeaders);

		// curl_setopt($curlHandle, CURLOPT_PROTOCOLS, CURLPROTO_HTTP && CURLPROTO_HTTPS);
		// CURLOPT_UPLOAD

		if ($requestUri->getPort() !== NULL) {
			curl_setopt($curlHandle, CURLOPT_PORT, $requestUri->getPort());
		}

		// CURLOPT_COOKIE

		$curlResult = curl_exec($curlHandle);
		if ($curlResult === FALSE) {
			throw new CurlEngineException(sprintf('cURL reported error code %s with message "%s". Last requested URL was "%s" (%s).', curl_errno($curlHandle), curl_error($curlHandle), curl_getinfo($curlHandle, CURLINFO_EFFECTIVE_URL), $request->getMethod()), 1338906040);
		} elseif (strlen($curlResult) === 0) {
			return FALSE;
		}
		curl_close($curlHandle);

		$response = Response::createFromRaw($curlResult);
		if ($response->getStatusCode() === 100) {
			$response = Response::createFromRaw($response->getContent(), $response);
		}
		return $response;
	}

}
namespace TYPO3\Flow\Http\Client;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A Request Engine which uses cURL in order to send requests to external
 * HTTP servers.
 */
class CurlEngine extends CurlEngine_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Http\Client\CurlEngine');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Http\Client\CurlEngine', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Http\Client\CurlEngine', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Http/Client/CurlEngine.php
#