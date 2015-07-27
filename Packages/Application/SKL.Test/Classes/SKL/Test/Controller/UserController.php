<?php
namespace SKL\Test\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Test".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Test\Domain\Model\User;

class UserController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \SKL\Test\Domain\Repository\UserRepository
	 */
	protected $userRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('users', $this->userRepository->findAll());
	}

	/**
	 * @param \SKL\Test\Domain\Model\User $user
	 * @return void
	 */
	public function showAction(User $user) {
		$this->view->assign('user', $user);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \SKL\Test\Domain\Model\User $newUser
	 * @return void
	 */
	public function createAction(User $newUser) {
		$users = $this->userRepository->findActiveUser();
		$test = false;

		foreach($users as $user) {

			if (strcmp($user->getName(),$newUser->getName()) == 0) {
				if (strcmp($user->getEmail(),$newUser->getEmail()) == 0) {
					$this->addFlashMessage("Sorry username you enter is already existed!");
					$this->redirect('index');
					exit;
				}else {
					$this->addFlashMessage("Sorry username you enter is already existed!");
					$this->redirect('index');
					exit;
				}
			}

			if (strcmp($user->getEmail(),$newUser->getEmail()) == 0) {
				if (strcmp($user->getName(),$newUser->getName()) == 0) {
					$this->addFlashMessage("Sorry username you enter is already existed!");
					$this->redirect('index');
					exit;
				}else {
					$this->addFlashMessage("Sorry username you enter is already existed!");
					$this->redirect('index');
					exit;
				}
			}

		}
		$this->userRepository->add($newUser);
		session_start();
		$_SESSION['usrname'] = $newUser->getName();
		$this->view->assign('usrname', $_SESSION['usrname']);

	 	$this->redirect('home');
	//
	}
	//
	// public function sesstionAction(User $user){
	// 	$_SESSION['usrname'] = $newUser->getName();
	// 	$this->view->assign('usrname', $_SESSION['usrname']);
	// }

	/**
	 * @param \SKL\Test\Domain\Model\User $user
	 * @return void
	 */
	public function editAction(User $user) {
		$this->view->assign('user', $user);
	}

	/**
	 * @param \SKL\Test\Domain\Model\User $user
	 * @return void
	 */
	public function updateAction(User $user) {
		$this->userRepository->update($user);
		$this->addFlashMessage('Updated the user.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Test\Domain\Model\User $user
	 * @return void
	 */
	public function deleteAction(User $user) {
		$this->userRepository->remove($user);
		$this->addFlashMessage('Deleted a user.');
		$this->redirect('index');
	}

	/**
	 * @return void
	 */
	public function successAction(User $loginUser) {
		session_start();
		$users = $this->userRepository->findActiveUser();
		$test = false;
		foreach($users as $user) {
			if (strcmp($user->getName(),$loginUser->getName()) == 0) {
				if (strcmp($user->getPassword(),$loginUser->getPassword()) == 0) {
					$test = true;
				}else {
					$this->addFlashMessage("Sorry the password you enter is incorrect!");
					$this->redirect('login');
				}
			}
		}
		if ($test == false) {
			$this->addFlashMessage("Sorry name and password you enter is valid!");
			$this->redirect('login');
		}

		$_SESSION['usrname'] = $loginUser->getName();

		//echo $_SESSION['usrname'];
		$this->redirect('home', 'user');

	}

	/**
	 * @return void
	 */
	public function loginAction() {

	}

	/**
	 * @return void
	 */
	public function homeAction() {
		session_start();
		$this->view->assign('usrname', $_SESSION['usrname']);
	}

	/**
	 * @return void
	 */
	public function logoutAction() {
		session_start();
		session_destroy();
		$this->redirect('index');
	}

	/**
	 * @return void
	 */
	public function testAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}


	// /**
	//  * @param \SKL\Test\Domain\Model\User $loginUser
	//  * @return void
	//  */
	// public function loginIntoAction(User $loginUser) {
	//
	// }




}
