<?php
namespace SKL\Post\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Flow\Entity
 */
class Category {

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\SKL\Post\Domain\Model\Post> $posts
	 * @ORM\ManyToMany(mappedBy="categories")
	 */
	protected $posts;

	/**
	 * @var \SKL\Post\Domain\Model\Form
	 * @ORM\ManyToOne(inversedBy="categories")
	 */
	protected $form;

	/**
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 * @Flow\Inject
	 */
	protected $persistenceManager;

	/**
	 * @return string
	 */
	public function getIdentity() {
		return $this->persistenceManager->getIdentifierByObject($this);
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

}
