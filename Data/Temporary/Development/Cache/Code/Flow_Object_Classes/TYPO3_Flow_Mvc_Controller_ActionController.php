<?php 
namespace TYPO3\Flow\Mvc\Controller;

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
use TYPO3\Flow\Error\Result;
use TYPO3\Flow\Mvc\Exception\ForwardException;
use TYPO3\Flow\Mvc\Exception\InvalidActionVisibilityException;
use TYPO3\Flow\Mvc\Exception\NoSuchActionException;
use TYPO3\Flow\Property\Exception\TargetNotFoundException;
use TYPO3\Flow\Property\TypeConverter\Error\TargetNotFoundError;

/**
 * An HTTP based multi-action controller.
 *
 * The action specified in the given ActionRequest is dispatched to a method in
 * the concrete controller whose name ends with "*Action". If no matching action
 * method is found, the action specified in $errorMethodName is invoked.
 *
 * This controller also takes care of mapping arguments found in the ActionRequest
 * to the corresponding method arguments of the action method. It also invokes
 * validation for these arguments by invoking the Property Mapper.
 *
 * By defining media types in $supportedMediaTypes, content negotiation based on
 * the browser's Accept header and additional routing configuration is used to
 * determine the output format the controller should return.
 *
 * Depending on the action being called, a fitting view - by default a Fluid template
 * view - will be selected. By specifying patterns, custom view classes or an alternative
 * controller / action to template path mapping can be defined.
 *
 * @api
 */
class ActionController_Original extends AbstractController {

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
	 * @var \TYPO3\Flow\Mvc\Controller\MvcPropertyMappingConfigurationService
	 */
	protected $mvcPropertyMappingConfigurationService;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Mvc\ViewConfigurationManager
	 */
	protected $viewConfigurationManager;

	/**
	 * The current view, as resolved by resolveView()
	 *
	 * @var \TYPO3\Flow\Mvc\View\ViewInterface
	 * @api
	 */
	protected $view = NULL;

	/**
	 * Pattern after which the view object name is built if no format-specific
	 * view could be resolved.
	 *
	 * @var string
	 * @api
	 */
	protected $viewObjectNamePattern = '@package\View\@controller\@action@format';

	/**
	 * A list of formats and object names of the views which should render them.
	 *
	 * Example:
	 *
	 * array('html' => 'MyCompany\MyApp\MyHtmlView', 'json' => 'MyCompany\...
	 *
	 * @var array
	 */
	protected $viewFormatToObjectNameMap = array();

	/**
	 * The default view object to use if none of the resolved views can render
	 * a response for the current request.
	 *
	 * @var string
	 * @api
	 */
	protected $defaultViewObjectName = 'TYPO3\Fluid\View\TemplateView';

	/**
	 * Name of the action method
	 *
	 * @var string
	 */
	protected $actionMethodName;

	/**
	 * Name of the special error action method which is called in case of errors
	 *
	 * @var string
	 * @api
	 */
	protected $errorMethodName = 'errorAction';

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var \TYPO3\Flow\Log\SystemLoggerInterface
	 * @Flow\Inject
	 */
	protected $systemLogger;

	/**
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 * Handles a request. The result output is returned by altering the given response.
	 *
	 * @param \TYPO3\Flow\Mvc\RequestInterface $request The request object
	 * @param \TYPO3\Flow\Mvc\ResponseInterface $response The response, modified by this handler
	 * @return void
	 * @throws \TYPO3\Flow\Mvc\Exception\UnsupportedRequestTypeException
	 * @api
	 */
	public function processRequest(\TYPO3\Flow\Mvc\RequestInterface $request, \TYPO3\Flow\Mvc\ResponseInterface $response) {
		$this->initializeController($request, $response);

		$this->actionMethodName = $this->resolveActionMethodName();

		$this->initializeActionMethodArguments();
		$this->initializeActionMethodValidators();
		$this->mvcPropertyMappingConfigurationService->initializePropertyMappingConfigurationFromRequest($this->request, $this->arguments);

		$this->initializeAction();
		$actionInitializationMethodName = 'initialize' . ucfirst($this->actionMethodName);
		if (method_exists($this, $actionInitializationMethodName)) {
			call_user_func(array($this, $actionInitializationMethodName));
		}

		$this->mapRequestArgumentsToControllerArguments();

		if ($this->view === NULL) {
			$this->view = $this->resolveView();
		}
		if ($this->view !== NULL) {
			$this->view->assign('settings', $this->settings);
			$this->view->setControllerContext($this->controllerContext);
			$this->initializeView($this->view);
		}

		$this->callActionMethod();
	}

