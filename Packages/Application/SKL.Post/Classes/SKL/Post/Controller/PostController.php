<?php
namespace SKL\Post\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Post\Domain\Model\Post;

class PostController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \SKL\Post\Domain\Repository\PostRepository
	 */
	protected $postRepository;

	/**
	 * @Flow\Inject
	 * @var \SKL\Post\Domain\Repository\CategoryRepository
	 */
	protected $categoryRepository;

	/**
	 * @Flow\Inject
	 * @var \SKL\Post\Domain\Repository\AuthorRepository
	 */
	protected $authorRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('posts', $this->postRepository->findAll());
	}

	/**
	 * @param \SKL\Post\Domain\Model\Post $post
	 * @return void
	 */
	public function showAction(Post $post) {
		$this->view->assign('post', $post);
	}

	/**
	 * @return void
	 */
	public function newAction() {
		$this->view->assign('listCategory', $this->categoryRepository->findAll());
		$this->view->assign('listAuthor', $this->authorRepository->findAll());
	}

	/**
	 * @param \SKL\Post\Domain\Model\Post $newPost
	 * @return void
	 */
	public function createAction(Post $newPost) {
//		\TYPO3\Flow\var_dump($newPost);
//		die();
		$this->postRepository->add($newPost);
		$this->addFlashMessage('Created a new post.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Post $post
	 * @return void
	 */
	public function editAction(Post $post) {
		$this->view->assign('post', $post);
		$this->view->assign('listCategory', $this->categoryRepository->findAll());
		$this->view->assign('listAuthor', $this->authorRepository->findAll());
	}

	/**
	 * @param \SKL\Post\Domain\Model\Post $post
	 * @return void
	 */
	public function updateAction(Post $post) {
//		\TYPO3\Flow\var_dump($post);
//		die();
		$this->postRepository->update($post);
		$this->addFlashMessage('Updated the post.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Post\Domain\Model\Post $post
	 * @return void
	 */
	public function deleteAction(Post $post) {
		$this->postRepository->remove($post);
		$this->addFlashMessage('Deleted a post.');
		$this->redirect('index');
	}

}
