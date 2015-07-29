<?php
namespace SKL\Test\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Test".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Test\Domain\Model\Answer;
use SKL\Test\Domain\Repository\QuestionRepository;

class AnswerController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \SKL\Test\Domain\Repository\AnswerRepository
	 */
	protected $answerRepository;

	/**
	 * @Flow\Inject
	 * @var \Doctrine\Common\Persistence\ObjectManager
	 */
	protected $entityManager;

	/**
	 * @Flow\Inject
	 * @var QuestionRepository
	 */
	protected $questionRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('answers', $this->answerRepository->findAll());
	}

	/**
	 * @param \SKL\Test\Domain\Model\Answer $answer
	 * @return void
	 */
	public function showAction(Answer $answer) {
		$this->view->assign('answer', $answer);
	}

	// /**
	//  * @return void
	//  */
	// public function newAction() {
	// }

	/**
	 * @return void
	 */
	public function createAction() {
		session_start();
		$answers = $this->request->getArguments('obj');

		for($i=0; $i<count($answers['obj']);$i++) {
			$question = $this->questionRepository->findByIdentifier($answers['obj']['question-'.($i+1)]['__identity']);
			$user = $_SESSION['identity'];
			$answer = new \SKL\Test\Domain\Model\Answer();

			$answer->setQuestion($question);
			$user = $this->entityManager->merge($user);
			$answer->setUser($user);
			$this->entityManager->flush();
			$answer->setName($answers['obj']['question-'.($i+1)][0]);
			$this->answerRepository->add($answer);

		}
		$this->redirect('index','form');
	}

	/**
	 * @param \SKL\Test\Domain\Model\Answer $answer
	 * @return void
	 */
	public function editAction(Answer $answer) {
		$this->view->assign('answer', $answer);
	}

	/**
	 * @param \SKL\Test\Domain\Model\Answer $answer
	 * @return void
	 */
	public function updateAction(Answer $answer) {
		$this->answerRepository->update($answer);
		$this->addFlashMessage('Updated the answer.');
		$this->redirect('index');
	}

	// /**
	//  * @param \SKL\Test\Domain\Model\Answer $answer
	//  * @return void
	//  */
	// public function deleteAction(Answer $answer) {
	// 	$this->answerRepository->remove($answer);
	// 	$this->addFlashMessage('Deleted a answer.');
	// 	$this->redirect('index');
	// }

}