	/**
	 * Resolves and checks the current action method name
	 *
	 * @return string Method name of the current action
	 * @throws NoSuchActionException
	 * @throws InvalidActionVisibilityException
	 */
	protected function resolveActionMethodName() {
		$actionMethodName = $this->request->getControllerActionName() . 'Action';
		if (!is_callable(array($this, $actionMethodName))) {
			throw new NoSuchActionException(sprintf('An action "%s" does not exist in controller "%s".', $actionMethodName, get_class($this)), 1186669086);
		}
		if (!$this->reflectionService->isMethodPublic(get_class($this), $actionMethodName)) {
			throw new InvalidActionVisibilityException(sprintf('The action "%s" in controller "%s" is not public!', $actionMethodName, get_class($this)), 1186669086);
		}
		return $actionMethodName;
	}

	/**
	 * Implementation of the arguments initialization in the action controller:
	 * Automatically registers arguments of the current action
	 *
	 * Don't override this method - use initializeAction() instead.
	 *
	 * @return void
	 * @throws \TYPO3\Flow\Mvc\Exception\InvalidArgumentTypeException
	 * @see initializeArguments()
	 */
	protected function initializeActionMethodArguments() {
		$actionMethodParameters = static::getActionMethodParameters($this->objectManager);
		if (isset($actionMethodParameters[$this->actionMethodName])) {
			$methodParameters = $actionMethodParameters[$this->actionMethodName];
		} else {
			$methodParameters = array();
		}

		$this->arguments->removeAll();
		foreach ($methodParameters as $parameterName => $parameterInfo) {
			$dataType = NULL;
			if (isset($parameterInfo['type'])) {
				$dataType = $parameterInfo['type'];
			} elseif ($parameterInfo['array']) {
				$dataType = 'array';
			}
			if ($dataType === NULL) {
				throw new \TYPO3\Flow\Mvc\Exception\InvalidArgumentTypeException('The argument type for parameter $' . $parameterName . ' of method ' . get_class($this) . '->' . $this->actionMethodName . '() could not be detected.', 1253175643);
			}
			$defaultValue = (isset($parameterInfo['defaultValue']) ? $parameterInfo['defaultValue'] : NULL);
			$this->arguments->addNewArgument($parameterName, $dataType, ($parameterInfo['optional'] === FALSE), $defaultValue);
		}
	}

	/**
	 * Returns a map of action method names and their parameters.
	 *
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of method parameters by action name
	 * @Flow\CompileStatic
	 */
	static public function getActionMethodParameters($objectManager) {
		$reflectionService = $objectManager->get('TYPO3\Flow\Reflection\ReflectionService');

		$result = array();

		$className = get_called_class();
		$methodNames = get_class_methods($className);
		foreach ($methodNames as $methodName) {
			if (strlen($methodName) > 6 && strpos($methodName, 'Action', strlen($methodName) - 6) !== FALSE) {
				$result[$methodName] = $reflectionService->getMethodParameters($className, $methodName);
			}
		}

		return $result;
	}

	/**
	 * This is a helper method purely used to make initializeActionMethodValidators()
	 * testable without mocking static methods.
	 *
	 * @return array
	 */
	protected function getInformationNeededForInitializeActionMethodValidators() {
		return array(
			static::getActionValidationGroups($this->objectManager),
			static::getActionMethodParameters($this->objectManager),
			static::getActionValidateAnnotationData($this->objectManager),
			static::getActionIgnoredValidationArguments($this->objectManager)
		);
	}

