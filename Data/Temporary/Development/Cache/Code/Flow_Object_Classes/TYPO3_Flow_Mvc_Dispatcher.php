<?php 
namespace TYPO3\Flow\Mvc;

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
use TYPO3\Flow\Cli\Request as CliRequest;
use TYPO3\Flow\Configuration\Exception\NoSuchOptionException;
use TYPO3\Flow\Http\Response as HttpResponse;
use TYPO3\Flow\Log\SecurityLoggerInterface;
use TYPO3\Flow\Mvc\Controller\ControllerInterface;
use TYPO3\Flow\Mvc\Controller\Exception\InvalidControllerException;
use TYPO3\Flow\Mvc\Exception\InfiniteLoopException;
use TYPO3\Flow\Mvc\Exception\StopActionException;
use TYPO3\Flow\Mvc\Exception\ForwardException;
use TYPO3\Flow\Object\ObjectManagerInterface;
use TYPO3\Flow\Security\Authentication\EntryPoint\WebRedirect;
use TYPO3\Flow\Security\Authentication\TokenInterface;
use TYPO3\Flow\Security\Authorization\FirewallInterface;
use TYPO3\Flow\Security\Context;
use TYPO3\Flow\Security\Exception\AccessDeniedException;
use TYPO3\Flow\Security\Exception\AuthenticationRequiredException;

/**
 * Dispatches requests to the controller which was specified by the request and
 * returns the response the controller generated.
 *
 * @Flow\Scope("singleton")
 * @api
 */
class Dispatcher_Original {

	/**
	 * @var ObjectManagerInterface
	 */
	protected $objectManager;

	/**
	 * @var array
	 */
	protected $settings = array();

	/**
	 * Inject the Object Manager through setter injection because property injection
	 * is not available during compile time.
	 *
	 * @param ObjectManagerInterface $objectManager
	 * @return void
	 */
	public function injectObjectManager(ObjectManagerInterface $objectManager) {
		$this->objectManager = $objectManager;
	}

	/**
	 * Injects the Flow settings
	 *
	 * @param array $settings The Flow settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Dispatches a request to a controller
	 *
	 * @param RequestInterface $request The request to dispatch
	 * @param ResponseInterface $response The response, to be modified by the controller
	 * @return void
	 * @throws AuthenticationRequiredException|AccessDeniedException
	 * @api
	 */
	public function dispatch(RequestInterface $request, ResponseInterface $response) {
		if ($request instanceof CliRequest) {
			$this->initiateDispatchLoop($request, $response);
			return;
		}

		// NOTE: The dispatcher is used for both Action- and CLI-Requests. For the latter case dispatching might happen during compile-time, that's why we can't inject the following dependencies

		/** @var Context $securityContext */
		$securityContext = $this->objectManager->get('TYPO3\Flow\Security\Context');
		if ($securityContext->areAuthorizationChecksDisabled()) {
			$this->initiateDispatchLoop($request, $response);
			return;
		}

		/** @var FirewallInterface $firewall */
		$firewall = $this->objectManager->get('TYPO3\Flow\Security\Authorization\FirewallInterface');
		/** @var SecurityLoggerInterface $securityLogger */
		$securityLogger = $this->objectManager->get('TYPO3\Flow\Log\SecurityLoggerInterface');

		try {
			/** @var ActionRequest $request */
			$firewall->blockIllegalRequests($request);
			$this->initiateDispatchLoop($request, $response);
		} catch (AuthenticationRequiredException $exception) {
			$entryPointFound = FALSE;
			/** @var $token TokenInterface */
			foreach ($securityContext->getAuthenticationTokens() as $token) {
				$entryPoint = $token->getAuthenticationEntryPoint();
				if ($entryPoint === NULL) {
					continue;
				}
				$entryPointFound = TRUE;
				if ($entryPoint instanceof WebRedirect) {
					$securityLogger->log('Redirecting to authentication entry point', LOG_INFO, $entryPoint->getOptions());
				} else {
					$securityLogger->log(sprintf('Starting authentication with entry point of type "%s"', get_class($entryPoint)), LOG_INFO);
				}
				$securityContext->setInterceptedRequest($request->getMainRequest());
				/** @var HttpResponse $response */
				$entryPoint->startAuthentication($request->getHttpRequest(), $response);
			}
			if ($entryPointFound === FALSE) {
				$securityLogger->log('No authentication entry point found for active tokens, therefore cannot authenticate or redirect to authentication automatically.', LOG_NOTICE);
				throw $exception;
			}
		} catch (AccessDeniedException $exception) {
			$securityLogger->log('Access denied', LOG_WARNING);
			throw $exception;
		}
	}

