<?php
/**
 * @author: mariaCP
 * Date: 01/12/20
 * Time: 17:25
 */

namespace Hiberus\Cortes\Model\ResourceModel\Exam;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Hiberus\Cortes\Model;

/**
 * Class Collection
 * @package Hiberus\Cortes\Model\ResourceModel\Exam
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model\Exam::class, Model\ResourceModel\Exam::class);
    }
}
