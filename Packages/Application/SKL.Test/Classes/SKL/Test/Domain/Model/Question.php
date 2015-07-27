<?php
namespace SKL\Test\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Test".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Question {

    /**
     * @var int
     * @ORM\Column(unique=true, columnDefinition="INT NOT NULL AUTO_INCREMENT UNIQUE")
     */
    protected $id;

	/**
	 * @var string
	 */
	protected $sentence;

    /**
     * @var \SKL\Test\Domain\Model\Form
     * @ORM\ManyToOne(inversedBy="questions")
     */
    protected $form;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

	/**
	 * @return string
	 */
	public function getSentence() {
		return $this->sentence;
	}

	/**
	 * @param string $sentence
	 * @return void
	 */
	public function setSentence($sentence) {
		$this->sentence = $sentence;
	}

    /**
     * @param \SKL\Test\Domain\Model\Form $form
     */
    public function setForm(\SKL\Test\Domain\Model\Form $form) {
        $this->form = $form;
    }

}