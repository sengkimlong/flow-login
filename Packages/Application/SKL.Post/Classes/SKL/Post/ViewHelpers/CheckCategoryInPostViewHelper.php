<?php
namespace SKL\Post\ViewHelpers;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "TYPO3.Fluid".           *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\Fluid\Core\ViewHelper;
use SKL\Post\Domain\Model\Category;
use SKL\Post\Domain\Model\Post;

class CheckCategoryInPostViewHelper extends AbstractViewHelper {

    /**
     * @param Post $post
     * @param Category $category
     *
     * @return bool
     */
    public function render(Post $post, Category $category) {
        if ($post->getCategories()->contains($category)) {
            return TRUE;
        }
        return FALSE;
    }
}
