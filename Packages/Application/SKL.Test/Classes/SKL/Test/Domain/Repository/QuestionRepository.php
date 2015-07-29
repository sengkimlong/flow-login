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
class QuestionRepository extends Repository {

    /**
     * @var \SKL\Test\Domain\Repository\FormRepository
     */
    protected $formRepository;

//    /**
//     * @return array
//     */
//    public function findQuestionByForm() {
//
//    }

  /**
   * @param string $identity
   * @return array
   */
   public function findQuestionByIdentity ($identity) {
     $query = $this->createQuery();
     $query->matching($query->equals('persistence_object_identifier',$identity));
     return $query->execute()->toArray();
   }

}
