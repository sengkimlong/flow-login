<?php 
namespace TYPO3\Flow\Security\Authorization\Interceptor;

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Doctrine\ORM\EntityNotFoundException;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Aop\JoinPointInterface;
use TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface;
use TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegeSubject;
use TYPO3\Flow\Security\Authorization\PrivilegeManagerInterface;
use TYPO3\Flow\Security\Authorization\InterceptorInterface;
use TYPO3\Flow\Security\Context;
use TYPO3\Flow\Security\Exception\AccessDeniedException;
use TYPO3\Flow\Security\Exception\AuthenticationRequiredException;
use TYPO3\Flow\Security\Exception\NoTokensAuthenticatedException;

/**
 * This is the main security interceptor, which enforces the current security policy and is usually called by the central security aspect:
 *
 * 1. If authentication has not been performed (flag is set in the security context) the configured authentication manager is called to authenticate its tokens
 * 2. If a AuthenticationRequired exception has been thrown we look for an authentication entry point in the active tokens to redirect to authentication
 * 3. Then the configured AccessDecisionManager is called to authorize the request/action
 *
 * @Flow\Scope("singleton")
 */
class PolicyEnforcement_Original implements InterceptorInterface {

	/**
	 * @var Context
	 */
	protected $securityContext;

	/**
	 * @var AuthenticationManagerInterface
	 */
	protected $authenticationManager;

	/**
	 * @var PrivilegeManagerInterface
	 */
	protected $privilegeManager;

	/**
	 * The current joinpoint
	 *
	 * @var JoinPointInterface
	 */
	protected $joinPoint;

	/**
	 * @param Context $securityContext The current security context
	 * @param AuthenticationManagerInterface $authenticationManager The authentication manager
	 * @param PrivilegeManagerInterface $privilegeManager The access decision manager
	 */
	public function __construct(Context $securityContext, AuthenticationManagerInterface $authenticationManager, PrivilegeManagerInterface $privilegeManager) {
		$this->securityContext = $securityContext;
		$this->authenticationManager = $authenticationManager;
		$this->privilegeManager = $privilegeManager;
	}

	/**
	 * Sets the current joinpoint for this interception
	 *
	 * @param JoinPointInterface $joinPoint The current joinpoint
	 * @return void
	 */
	public function setJoinPoint(JoinPointInterface $joinPoint) {
		$this->joinPoint = $joinPoint;
	}

	/**
	 * Invokes the security interception
	 *
	 * @return boolean TRUE if the security checks was passed
	 * @throws AccessDeniedException
	 * @throws AuthenticationRequiredException if an entity could not be found (assuming it is bound to the current session), causing a redirect to the authentication entrypoint
	 * @throws NoTokensAuthenticatedException if no tokens could be found and the accessDecisionManager denied access to the privilege target, causing a redirect to the authentication entrypoint
	 */
	public function invoke() {
		$reason = '';

		$privilegeSubject = new MethodPrivilegeSubject($this->joinPoint);

		try {
			$this->authenticationManager->authenticate();
		} catch (EntityNotFoundException $exception) {
			throw new AuthenticationRequiredException('Could not authenticate. Looks like a broken session.', 1358971444, $exception);
		} catch (NoTokensAuthenticatedException $noTokensAuthenticatedException) {
			// We still need to check if the privilege is available to "TYPO3.Flow:Everybody".
			if ($this->privilegeManager->isGranted('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegeInterface', $privilegeSubject, $reason) === FALSE) {
				throw new NoTokensAuthenticatedException($noTokensAuthenticatedException->getMessage() . chr(10) . $reason, $noTokensAuthenticatedException->getCode());
			}
		}

		if ($this->privilegeManager->isGranted('TYPO3\Flow\Security\Authorization\Privilege\Method\MethodPrivilegeInterface', $privilegeSubject, $reason) === FALSE) {
			throw new AccessDeniedException($this->renderDecisionReasonMessage($reason), 1222268609);
		}
	}

