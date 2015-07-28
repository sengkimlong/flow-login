<?php
namespace SKL\Test\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Test".              *
 *                                                                        *
 *                                                                        */

use SKL\Test\Domain\Model\Form;
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Test\Domain\Model\Question;

class QuestionController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \SKL\Test\Domain\Repository\QuestionRepository
	 */
	protected $questionRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('questions', $this->questionRepository->findAll());
	}

	/**
	 * @param \SKL\Test\Domain\Model\Question $question
	 * @return void
	 */
	public function showAction(Question $question) {
		$this->view->assign('question', $question);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

    /**
     * @param Question $newQuestion
     */
	public function createAction(Question $newQuestion = NULL) {
        $this->questionRepository->add($newQuestion);
        $this->redirect('index', 'Form');
	}

	/**
	 * @param \SKL\Test\Domain\Model\Question $question
	 * @return void
	 */
	public function editAction(Question $question) {
		$this->view->assign('question', $question);
	}

	/**
	 * @param \SKL\Test\Domain\Model\Question $question
	 * @return void
	 */
	public function updateAction(Question $question) {
		$this->questionRepository->update($question);
		$this->addFlashMessage('Updated the question.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Test\Domain\Model\Question $question
	 * @return void
	 */
	public function deleteAction(Question $question) {
		$this->questionRepository->remove($question);
		$this->addFlashMessage('Deleted a question.');
		$this->redirect('index');
	}

}
