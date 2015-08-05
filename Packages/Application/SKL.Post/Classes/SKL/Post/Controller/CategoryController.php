<?php
namespace SKL\Post\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Post\Domain\Model\Category;

class CategoryController extends ActionController {

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
     * Injects the security context
     *
     * @param \TYPO3\Flow\Security\Context $securityContext The security context
     * @return void
     */
    public function injectSecurityContext(\TYPO3\Flow\Security\Context $securityContext) {
        $this->securityContext = $securityContext;
    }

    /**
     * @return void
     */
    public function homeAction() {
        $this->view->assign('listCategories', $this->categoryRepository->findAll());
    }

	/**
	 * @return void
	 */
	public function indexAction() {
        $account = $this->securityContext->getAccount();
        $this->view->assign('usrname',$account->getAccountIdentifier());
		$this->view->assign('listCategories', $this->categoryRepository->findAll());
	}

	/**
	 * @param \SKL\Post\Domain\Model\Category $category
	 * @return void
	 */
	public function showAction(Category $category) {
        $account = $this->securityContext->getAccount();
        $this->view->assign('usrname',$account->getAccountIdentifier());
        $this->view->assign('listCategories', $this->categoryRepository->findAll());
        $this->view->assign('category', $category);
	}

	/**
	 * @return void
	 */
	public function newAction() {
        $account = $this->securityContext->getAccount();
        $this->view->assign('usrname',$account->getAccountIdentifier());
        $this->view->assign('listCategories', $this->categoryRepository->findAll());
    }

	/**
	 * @param \SKL\Post\Domain\Model\Category $newCategory
	 * @return void
	 */
	public function createAction(Category $newCategory) {
		$this->categoryRepository->add($newCategory);
		$this->addFlashMessage('Created a new category.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Category $category
	 * @return void
	 */
	public function editAction(Category $category) {
        $account = $this->securityContext->getAccount();
        $this->view->assign('usrname',$account->getAccountIdentifier());
        $this->view->assign('category', $category);
        $this->view->assign('listCategories', $this->categoryRepository->findAll());
	}

	/**
	 * @param \SKL\Post\Domain\Model\Category $category
	 * @return void
	 */
	public function updateAction(Category $category) {
		$this->categoryRepository->update($category);
		$this->addFlashMessage('Updated the category.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Category $category
	 * @return void
	 */
	public function deleteAction(Category $category) {
		$this->categoryRepository->remove($category);
		$this->addFlashMessage('Deleted a category.');
		$this->redirect('index');
	}

}