<?php
/**
 * @author: mariaCP
 * Date: 01/12/20
 * Time: 18:35
 */

namespace Hiberus\Cortes\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface ExamSearchResultsInterface
 * @package Hiberus\Cortes\Api\Data
 */
interface ExamSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get exam list.
     *
     * @return ExamInterface[]
     */
    public function getItems();

    /**
     * Set exam list.
     *
     * @param ExamInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
