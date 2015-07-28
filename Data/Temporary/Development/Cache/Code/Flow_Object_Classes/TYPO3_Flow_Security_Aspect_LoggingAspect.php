<?php 
namespace TYPO3\Flow\Security\Aspect;

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
use TYPO3\Flow\Aop\JoinPointInterface;
use TYPO3\Flow\Security\Account;
use TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface;
use TYPO3\Flow\Security\Authentication\TokenInterface;
use TYPO3\Flow\Security\Exception\NoTokensAuthenticatedException;

/**
 * An aspect which centralizes the logging of security relevant actions.
 *
 * @Flow\Scope("singleton")
 * @Flow\Aspect
 */
class LoggingAspect_Original {

	/**
	 * @var \TYPO3\Flow\Log\SecurityLoggerInterface
	 * @Flow\Inject
	 */
	protected $securityLogger;

	/**
	 * @var boolean
	 */
	protected $alreadyLoggedAuthenticateCall = FALSE;

	/**
	 * Logs calls and results of the authenticate() method of the Authentication Manager
	 *
	 * @Flow\After("within(TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface) && method(.*->authenticate())")
	 * @param JoinPointInterface $joinPoint The current joinpoint
	 * @return mixed The result of the target method if it has not been intercepted
	 * @throws \Exception
	 */
	public function logManagerAuthenticate(JoinPointInterface $joinPoint) {
		if ($joinPoint->hasException()) {
			$exception = $joinPoint->getException();
			if (!$exception instanceof NoTokensAuthenticatedException) {
				$this->securityLogger->log(sprintf('Authentication failed: "%s" #%d', $exception->getMessage(), $exception->getCode()), LOG_NOTICE);
			}
			throw $exception;
		} elseif ($this->alreadyLoggedAuthenticateCall === FALSE) {
			/** @var AuthenticationManagerInterface $authenticationManager */
			$authenticationManager = $joinPoint->getProxy();
			if ($authenticationManager->getSecurityContext()->getAccount() !== NULL) {
				$this->securityLogger->log(sprintf('Successfully re-authenticated tokens for account "%s"', $authenticationManager->getSecurityContext()->getAccount()->getAccountIdentifier()), LOG_INFO);
			} else {
				$this->securityLogger->log('No account authenticated', LOG_INFO);
			}
			$this->alreadyLoggedAuthenticateCall = TRUE;
		}
	}

	/**
	 * Logs calls and results of the logout() method of the Authentication Manager
	 *
	 * @Flow\AfterReturning("within(TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface) && method(.*->logout())")
	 * @param JoinPointInterface $joinPoint The current joinpoint
	 * @return mixed The result of the target method if it has not been intercepted
	 */
	public function logManagerLogout(JoinPointInterface $joinPoint) {
		/** @var AuthenticationManagerInterface $authenticationManager */
		$authenticationManager = $joinPoint->getProxy();
		$securityContext = $authenticationManager->getSecurityContext();
		if (!$securityContext->isInitialized()) {
			return;
		}
		$accountIdentifiers = array();
		foreach ($securityContext->getAuthenticationTokens() as $token) {
			/** @var $account Account */
			$account = $token->getAccount();
			if ($account !== NULL) {
				$accountIdentifiers[] = $account->getAccountIdentifier();
			}
		}
		$this->securityLogger->log(sprintf('Logged out %d account(s). (%s)', count($accountIdentifiers), implode(', ', $accountIdentifiers)), LOG_INFO);
	}

	/**
	 * Logs calls and results of the authenticate() method of an authentication provider
	 *
	 * @Flow\AfterReturning("within(TYPO3\Flow\Security\Authentication\AuthenticationProviderInterface) && method(.*->authenticate())")
	 * @param JoinPointInterface $joinPoint The current joinpoint
	 * @return mixed The result of the target method if it has not been intercepted
	 */
	public function logPersistedUsernamePasswordProviderAuthenticate(JoinPointInterface $joinPoint) {
		$token = $joinPoint->getMethodArgument('authenticationToken');

		switch ($token->getAuthenticationStatus()) {
			case TokenInterface::AUTHENTICATION_SUCCESSFUL :
				$this->securityLogger->log(sprintf('Successfully authenticated token: %s', $token), LOG_NOTICE, array(), 'TYPO3.Flow', $joinPoint->getClassName(), $joinPoint->getMethodName());
				$this->alreadyLoggedAuthenticateCall = TRUE;
			break;
			case TokenInterface::WRONG_CREDENTIALS :
				$this->securityLogger->log(sprintf('Wrong credentials given for token: %s', $token) , LOG_WARNING, array(), 'TYPO3.Flow', $joinPoint->getClassName(), $joinPoint->getMethodName());
			break;
			case TokenInterface::NO_CREDENTIALS_GIVEN :
				$this->securityLogger->log(sprintf('No credentials given or no account found for token: %s', $token), LOG_WARNING, array(), 'TYPO3.Flow', $joinPoint->getClassName(), $joinPoint->getMethodName());
			break;
		}
	}

	/**
	 * Logs calls and result of vote() for method privileges
	 *
	 * @Flow\After("method(TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilege->vote())")
	 * @param JoinPointInterface $joinPoint
	 * @return void
	 */
	public function logJoinPointAccessDecisions(JoinPointInterface $joinPoint) {
		$subjectJoinPoint = $joinPoint->getMethodArgument('subject');
		$decision = $joinPoint->getResult() === TRUE ? 'GRANTED' : 'DENIED';
		$message = sprintf('Decided "%s" on method call %s::%s().', $decision, $subjectJoinPoint->getClassName(), $subjectJoinPoint->getMethodName());
		$this->securityLogger->log($message, \LOG_INFO);
	}

	/**
	 * Logs calls and result of isPrivilegeTargetGranted()
	 *
	 * @Flow\After("method(TYPO3\Flow\Security\Authorization\PrivilegeManager->isPrivilegeTargetGranted())")
	 * @param JoinPointInterface $joinPoint
	 * @return void
	 */
	public function logPrivilegeAccessDecisions(JoinPointInterface $joinPoint) {
		$decision = $joinPoint->getResult() === TRUE ? 'GRANTED' : 'DENIED';
		$message = sprintf('Decided "%s" on privilege "%s".', $decision, $joinPoint->getMethodArgument('privilegeTargetIdentifier'));
		$this->securityLogger->log($message, \LOG_INFO);
	}
}
namespace TYPO3\Flow\Security\Aspect;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * An aspect which centralizes the logging of security relevant actions.
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 * @\TYPO3\Flow\Annotations\Aspect
 */
class LoggingAspect extends LoggingAspect_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 */
	public function __construct() {
		if (get_class($this) === 'TYPO3\Flow\Security\Aspect\LoggingAspect') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Aspect\LoggingAspect', $this);
		if ('TYPO3\Flow\Security\Aspect\LoggingAspect' === get_class($this)) {
			$this->Flow_Proxy_injectProperties();
		}
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Security\Aspect\LoggingAspect') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Aspect\LoggingAspect', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Security\Aspect\LoggingAspect');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Security\Aspect\LoggingAspect', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Security\Aspect\LoggingAspect', $propertyName, 'var');
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
		$this->securityLogger = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Log\SecurityLoggerInterface');
$this->Flow_Injected_Properties = array (
  0 => 'securityLogger',
);
	}
}
# PathAndFilename: /var/www/html/flow-login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Security/Aspect/LoggingAspect.php
#