	/**
	 * Adds the needed validators to the Arguments:
	 *
	 * - Validators checking the data type from the @param annotation
	 * - Custom validators specified with validate annotations.
	 * - Model-based validators (validate annotations in the model)
	 * - Custom model validator classes
	 *
	 * @return void
	 */
	protected function initializeActionMethodValidators() {
		list($validateGroupAnnotations, $actionMethodParameters, $actionValidateAnnotations, $actionIgnoredArguments) = $this->getInformationNeededForInitializeActionMethodValidators();

		if (isset($validateGroupAnnotations[$this->actionMethodName])) {
			$validationGroups = $validateGroupAnnotations[$this->actionMethodName];
		} else {
			$validationGroups = array('Default', 'Controller');
		}

		if (isset($actionMethodParameters[$this->actionMethodName])) {
			$methodParameters = $actionMethodParameters[$this->actionMethodName];
		} else {
			$methodParameters = array();
		}

		if (isset($actionValidateAnnotations[$this->actionMethodName])) {
			$validateAnnotations = $actionValidateAnnotations[$this->actionMethodName];
		} else {
			$validateAnnotations = array();
		}
		$parameterValidators = $this->validatorResolver->buildMethodArgumentsValidatorConjunctions(get_class($this), $this->actionMethodName, $methodParameters, $validateAnnotations);

		if (isset($actionIgnoredArguments[$this->actionMethodName])) {
			$ignoredArguments = $actionIgnoredArguments[$this->actionMethodName];
		} else {
			$ignoredArguments = array();
		}

		foreach ($this->arguments as $argument) {
			$argumentName = $argument->getName();
			if (isset($ignoredArguments[$argumentName]) && !$ignoredArguments[$argumentName]['evaluate']) {
				continue;
			}

			$validator = $parameterValidators[$argumentName];

			$baseValidatorConjunction = $this->validatorResolver->getBaseValidatorConjunction($argument->getDataType(), $validationGroups);
			if (count($baseValidatorConjunction) > 0) {
				$validator->addValidator($baseValidatorConjunction);
			}
			$argument->setValidator($validator);
		}
	}

	/**
	 * Returns a map of action method names and their validation groups.
	 *
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of validation groups by action method name
	 * @Flow\CompileStatic
	 */
	static public function getActionValidationGroups($objectManager) {
		$reflectionService = $objectManager->get('TYPO3\Flow\Reflection\ReflectionService');

		$result = array();

		$className = get_called_class();
		$methodNames = get_class_methods($className);
		foreach ($methodNames as $methodName) {
			if (strlen($methodName) > 6 && strpos($methodName, 'Action', strlen($methodName) - 6) !== FALSE) {
				$validationGroupsAnnotation = $reflectionService->getMethodAnnotation($className, $methodName, 'TYPO3\Flow\Annotations\ValidationGroups');
				if ($validationGroupsAnnotation !== NULL) {
					$result[$methodName] = $validationGroupsAnnotation->validationGroups;
				}
			}
		}

		return $result;
	}

	/**
	 * Returns a map of action method names and their validation parameters.
	 *
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of validate annotation parameters by action method name
	 * @Flow\CompileStatic
	 */
	static public function getActionValidateAnnotationData($objectManager) {
		$reflectionService = $objectManager->get('TYPO3\Flow\Reflection\ReflectionService');

		$result = array();

		$className = get_called_class();
		$methodNames = get_class_methods($className);
		foreach ($methodNames as $methodName) {
			if (strlen($methodName) > 6 && strpos($methodName, 'Action', strlen($methodName) - 6) !== FALSE) {
				$validateAnnotations = $reflectionService->getMethodAnnotations($className, $methodName, 'TYPO3\Flow\Annotations\Validate');
				$result[$methodName] = array_map(function($validateAnnotation) {
					return array(
						'type' => $validateAnnotation->type,
						'options' => $validateAnnotation->options,
						'argumentName' => $validateAnnotation->argumentName,
					);
				}, $validateAnnotations);
			}
		}

		return $result;
	}

