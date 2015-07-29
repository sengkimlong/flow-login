<?php
namespace SKL\Test\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Test".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
// use SKL\Test\Domain\Model\ as SKL;

/**
 * @Flow\Entity
 */
class Answer {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var \SKL\Test\Domain\Model\Question
	 * @ORM\ManyToOne(inversedBy="answers")
	 */
	protected $question;

	/**
	 * @var \SKL\Test\Domain\Model\User
	 * @ORM\ManyToOne(inversedBy="uanswers")
	 */
	protected $user;

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
	 * @param \SKL\Test\Domain\Model\Question $question
	 */
	public function setQuestion(\SKL\Test\Domain\Model\Question $question) {
			$this->question = $question;
	}

	/**
	 * @param \SKL\Test\Domain\Model\User $user
	 */
	public function setUser(\SKL\Test\Domain\Model\User $user) {
			$this->user = $user;
	}

}
