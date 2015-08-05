<?php
namespace SKL\Post\Controller;

use TYPO3\Flow\Annotations as Flow;

/**
 * LoginController
 *
 * Handles all stuff that has to do with the login
 */
class UserController extends \TYPO3\Flow\Mvc\Controller\ActionController {

    /**
     * @var \TYPO3\Flow\Security\Authentication\AuthenticationManagerInterface
     * @Flow\Inject
     */
    protected $authenticationManager;

    /**
     * @var \TYPO3\Flow\Security\AccountRepository
     * @Flow\Inject
     */
    protected $accountRepository;

    /**
     * @var \SKL\Post\Domain\Repository\UserRepository
     * @Flow\Inject
     */
    protected $userRepository;

    /**
     * @var \TYPO3\Flow\Security\AccountFactory
     * @Flow\Inject
     */
    protected $accountFactory;

    /**
     * index action, does only display the form
     */
    public function indexAction() {

    }

    /**
     * @throws \TYPO3\Flow\Security\Exception\AuthenticationRequiredException
     * @return void
     */
    public function authenticateAction() {
        try {
            $this->authenticationManager->authenticate();
            $this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Successfully logged in.'));
            $this->redirect('index', 'Setup');
        } catch (\TYPO3\Flow\Security\Exception\AuthenticationRequiredException $exception) {
            $this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Wrong username or password.'));
            $this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error($exception->getMessage()));
            throw $exception;
        }
    }

    /**
     * @return void
     */
    public function registerAction() {
        // do nothing more than display the register form
    }

    /**
     * save the registration
     * @param string $name
     * @param string $pass
     * @param string $pass2
     * @param string $role
     */
    public function createAction($name, $pass, $pass2, $role) {

        if($name == '' || strlen($name) < 3) {
            $this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Username too short or empty'));
            $this->redirect('register', 'Login');
        } else if($pass == '' || $pass != $pass2) {
            $this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Password too short or does not match'));
            $this->redirect('register', 'Login');
        } else {

            // create a account with password an add it to the accountRepository
            $account = $this->accountFactory->createAccountWithPassword($name, $pass, array($role));
            $this->userRepository->add($account);
            $this->accountRepository->add($account);

            \TYPO3\Flow\var_dump($this->userRepository->findAll());
            die();

            // add a message and redirect to the login form
            $this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Account created. Please login.'));
            $this->redirect('index');
        }

        // redirect to the login form
        $this->redirect('index', 'Login');
    }

    public function logoutAction() {
        $this->authenticationManager->logout();
        $this->flashMessageContainer->addMessage(new \TYPO3\Flow\Error\Error('Successfully logged out.'));
        $this->redirect('index', 'Login');
    }

}