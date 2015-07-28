<?php
namespace SKL\Test\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Test".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use SKL\Test\Domain\Model\Form;

class FormController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \SKL\Test\Domain\Repository\FormRepository
	 */
	protected $formRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('forms', $this->formRepository->findAll());
	}

	/**
	 * @param \SKL\Test\Domain\Model\Form $form
	 * @return void
	 */
	public function showAction(Form $form) {
		$this->view->assign('forms', $this->formRepository->findAll());
		$this->view->assign('form', $form);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \SKL\Test\Domain\Model\Form $newForm
	 * @return void
	 */
	public function createAction(Form $newForm) {
		$this->formRepository->add($newForm);
		$this->addFlashMessage('Created a new form.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Test\Domain\Model\Form $form
	 * @return void
	 */
	public function editAction(Form $form) {
		$this->view->assign('form', $form);
	}

	/**
	 * @param \SKL\Test\Domain\Model\Form $form
	 * @return void
	 */
	public function updateAction(Form $form) {
		$this->formRepository->update($form);
		$this->addFlashMessage('Updated the form.');
		$this->redirect('index');
	}

	/**
	 * @param \SKL\Test\Domain\Model\Form $form
	 * @return void
	 */
	public function deleteAction(Form $form) {
		$this->formRepository->remove($form);
		$this->addFlashMessage('Deleted a form.');
		$this->redirect('index');
	}

}
