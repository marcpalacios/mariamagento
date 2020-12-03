<?php

namespace Hiberus\Cortes\Setup\Patch\Data;

use Hiberus\Cortes\Api\Data\ExamInterface;
use Hiberus\Cortes\Api\Data\ExamInterfaceFactory;
use Hiberus\Cortes\Api\ExamRepositoryInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\Client\CurlFactory;

/**
 * Class PopulateDataModel
 * @package Hiberus\Cortes\Setup\Patch\Data
 */
class PopulateDataModel implements DataPatchInterface
{
    const   EXAMS = array( array('Ana', 'Lopez'), array('Belen', 'Castillo'), array('Carolina', 'Juez'), array('Diana', 'Martinez'));

    /**
     * @var ExamRepositoryInterface
     */
    private $examRepository;

    /**
     * @var ExamInterfaceFactory
     */
    private $examFactory;


    /**
     * @var CurlFactory
     */
    private $curlFactory;

    /**
     * PopulateDataModel constructor.
     * @param ExamRepositoryInterface $examRepository
     * @param ExamInterfaceFactory $examFactory
     * @param CurlFactory $curlFactory
     */
    public function __construct(
        ExamRepositoryInterface $examRepository,
        ExamInterfaceFactory $examFactory,
        CurlFactory $curlFactory
    ) {
        $this->examRepository = $examRepository;
        $this->examFactory = $examFactory;
        $this->curlFactory = $curlFactory;
    }

    /**
     * @return DataPatchInterface|void
     */
    public function apply()
    {
        $this->populateData();
    }

    /**
     * Populate Data Model
     */
    private function populateData()
    {
        $this->populateExams();
    }

    /**
     * Populate Exams Data
     */
    private function populateExams()
    {
        for ($i = 0; $i < sizeof(self::EXAMS); $i++) {

            /** @var ExamInterface $exam */
            $exam = $this->examFactory->create();
            $aux = EXAMS[$i];

            $exam->setFirstName($aux[0])
                ->setLastName($aux[1])
                ->setMark(10)
            ;

            $this->examRepository->save(
                $exam
            );
        }
    }

    /**
     * @return string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }
}
