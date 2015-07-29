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
class User {

	// /**
	//  * @var int
	//  */
	// protected $id;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $password;

	/**
	 * @var string
	 */
	protected $confirmpassword;

	/**
	 * @var string
	 */
	protected $email;

	/**
   * @var \Doctrine\Common\Collections\Collection<\SKL\Test\Domain\Model\Answer>
   * @ORM\OneToMany(mappedBy="user")
   */
  protected $uanswers;

	// /**
	//  * @return int
	//  */
	// public function getId() {
	// 	return $this->id;
	// }
	//
	// /**
	//  * @param int $id
	//  * @return void
	//  */
	// public function setId($id) {
	// 	$this->id = $id;
	// }

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
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param string $password
	 * @return void
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * @return string
	 */
	public function getConfirmpassword() {
		return $this->confirmpassword;
	}

	/**
	 * @param string $confirmpassword
	 * @return void
	 */
	public function setConfirmpassword($confirmpassword) {
		$this->confirmpassword = $confirmpassword;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

}