	/**
	 * Initializes the controller before invoking an action method.
	 *
	 * Override this method to solve tasks which all actions have in
	 * common.
	 *
	 * @return void
	 * @api
	 */
	protected function initializeAction() {
	}

	/**
	 * Calls the specified action method and passes the arguments.
	 *
	 * If the action returns a string, it is appended to the content in the
	 * response object. If the action doesn't return anything and a valid
	 * view exists, the view is rendered automatically.
	 *
	 * @return void
	 */
	protected function callActionMethod() {
		$preparedArguments = array();
		foreach ($this->arguments as $argument) {
			$preparedArguments[] = $argument->getValue();
		}

		$validationResult = $this->arguments->getValidationResults();

		if (!$validationResult->hasErrors()) {
			$actionResult = call_user_func_array(array($this, $this->actionMethodName), $preparedArguments);
		} else {
			$actionIgnoredArguments = static::getActionIgnoredValidationArguments($this->objectManager);
			if (isset($actionIgnoredArguments[$this->actionMethodName])) {
				$ignoredArguments = $actionIgnoredArguments[$this->actionMethodName];
			} else {
				$ignoredArguments = array();
			}

			// if there exists more errors than in ignoreValidationAnnotations => call error method
			// else => call action method
			$shouldCallActionMethod = TRUE;
			/** @var Result $subValidationResult */
			foreach ($validationResult->getSubResults() as $argumentName => $subValidationResult) {
				if (!$subValidationResult->hasErrors()) {
					continue;
				}
				if (isset($ignoredArguments[$argumentName]) && $subValidationResult->getErrors('TYPO3\Flow\Property\TypeConverter\Error\TargetNotFoundError') === array()) {
					continue;
				}
				$shouldCallActionMethod = FALSE;
				break;
			}

			if ($shouldCallActionMethod) {
				$actionResult = call_user_func_array(array($this, $this->actionMethodName), $preparedArguments);
			} else {
				$actionResult = call_user_func(array($this, $this->errorMethodName));
			}
		}

		if ($actionResult === NULL && $this->view instanceof \TYPO3\Flow\Mvc\View\ViewInterface) {
			$this->response->appendContent($this->view->render());
		} elseif (is_string($actionResult) && strlen($actionResult) > 0) {
			$this->response->appendContent($actionResult);
		} elseif (is_object($actionResult) && method_exists($actionResult, '__toString')) {
			$this->response->appendContent((string)$actionResult);
		}
	}

	/**
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 * @return array Array of argument names as key by action method name
	 * @Flow\CompileStatic
	 */
	static public function getActionIgnoredValidationArguments($objectManager) {
		$reflectionService = $objectManager->get('TYPO3\Flow\Reflection\ReflectionService');

		$result = array();

		$className = get_called_class();
		$methodNames = get_class_methods($className);
		foreach ($methodNames as $methodName) {
			if (strlen($methodName) > 6 && strpos($methodName, 'Action', strlen($methodName) - 6) !== FALSE) {
				$ignoreValidationAnnotations = $reflectionService->getMethodAnnotations($className, $methodName, 'TYPO3\Flow\Annotations\IgnoreValidation');
				/** @var Flow\IgnoreValidation $ignoreValidationAnnotation */
				foreach ($ignoreValidationAnnotations as $ignoreValidationAnnotation) {
					if (!isset($ignoreValidationAnnotation->argumentName)) {
						throw new \InvalidArgumentException('An IgnoreValidation annotation on a method must be given an argument name.', 1318456607);
					}
					$result[$methodName][$ignoreValidationAnnotation->argumentName] = array(
						'evaluate' => $ignoreValidationAnnotation->evaluate
					);
				}
			}
		}

		return $result;
	}

