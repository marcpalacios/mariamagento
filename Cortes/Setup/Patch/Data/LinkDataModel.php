<?php
/**
 * @author: mariaCP
 * Date: 01/12/20
 * Time: 18:00
 */

namespace Hiberus\Cortes\Setup\Patch\Data;

use Hiberus\Cortes\Api\Data\ExamInterface;
use Hiberus\Cortes\Api\ExamRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class LinkDataModel
 * @package Hiberus\Cortes\Setup\Patch\Data
 */
class LinkDataModel implements DataPatchInterface
{
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var ExamRepositoryInterface
     */
    private $examRepository;


    /**
     * LinkDataModel constructor.
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ExamRepositoryInterface $examRepository
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ExamRepositoryInterface $examRepository
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->examRepository = $examRepository;
    }

    /**
     * @return DataPatchInterface|void
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function apply()
    {
        $this->linkData();
    }

    /**
     * @return ExamInterface[]
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    private function getExamList()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();

        $examResults = $this->examRepository->getList($searchCriteria)->getItems();

        if (empty($examResults)) {
            throw new NoSuchEntityException(
                __('No exam found.')
            );
        }

        return $examResults;
    }





    /**
     * @return string[]
     */
    public static function getDependencies()
    {
        return [
            PopulateDataModel::class
        ];
    }

    /**
     * @return string[]
     */
    public function getAliases()
    {
        return [];
    }
}
