<?php
/**
 * @author: mariaCP
 * Date: 01/12/20
 * Time: 17:10
 */

namespace Hiberus\Cortes\Model;

use Hiberus\Cortes\Api\Data\AuthorInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Author
 * @package Hiberus\Cortes\Model
 */
class Exam extends AbstractModel implements ExamInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Cortes\Model\ResourceModel\Exam::class);
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * @param int|mixed $id
     * @return ExamInterface|Exam|AbstractModel
     */

    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @return mixed|string
     */
    public function getFirstname()
    {
        return $this->_getData(self::FIRSTNAME);
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->_getData(self::LASTNAME);
    }

    /**
     * @param string $firstname
     * @return ExamInterface|Exam
     */
    public function setFirstname($firstname)
    {
        return $this->setData(self::FIRSTNAME, $firstname);
    }

    /**
     * @param string $lastname
     * @return ExamInterface|Exam
     */
    public function setLastname($lastname)
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    /**
     * @return float
     */
    public function getMark()
    {
        return $this->_getData(self::MARK);
    }

    /**
     * @param float $mark
     * @return ExamInterface
     */
    public function setMark($mark)
    {
        return $this->setData(self::BIRTH_CITY, $birthCity);
    }

    /**
     * @return int[]
     */
    public function getExamIds()
    {
        return $this->_getData(self::EXAM_IDS);
    }

    /**
     * @param int[] $examIds
     * @return ExamInterface
     */
    public function setExamIds($examIds)
    {
        return $this->setData(self::EXAM_IDS, $examIds);
    }
}