	/**
	 * Prepares a view for the current action and stores it in $this->view.
	 * By default, this method tries to locate a view with a name matching
	 * the current action.
	 *
	 * @return \TYPO3\Flow\Mvc\View\ViewInterface the resolved view
	 * @throws \TYPO3\Flow\Mvc\Exception\ViewNotFoundException if no view can be resolved
	 */
	protected function resolveView() {
		$viewsConfiguration = $this->viewConfigurationManager->getViewConfiguration($this->request);

		if (isset($viewsConfiguration['viewObjectName'])) {
			$viewObjectName = $viewsConfiguration['viewObjectName'];
		} elseif (($resolvedViewObjectName = $this->resolveViewObjectName()) !== FALSE) {
			$viewObjectName = $resolvedViewObjectName;
		} elseif ($this->defaultViewObjectName !== '') {
			$viewObjectName = $this->defaultViewObjectName;
		}

		if (isset($viewsConfiguration['options'])) {
			$view = $this->objectManager->get($viewObjectName, $viewsConfiguration['options']);
		} else {
			$view = $this->objectManager->get($viewObjectName);
		}

		if (!isset($view)) {
			throw new \TYPO3\Flow\Mvc\Exception\ViewNotFoundException(sprintf('Could not resolve view for action "%s" in controller "%s"', $this->request->getControllerActionName(), get_class($this)), 1355153185);
		}
		if (!$view instanceof \TYPO3\Flow\Mvc\View\ViewInterface) {
			throw new \TYPO3\Flow\Mvc\Exception\ViewNotFoundException(sprintf('View has to be of type ViewInterface, got "%s" in action "%s" of controller "%s"', get_class($view), $this->request->getControllerActionName(), get_class($this)), 1355153188);
		}

		return $view;
	}

	/**
	 * Determines the fully qualified view object name.
	 *
	 * @return mixed The fully qualified view object name or FALSE if no matching view could be found.
	 * @api
	 */
	protected function resolveViewObjectName() {
		$possibleViewObjectName = $this->viewObjectNamePattern;
		$packageKey = $this->request->getControllerPackageKey();
		$subpackageKey = $this->request->getControllerSubpackageKey();
		$format = $this->request->getFormat();

		if ($subpackageKey !== NULL && $subpackageKey !== '') {
			$packageKey .= '\\' . $subpackageKey;
		}
		$possibleViewObjectName = str_replace('@package', str_replace('.', '\\', $packageKey), $possibleViewObjectName);
		$possibleViewObjectName = str_replace('@controller', $this->request->getControllerName(), $possibleViewObjectName);
		$possibleViewObjectName = str_replace('@action', $this->request->getControllerActionName(), $possibleViewObjectName);

		$viewObjectName = $this->objectManager->getCaseSensitiveObjectName(strtolower(str_replace('@format', $format, $possibleViewObjectName)));
		if ($viewObjectName === FALSE) {
			$viewObjectName = $this->objectManager->getCaseSensitiveObjectName(strtolower(str_replace('@format', '', $possibleViewObjectName)));
		}
		if ($viewObjectName === FALSE && isset($this->viewFormatToObjectNameMap[$format])) {
			$viewObjectName = $this->viewFormatToObjectNameMap[$format];
		}
		return $viewObjectName;
	}

	/**
	 * Initializes the view before invoking an action method.
	 *
	 * Override this method to solve assign variables common for all actions
	 * or prepare the view in another way before the action is called.
	 *
	 * @param \TYPO3\Flow\Mvc\View\ViewInterface $view The view to be initialized
	 * @return void
	 * @api
	 */
	protected function initializeView(\TYPO3\Flow\Mvc\View\ViewInterface $view) {
	}

	/**
	 * A special action which is called if the originally intended action could
	 * not be called, for example if the arguments were not valid.
	 *
	 * The default implementation checks for TargetNotFoundErrors, sets a flash message, request errors and forwards back
	 * to the originating action. This is suitable for most actions dealing with form input.
	 *
	 * @return string
	 * @api
	 */
	protected function errorAction() {
		$this->handleTargetNotFoundError();
		$this->addErrorFlashMessage();
		$this->forwardToReferringRequest();

		return $this->getFlattenedValidationErrorMessage();
	}

