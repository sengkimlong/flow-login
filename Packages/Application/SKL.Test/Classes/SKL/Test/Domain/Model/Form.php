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
class Form {

    /**
     * @var int
     * @ORM\Column(unique=true, columnDefinition="INT NOT NULL AUTO_INCREMENT UNIQUE")
     */
    protected $id;

	/**
	 * @var string
	 */
	protected $name;

    /**
     * @var \Doctrine\Common\Collections\Collection<\SKL\Test\Domain\Model\Question>
     * @ORM\OneToMany(mappedBy="form")
     */
    protected $questions;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Adds a post to this blog
     *
     * @param \SKL\Test\Domain\Model\Question $question
     * @return void
     */
    public function addPost(\SKL\Test\Domain\Model\Question $question) {
        $question->setForm($this);
        $this->questions->add($question);
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions() {
        return $this->questions;
    }
}