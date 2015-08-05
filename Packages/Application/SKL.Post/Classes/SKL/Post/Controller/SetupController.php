<?php
namespace SKL\Post\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Post\Domain\Model\Setup;

class SetupController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \SKL\Post\Domain\Repository\SetupRepository
	 */
	protected $setupRepository;

    /**
     * @Flow\Inject
     * @var \SKL\Post\Domain\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var \TYPO3\Flow\Security\Context
     */
    protected $securityContext;

	/**
	 * @return void
	 */
	public function indexAction() {
        $account = $this->securityContext->getAccount();
        $this->view->assign('usrname',$account->getAccountIdentifier());
		$this->view->assign('setups', $this->setupRepository->findAll());
        $this->view->assign('listCategories', $this->categoryRepository->findAll());
	}

	/**
	 * @param \SKL\Post\Domain\Model\Setup $setup
	 * @return void
	 */
	public function showAction(Setup $setup) {
		$this->view->assign('setup', $setup);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \SKL\Post\Domain\Model\Setup $newSetup
	 * @return void
	 */
	public function createAction(Setup $newSetup) {
		$this->setupRepository->add($newSetup);
		$this->addFlashMessage('Created a new setup.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Setup $setup
	 * @return void
	 */
	public function editAction(Setup $setup) {
		$this->view->assign('setup', $setup);
	}

	/**
	 * @param \SKL\Post\Domain\Model\Setup $setup
	 * @return void
	 */
	public function updateAction(Setup $setup) {
		$this->setupRepository->update($setup);
		$this->addFlashMessage('Updated the setup.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Setup $setup
	 * @return void
	 */
	public function deleteAction(Setup $setup) {
		$this->setupRepository->remove($setup);
		$this->addFlashMessage('Deleted a setup.');
		$this->redirect('index');
	}

    /**
     * Injects the security context
     *
     * @param \TYPO3\Flow\Security\Context $securityContext The security context
     * @return void
     */
    public function injectSecurityContext(\TYPO3\Flow\Security\Context $securityContext) {
        $this->securityContext = $securityContext;
    }

}