	/**
	 * Checks if the arguments validation result contain errors of type TargetNotFoundError and throws a TargetNotFoundException if that's the case for a top-level object.
	 * You can override this method (or the errorAction()) if you need a different behavior
	 *
	 * @return void
	 * @throws TargetNotFoundException
	 * @api
	 */
	protected function handleTargetNotFoundError() {
		foreach (array_keys($this->request->getArguments()) as $argumentName) {
			/** @var TargetNotFoundError $targetNotFoundError */
			$targetNotFoundError = $this->arguments->getValidationResults()->forProperty($argumentName)->getFirstError('TYPO3\Flow\Property\TypeConverter\Error\TargetNotFoundError');
			if ($targetNotFoundError !== FALSE) {
				throw new TargetNotFoundException($targetNotFoundError->getMessage(), $targetNotFoundError->getCode());
			}
		}
	}

	/**
	 * If an error occurred during this request, this adds a flash message describing the error to the flash
	 * message container.
	 *
	 * @return void
	 */
	protected function addErrorFlashMessage() {
		$errorFlashMessage = $this->getErrorFlashMessage();
		if ($errorFlashMessage !== FALSE) {
			$this->flashMessageContainer->addMessage($errorFlashMessage);
		}
	}

	/**
	 * If information on the request before the current request was sent, this method forwards back
	 * to the originating request. This effectively ends processing of the current request, so do not
	 * call this method before you have finished the necessary business logic!
	 *
	 * @return void
	 * @throws ForwardException
	 */
	protected function forwardToReferringRequest() {
		$referringRequest = $this->request->getReferringRequest();
		if ($referringRequest === NULL) {
			return;
		}
		$packageKey = $referringRequest->getControllerPackageKey();
		$subpackageKey = $referringRequest->getControllerSubpackageKey();
		if ($subpackageKey !== NULL) {
			$packageKey .= '\\' . $subpackageKey;
		}
		$argumentsForNextController = $referringRequest->getArguments();
		$argumentsForNextController['__submittedArguments'] = $this->request->getArguments();
		$argumentsForNextController['__submittedArgumentValidationResults'] = $this->arguments->getValidationResults();

		$this->forward($referringRequest->getControllerActionName(), $referringRequest->getControllerName(), $packageKey, $argumentsForNextController);
	}

	/**
	 * @deprecated since 3.0 - Use forwardToReferringRequest() instead. This method might be reworked to issue a "real" redirect at some point!
	 * @return void
	 */
	protected function redirectToReferringRequest() {
		$this->forwardToReferringRequest();
	}

	/**
	 * Returns a string containing all validation errors separated by PHP_EOL.
	 *
	 * @return string
	 */
	protected function getFlattenedValidationErrorMessage() {
		$outputMessage = 'Validation failed while trying to call ' . get_class($this) . '->' . $this->actionMethodName . '().' . PHP_EOL;
		$logMessage = $outputMessage;

		foreach ($this->arguments->getValidationResults()->getFlattenedErrors() as $propertyPath => $errors) {
			foreach ($errors as $error) {
				$logMessage .= 'Error for ' . $propertyPath . ':  ' . $error->render() . PHP_EOL;
			}
		}
		$this->systemLogger->log($logMessage, LOG_ERR);

		return $outputMessage;
	}

	/**
	 * A template method for displaying custom error flash messages, or to
	 * display no flash message at all on errors. Override this to customize
	 * the flash message in your action controller.
	 *
	 * @return \TYPO3\Flow\Error\Message The flash message or FALSE if no flash message should be set
	 * @api
	 */
	protected function getErrorFlashMessage() {
		return new \TYPO3\Flow\Error\Error('An error occurred while trying to call %1$s->%2$s()', NULL, array(get_class($this), $this->actionMethodName));
	}
}
namespace TYPO3\Flow\Mvc\Controller;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * An HTTP based multi-action controller.
 * 
 * The action specified in the given ActionRequest is dispatched to a method in
 * the concrete controller whose name ends with "*Action". If no matching action
 * method is found, the action specified in $errorMethodName is invoked.
 * 
 * This controller also takes care of mapping arguments found in the ActionRequest
 * to the corresponding method arguments of the action method. It also invokes
 * validation for these arguments by invoking the Property Mapper.
 * 
 * By defining media types in $supportedMediaTypes, content negotiation based on
 * the browser's Accept header and additional routing configuration is used to
 * determine the output format the controller should return.
 * 
 * Depending on the action being called, a fitting view - by default a Fluid template
 * view - will be selected. By specifying patterns, custom view classes or an alternative
 * controller / action to template path mapping can be defined.
 */
