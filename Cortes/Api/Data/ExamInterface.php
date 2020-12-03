<?php
/**
 * @author: daniDLL
 * Date: 18/11/20
 * Time: 20:23
 */

namespace Hiberus\Cortes\Api\Data;

/**
 * Interface ExamInterface
 * @package Hiberus\Cortes\Api\Data
 */
interface ExamInterface
{
    const   TABLE   =   'hiberus_exam';

    const   ID      =   'id_exam';
    const   FIRSTNAME   =   'firstname';
    const   LASTNAME    =   'lastname';
    const   MARK  =   'mark';

    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return ExamInterface
     */
    public function setId($id);

    /**
     * @param string $firstname
     * @return ExamInterface
     */
    public function setFirstname($firstname);

    /**
     * @return string
     */
    public function getFirstname();

    /**
     * @param string $lastname
     * @return ExamInterface
     */
    public function setLastname($lastname);

    /**
     * @return string
     */
    public function getLastname();

    /**
     * @return float
     */
    public function getMark();

    /**
     * @param float $mark
     * @return ExamInterface
     */
    public function setMark($mark);

}