	/**
	 * Returns a string message, giving insights what happened during privilege evaluation.
	 *
	 * @param string $privilegeReasonMessage
	 * @return string
	 */
	protected function renderDecisionReasonMessage($privilegeReasonMessage) {
		if (count($this->securityContext->getRoles()) === 0) {
			$rolesMessage = 'No authenticated roles';
		} else {
			$rolesMessage = 'Authenticated roles: ' . implode(', ', array_keys($this->securityContext->getRoles()));
		}

		return sprintf('Access denied for method' . chr(10) . 'Method: %s::%s()' . chr(10) . chr(10) . '%s' . chr(10) . chr(10) . '%s', $this->joinPoint->getClassName(), $this->joinPoint->getMethodName(), $privilegeReasonMessage, $rolesMessage);
	}
}
namespace TYPO3\Flow\Security\Authorization\Interceptor;

use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Annotations as Flow;

/**
 * This is the main security interceptor, which enforces the current security policy and is usually called by the central security aspect:
 * 
 * 1. If authentication has not been performed (flag is set in the security context) the configured authentication manager is called to authenticate its tokens
 * 2. If a AuthenticationRequired exception has been thrown we look for an authentication entry point in the active tokens to redirect to authentication
 * 3. Then the configured AccessDecisionManager is called to authorize the request/action
 * @\TYPO3\Flow\Annotations\Scope("singleton")
 */
class PolicyEnforcement extends PolicyEnforcement_Original implements \TYPO3\Flow\Object\Proxy\ProxyInterface {


	/**
	 * Autogenerated Proxy Method
	 * @param Context $securityContext The current security context
	 * @param AuthenticationManagerInterface $authenticationManager The authentication manager
	 * @param PrivilegeManagerInterface $privilegeManager The access decision manager
	 */
	public function __construct() {
		$arguments = func_get_args();
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\Interceptor\PolicyEnforcement') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\Interceptor\PolicyEnforcement', $this);

		if (!array_key_exists(0, $arguments)) $arguments[0] = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Context');
		if (!array_key_exists(1, $arguments)) $arguments[1] = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface');
		if (!array_key_exists(2, $arguments)) $arguments[2] = \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->get('TYPO3\Flow\Security\Authorization\PrivilegeManagerInterface');
		if (!array_key_exists(0, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $securityContext in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
		if (!array_key_exists(1, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $authenticationManager in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
		if (!array_key_exists(2, $arguments)) throw new \TYPO3\Flow\Object\Exception\UnresolvedDependenciesException('Missing required constructor argument $privilegeManager in class ' . __CLASS__ . '. Please check your calling code and Dependency Injection configuration.', 1296143787);
		call_user_func_array('parent::__construct', $arguments);
	}

	/**
	 * Autogenerated Proxy Method
	 */
	 public function __wakeup() {
		if (get_class($this) === 'TYPO3\Flow\Security\Authorization\Interceptor\PolicyEnforcement') \TYPO3\Flow\Core\Bootstrap::$staticObjectManager->setInstance('TYPO3\Flow\Security\Authorization\Interceptor\PolicyEnforcement', $this);

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
	$reflectedClass = new \ReflectionClass('TYPO3\Flow\Security\Authorization\Interceptor\PolicyEnforcement');
	$allReflectedProperties = $reflectedClass->getProperties();
	foreach ($allReflectedProperties as $reflectionProperty) {
		$propertyName = $reflectionProperty->name;
		if (in_array($propertyName, array('Flow_Aop_Proxy_targetMethodsAndGroupedAdvices', 'Flow_Aop_Proxy_groupedAdviceChains', 'Flow_Aop_Proxy_methodIsInAdviceMode'))) continue;
		if (isset($this->Flow_Injected_Properties) && is_array($this->Flow_Injected_Properties) && in_array($propertyName, $this->Flow_Injected_Properties)) continue;
		if ($reflectionProperty->isStatic() || $reflectionService->isPropertyAnnotatedWith('TYPO3\Flow\Security\Authorization\Interceptor\PolicyEnforcement', $propertyName, 'TYPO3\Flow\Annotations\Transient')) continue;
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
				$varTagValues = $reflectionService->getPropertyTagValues('TYPO3\Flow\Security\Authorization\Interceptor\PolicyEnforcement', $propertyName, 'var');
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
# PathAndFilename: /var/www/html/internship-project-3-team-2/flow_login/Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Security/Authorization/Interceptor/PolicyEnforcement.php
#