	/**
	 * Try processing the request until it is successfully marked "dispatched"
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @throws InvalidControllerException|InfiniteLoopException|NoSuchOptionException
	 */
	protected function initiateDispatchLoop(RequestInterface $request, ResponseInterface $response) {
		$dispatchLoopCount = 0;
		/** @var ActionRequest $request */
		while (!$request->isDispatched()) {
			if ($dispatchLoopCount++ > 99) {
				throw new Exception\InfiniteLoopException(sprintf('Could not ultimately dispatch the request after %d iterations.', $dispatchLoopCount), 1217839467);
			}
			$controller = $this->resolveController($request);
			try {
				$this->emitBeforeControllerInvocation($request, $response, $controller);
				$controller->processRequest($request, $response);
				$this->emitAfterControllerInvocation($request, $response, $controller);
			} catch (StopActionException $exception) {
				$this->emitAfterControllerInvocation($request, $response, $controller);
				if ($exception instanceof ForwardException) {
					$request = $exception->getNextRequest();
				} elseif (!$request->isMainRequest()) {
					$request = $request->getParentRequest();
				}
			}
		}
	}

	/**
	 * This signal is emitted directly before the request is been dispatched to a controller.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @param ControllerInterface $controller
	 * @return void
	 * @Flow\Signal
	 */
	protected function emitBeforeControllerInvocation(RequestInterface $request, ResponseInterface $response, ControllerInterface $controller) {
	}

	/**
	 * This signal is emitted directly after the request has been dispatched to a controller and the controller
	 * returned control back to the dispatcher.
	 *
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @param ControllerInterface $controller
	 * @return void
	 * @Flow\Signal
	 */
	protected function emitAfterControllerInvocation(RequestInterface $request, ResponseInterface $response, ControllerInterface $controller) {
	}

