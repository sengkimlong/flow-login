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
class UserRepository extends Repository {

    /**
     * @return array
     */
    public function findActiveUser () {
        $query = $this->createQuery();
        $result = $query->execute();

        return $result->toArray();
    }

    /**
     * @param \SKL\Test\Domain\Model\User $user
     * @return \SKL\Test\Domain\Model\User
     */
    public function findUserIdentity (\SKL\Test\Domain\Model\User $user) {
      $users = $this->findAll()->toArray();
      for ($i=0; $i<count($users); $i++) {
        if ($users[$i]->getName() === $user->getName()) {
          return $users[$i];
        }
      }
    }

}
