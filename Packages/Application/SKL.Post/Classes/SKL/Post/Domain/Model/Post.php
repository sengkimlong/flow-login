<?php
namespace SKL\Post\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Post {

	/**
	 * @var string
	 */
	protected $name;

    /**
     * @var string
     * @ORM\Column(type="text")
     */
    protected $content;

    /**
     * @var \SKL\Post\Domain\Model\User
     * @ORM\ManyToOne(inversedBy="posts")
     */
    protected $user;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\SKL\Post\Domain\Model\Category> $categories
	 * @ORM\ManyToMany(inversedBy="posts")
	 */
	protected $categories;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\SKL\Post\Domain\Model\Author> $authors
	 * @ORM\ManyToMany(inversedBy="posts")
	 */
	protected $authors;

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
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection $categories
	 */
	public function setCategories($categories) {
		$this->categories = $categories;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getAuthors()
	{
		return $this->authors;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection $authors
	 */
	public function setAuthors($authors)
	{
		$this->authors = $authors;
	}

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}
