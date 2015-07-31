<?php
namespace SKL\Post\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Post\Domain\Model\Author;

class AuthorController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \SKL\Post\Domain\Repository\AuthorRepository
	 */
	protected $authorRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('authors', $this->authorRepository->findAll());
	}

	/**
	 * @param \SKL\Post\Domain\Model\Author $author
	 * @return void
	 */
	public function showAction(Author $author) {
		$this->view->assign('author', $author);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \SKL\Post\Domain\Model\Author $newAuthor
	 * @return void
	 */
	public function createAction(Author $newAuthor) {
		$this->authorRepository->add($newAuthor);
		$this->addFlashMessage('Created a new author.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Author $author
	 * @return void
	 */
	public function editAction(Author $author) {
		$this->view->assign('author', $author);
	}

	/**
	 * @param \SKL\Post\Domain\Model\Author $author
	 * @return void
	 */
	public function updateAction(Author $author) {
		$this->authorRepository->update($author);
		$this->addFlashMessage('Updated the author.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Author $author
	 * @return void
	 */
	public function deleteAction(Author $author) {
		$this->authorRepository->remove($author);
		$this->addFlashMessage('Deleted a author.');
		$this->redirect('index');
	}

}