	/**
	 * Finds and instantiates a controller that matches the current request.
	 * If no controller can be found, an instance of NotFoundControllerInterface is returned.
	 *
	 * @param RequestInterface $request The request to dispatch
	 * @return ControllerInterface
	 * @throws NoSuchOptionException
	 * @throws Controller\Exception\InvalidControllerException
	 */
	protected function resolveController(RequestInterface $request) {
		/** @var ActionRequest $request */
		$controllerObjectName = $request->getControllerObjectName();
		if ($controllerObjectName === '') {
			if (isset($this->settings['mvc']['notFoundController'])) {
				throw new NoSuchOptionException('The configuration option TYPO3.Flow:mvc:notFoundController is deprecated since Flow 2.0. Use the "renderingGroups" option of the production exception handler instead in order to render custom error messages.', 1346949795);
			}
			$exceptionMessage = 'No controller could be resolved which would match your request';
			if ($request instanceof ActionRequest) {
				$exceptionMessage .= sprintf('. Package key: "%s", controller name: "%s"', $request->getControllerPackageKey(), $request->getControllerName());
				if ($request->getControllerSubpackageKey() !== NULL) {
					$exceptionMessage .= sprintf(', SubPackage key: "%s"', $request->getControllerSubpackageKey());
				}
				$exceptionMessage .= sprintf('. (%s %s)', $request->getHttpRequest()->getMethod(), $request->getHttpRequest()->getUri());
			}
			throw new Controller\Exception\InvalidControllerException($exceptionMessage, 1303209195, NULL, $request);
		}

		$controller = $this->objectManager->get($controllerObjectName);
		if (!$controller instanceof ControllerInterface) {
			throw new Controller\Exception\InvalidControllerException('Invalid controller "' . $request->getControllerObjectName() . '". The controller must be a valid request handling controller, ' . (is_object($controller) ? get_class($controller) : gettype($controller)) . ' given.', 1202921619, NULL, $request);
		}
		return $controller;
	}

}
namespace TYPO3\Flow\Mvc;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * Dispatches requests to the controller which was specified by the request and
 * returns the response the controller generated.
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class Dispatcher extends Dispatcher_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {

	private $Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array();

	private $Flow_Aop_Proxy_groupedAdviceChains = array();

	private $Flow_Aop_Proxy_methodIsInAdviceMode = array();


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
		if (get_class($this) === 'TYPO3\Flow\Mvc\Dispatcher') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Dispatcher', $this);
		if ('TYPO3\Flow\Mvc\Dispatcher' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 protected function Flow_Aop_Proxy_buildMethodsAndAdvicesArray() {
		if (method_exists(get_parent_class($this), 'Flow_Aop_Proxy_buildMethodsAndAdvicesArray') && is_callable('parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray')) parent::Flow_Aop_Proxy_buildMethodsAndAdvicesArray();

		$objectManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager;
		$this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices = array(
			'emitBeforeControllerInvocation' => array(
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\SignalSlot\SignalAspect', 'forwardSignalToDispatcher', $objectManager, NULL),
				),
			),
			'emitAfterControllerInvocation' => array(
				'TYPO3\Flow\Aop\Advice\AfterReturningAdvice' => array(
					new \TYPO3\Flow\Aop\Advice\AfterReturningAdvice('TYPO3\Flow\SignalSlot\SignalAspect', 'forwardSignalToDispatcher', $objectManager, NULL),
				),
			),
		);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {

		$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
		if (get_class($this) === 'TYPO3\Flow\Mvc\Dispatcher') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Mvc\Dispatcher', $this);

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
		if (method_exists(get_parent_class($this), '__wakeup') && is_callable('parent::__wakeup')) parent::__wakeup();
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies() {
		if (!isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices) || empty($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices)) {
			$this->Flow_Aop_Proxy_buildMethodsAndAdvicesArray();
			if (is_callable('parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies')) parent::Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_fixInjectedPropertiesForDoctrineProxies() {
		if (!$this instanceof \Doctrine\ORM\Proxy\Proxy || isset($this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies)) {
			return;
		}
		$this->Flow_Proxy_injectProperties_fixInjectedPropertiesForDoctrineProxies = TRUE;
		if (is_callable(array($this, 'Flow_Proxy_injectProperties'))) {
			$this->Flow_Proxy_injectProperties();
		}	}

	/**
	 * Autogenerated Proxy Method
	 */
	 private function Flow_Aop_Proxy_getAdviceChains($methodName) {
		$adviceChains = array();
		if (isset($this->Flow_Aop_Proxy_groupedAdviceChains[$methodName])) {
			$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
		} else {
			if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName])) {
				$groupedAdvices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices[$methodName];
				if (isset($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice'])) {
					$this->Flow_Aop_Proxy_groupedAdviceChains[$methodName]['TYPO3\Flow\Aop\Advice\AroundAdvice'] = new \TYPO3\Flow\Aop\Advice\AdviceChain($groupedAdvices['TYPO3\Flow\Aop\Advice\AroundAdvice']);
					$adviceChains = $this->Flow_Aop_Proxy_groupedAdviceChains[$methodName];
				}
			}
		}
		return $adviceChains;
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function Flow_Aop_Proxy_invokeJoinPoint(\TYPO3\Flow\Aop\JoinPointInterface $joinPoint) {
		if (__CLASS__ !== $joinPoint->getClassName()) return parent::Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode[$joinPoint->getMethodName()])) {
			return call_user_func_array(array('self', $joinPoint->getMethodName()), $joinPoint->getMethodArguments());
		}
	}

	/**
	 * Autogenerated Proxy Method
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @param ControllerInterface $controller
	 * @return void
	 * @\TYPO3\Flow\Annotations\Signal
	 */
	 protected function emitBeforeControllerInvocation(\TYPO3\Flow\Mvc\RequestInterface $request, \TYPO3\Flow\Mvc\ResponseInterface $response, \TYPO3\Flow\Mvc\Controller\ControllerInterface $controller) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitBeforeControllerInvocation'])) {
		$result = parent::emitBeforeControllerInvocation($request, $response, $controller);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['emitBeforeControllerInvocation'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['request'] = $request;
				$methodArguments['response'] = $response;
				$methodArguments['controller'] = $controller;
			
				$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Mvc\Dispatcher', 'emitBeforeControllerInvocation', $methodArguments);
				$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
				$methodArguments = $joinPoint->getMethodArguments();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitBeforeControllerInvocation']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitBeforeControllerInvocation']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Mvc\Dispatcher', 'emitBeforeControllerInvocation', $methodArguments, NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitBeforeControllerInvocation']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitBeforeControllerInvocation']);
		}
		return $result;
	}

	/**
	 * Autogenerated Proxy Method
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @param ControllerInterface $controller
	 * @return void
	 * @\TYPO3\Flow\Annotations\Signal
	 */
	 protected function emitAfterControllerInvocation(\TYPO3\Flow\Mvc\RequestInterface $request, \TYPO3\Flow\Mvc\ResponseInterface $response, \TYPO3\Flow\Mvc\Controller\ControllerInterface $controller) {

				// FIXME this can be removed again once Doctrine is fixed (see fixMethodsAndAdvicesArrayForDoctrineProxiesCode())
			$this->Flow_Aop_Proxy_fixMethodsAndAdvicesArrayForDoctrineProxies();
		if (isset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitAfterControllerInvocation'])) {
		$result = parent::emitAfterControllerInvocation($request, $response, $controller);

		} else {
			$this->Flow_Aop_Proxy_methodIsInAdviceMode['emitAfterControllerInvocation'] = TRUE;
			try {
			
					$methodArguments = array();

				$methodArguments['request'] = $request;
				$methodArguments['response'] = $response;
				$methodArguments['controller'] = $controller;
			
				$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Mvc\Dispatcher', 'emitAfterControllerInvocation', $methodArguments);
				$result = $this->Flow_Aop_Proxy_invokeJoinPoint($joinPoint);
				$methodArguments = $joinPoint->getMethodArguments();

				if (isset($this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitAfterControllerInvocation']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'])) {
					$advices = $this->Flow_Aop_Proxy_targetMethodsAndGroupedAdvices['emitAfterControllerInvocation']['TYPO3\Flow\Aop\Advice\AfterReturningAdvice'];
					$joinPoint = new \TYPO3\Flow\Aop\JoinPoint($this, 'TYPO3\Flow\Mvc\Dispatcher', 'emitAfterControllerInvocation', $methodArguments, NULL, $result);
					foreach ($advices as $advice) {
						$advice->invoke($joinPoint);
					}

					$methodArguments = $joinPoint->getMethodArguments();
				}

			} catch (\Exception $e) {
				unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitAfterControllerInvocation']);
				throw $e;
			}
			unset($this->Flow_Aop_Proxy_methodIsInAdviceMode['emitAfterControllerInvocation']);
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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Mvc\Dispatcher');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Mvc\Dispatcher', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Mvc\Dispatcher', $propertyName, 'var');
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
		$this->injectObjectManager(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Object\ObjectManagerInterface'));
		$this->injectSettings(\TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Configuration\ConfigurationManager')->getConfiguration('Settings', 'TYPO3.Flow'));
$this->Flow_Injected_Properties = array (
  0 => 'objectManager',
  1 => 'settings',
);
	}
}
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Mvc/Dispatcher.php
#