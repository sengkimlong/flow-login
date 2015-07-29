<?php
namespace SKL\Test\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Test".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 */
class AnswerRepository extends Repository {

  /**
   * @param string $user
   * @return array
   */
	public function findByUser($user) {
    $query = $this->createQuery();
    $query->matching($query->contains('name',$user));
    return $query->execute()->toArray();
  }

}
