<?php
namespace SKL\Post\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use TYPO3\Flow\Security\Account;

/**
 * @Flow\Entity
 */
class User extends Account {

	/**
	 * @var string
	 */
	protected $name;

    /**
    * @var \Doctrine\Common\Collections\Collection<\SKL\Post\Domain\Model\Post>
    * @ORM\OneToMany(mappedBy="user")
    */
    protected $posts;

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

}