class ActionController extends ActionController_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if ('TYPO3\Flow\Mvc\Controller\ActionController' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

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
				$this->Flow_Proxy_injectProperties();
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __sleep() {
		$result = NULL;
		$this->Flow_Object_PropertiesToSerialize = array();
	$reflectionService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Reflection\ReflectionService');
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Mvc\Controller\ActionController');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Mvc\Controller\ActionController', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Mvc\Controller\ActionController', $propertyName, 'var');
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
		$mvcPropertyMappingConfigurationService_reference = &$this->mvcPropertyMappingConfigurationService;
		$this->mvcPropertyMappingConfigurationService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Mvc\Controller\MvcPropertyMappingConfigurationService');
		if ($this->mvcPropertyMappingConfigurationService === NULL) {
			$this->mvcPropertyMappingConfigurationService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('35acb49fbe78f28099d45aa647797c83', $mvcPropertyMappingConfigurationService_reference);
			if ($this->mvcPropertyMappingConfigurationService === NULL) {
				$this->mvcPropertyMappingConfigurationService = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('35acb49fbe78f28099d45aa647797c83',  $mvcPropertyMappingConfigurationService_reference, 'TYPO3\Flow\Mvc\Controller\MvcPropertyMappingConfigurationService', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Mvc\Controller\MvcPropertyMappingConfigurationService'); });
			}
		}
		$viewConfigurationManager_reference = &$this->viewConfigurationManager;
		$this->viewConfigurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Mvc\ViewConfigurationManager');
		if ($this->viewConfigurationManager === NULL) {
			$this->viewConfigurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('5a345bfd515fdb9f0c97080ff13c7079', $viewConfigurationManager_reference);
			if ($this->viewConfigurationManager === NULL) {
				$this->viewConfigurationManager = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('5a345bfd515fdb9f0c97080ff13c7079',  $viewConfigurationManager_reference, 'TYPO3\Flow\Mvc\ViewConfigurationManager', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Mvc\ViewConfigurationManager'); });
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
		$validatorResolver_reference = &$this->validatorResolver;
		$this->validatorResolver = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Validation\ValidatorResolver');
		if ($this->validatorResolver === NULL) {
			$this->validatorResolver = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('b457db29305ddeae13b61d92da000ca0', $validatorResolver_reference);
			if ($this->validatorResolver === NULL) {
				$this->validatorResolver = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('b457db29305ddeae13b61d92da000ca0',  $validatorResolver_reference, 'TYPO3\Flow\Validation\ValidatorResolver', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Validation\ValidatorResolver'); });
			}
		}
		$flashMessageContainer_reference = &$this->flashMessageContainer;
		$this->flashMessageContainer = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getInstance('TYPO3\Flow\Mvc\FlashMessageContainer');
		if ($this->flashMessageContainer === NULL) {
			$this->flashMessageContainer = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->getLazyDependencyByHash('e4fd26f8afd3994317304b563b2a9561', $flashMessageContainer_reference);
			if ($this->flashMessageContainer === NULL) {
				$this->flashMessageContainer = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->createLazyDependency('e4fd26f8afd3994317304b563b2a9561',  $flashMessageContainer_reference, 'TYPO3\Flow\Mvc\FlashMessageContainer', function() { return \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Mvc\FlashMessageContainer'); });
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
$this->Flow_Injected_Properties = array (
  0 => 'settings',
  1 => 'objectManager',
  2 => 'reflectionService',
  3 => 'mvcPropertyMappingConfigurationService',
  4 => 'viewConfigurationManager',
  5 => 'systemLogger',
  6 => 'validatorResolver',
  7 => 'flashMessageContainer',
  8 => 'persistenceManager',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Mvc/Controller/ActionController.php
#