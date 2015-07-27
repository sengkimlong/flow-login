<?php 
namespace TYPO3\Flow\Error;

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
use TYPO3\Flow\Exception as FlowException;
use TYPO3\Flow\Http\Response;

/**
 * A basic but solid exception handler which catches everything which
 * falls through the other exception handlers and provides useful debugging
 * information.
 *
 * @Flow\Scope("singleton")
 */
class DebugExceptionHandler_Original extends AbstractExceptionHandler {

	/**
	 * Formats and echoes the exception as XHTML.
	 *
	 * @param \Exception $exception The exception object
	 * @return void
	 */
	protected function echoExceptionWeb(\Exception $exception) {
		$statusCode = 500;
		if ($exception instanceof FlowException) {
			$statusCode = $exception->getStatusCode();
		}
		$statusMessage = Response::getStatusMessageByCode($statusCode);
		if (!headers_sent()) {
			header(sprintf('HTTP/1.1 %s %s', $statusCode, $statusMessage));
		}

		if (isset($this->renderingOptions['templatePathAndFilename'])) {
			echo $this->buildCustomFluidView($exception, $this->renderingOptions)->render();
		} else {
			$this->renderStatically($statusCode, $exception);
		}
	}

	/**
	 * Returns the statically rendered exception message
	 *
	 * @param integer $statusCode
	 * @param \Exception $exception
	 * @return void
	 */
	protected function renderStatically($statusCode, \Exception $exception) {
		$statusMessage = Response::getStatusMessageByCode($statusCode);
		$exceptionHeader = '';
		while (TRUE) {
			$pathPosition = strpos($exception->getFile(), 'Packages/');
			$filePathAndName = ($pathPosition !== FALSE) ? substr($exception->getFile(), $pathPosition) : $exception->getFile();
			$exceptionCodeNumber = ($exception->getCode() > 0) ? '#' . $exception->getCode() . ': ' : '';

			$moreInformationLink = ($exceptionCodeNumber != '') ? '<p><a href="http://typo3.org/go/exception/' . $exception->getCode() . '">More information</a></p>' : '';
			$exceptionMessageParts = $this->splitExceptionMessage($exception->getMessage());

			$exceptionHeader .= '<h2 class="ExceptionSubject">' . $exceptionCodeNumber . htmlspecialchars($exceptionMessageParts['subject']) . '</h2>';
			if ($exceptionMessageParts['body'] !== '') {
				$exceptionHeader .= '<p class="ExceptionBody">' . nl2br(htmlspecialchars($exceptionMessageParts['body'])) . '</p>';
			}
			$exceptionHeader .= $moreInformationLink . '
				<span class="ExceptionProperty">' . get_class($exception) . '</span> thrown in file<br />
				<span class="ExceptionProperty">' . $filePathAndName . '</span> in line
				<span class="ExceptionProperty">' . $exception->getLine() . '</span>.<br />';
			if ($exception instanceof FlowException) {
				$exceptionHeader .= '<span class="ExceptionProperty">Reference code: ' . $exception->getReferenceCode() . '</span><br />';
			}

			if ($exception->getPrevious() === NULL) {
				break;
			}

			$exceptionHeader .= '<br /><div style="width: 100%; background-color: #515151; color: white; padding: 2px; margin: 0 0 6px 0;">Nested Exception</div>';
			$exception = $exception->getPrevious();
		}

		$backtraceCode = Debugger::getBacktraceCode($exception->getTrace());

		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
				"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
			<head>
				<title>' . $statusCode . ' ' . $statusMessage . '</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<style>
					.ExceptionSubject {
						margin: 0;
						padding: 0;
						font-size: 15px;
						color: #BE0027;
					}
					.ExceptionBody {
						padding: 10px;
						margin: 10px;
						color: black;
						background: #DDD;
					}
					.ExceptionProperty {
						color: #101010;
					}
					pre {
						margin: 0;
						font-size: 11px;
						color: #515151;
						background-color: #D0D0D0;
						padding-left: 30px;
					}
				</style>
			</head>
			<div style="
					position: absolute;
					left: 10px;
					background-color: #B9B9B9;
					outline: 1px solid #515151;
					color: #515151;
					font-family: Arial, Helvetica, sans-serif;
					font-size: 12px;
					margin: 10px;
					padding: 0;
				">
				<div style="width: 100%; background-color: #515151; color: white; padding: 2px; margin: 0 0 6px 0;">Uncaught Exception in Flow</div>
				<div style="width: 100%; padding: 2px; margin: 0 0 6px 0;">
					' . $exceptionHeader . '
					<br />
					' . $backtraceCode . '
				</div>
			</div>
		';
	}
}
namespace TYPO3\Flow\Error;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * A basic but solid exception handler which catches everything which
 * falls through the other exception handlers and provides useful debugging
 * information.
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class DebugExceptionHandler extends DebugExceptionHandler_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Error\DebugExceptionHandler') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Error\DebugExceptionHandler', $this);
		parent::__construct();
		if ('TYPO3\Flow\Error\DebugExceptionHandler' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Error\DebugExceptionHandler') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Error\DebugExceptionHandler', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Error\DebugExceptionHandler');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Error\DebugExceptionHandler', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Error\DebugExceptionHandler', $propertyName, 'var');
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
		$this->injectSystemLogger(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Log\SystemLoggerInterface'));
$this->Flow_Injected_Properties = array (
  0 => 'systemLogger',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Error/DebugExceptionHandler.php
#