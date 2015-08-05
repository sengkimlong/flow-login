<?php
namespace SKL\Post\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "SKL.Post".              *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Persistence\QueryResultInterface;
use TYPO3\Flow\Persistence\Repository;
use SKL\Post\Domain\Model\Category;

/**
 * @Flow\Scope("singleton")
 */
class PostRepository extends Repository {

//    /**
//     * @param Category $category
//     *  @return QueryResultInterface The posts
//     */
//    public function findByCategory (Category $category) {
//        $query = $this->createQuery();
//        return
//            $query->matching(
//                $query->equals('posts', $category)
//            )->execute();
//    }

}