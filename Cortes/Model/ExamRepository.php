<?php
/**
 * @author: mariCP
 * Date: 01/12/20
 * Time: 17:18
 */

namespace Hiberus\Cortes\Model;

use Hiberus\Cortes\Api\Data\ExamInterfaceFactory;
use Hiberus\Cortes\Api\Data\ExamSearchResultsInterface;
use Hiberus\Cortes\Model\ResourceModel\Exam\Collection;
use Hiberus\Cortes\Model\ResourceModel\Exam\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Hiberus\Cortes\Api\Data;
use Hiberus\Cortes\Api\ExamRepositoryInterface;
use Hiberus\Cortes\Model\ResourceModel;
use Magento\Framework\Model\AbstractModel;

/**
 * Class ExamRepository
 * @package Hiberus\Cortes\Model
 */
class ExamRepository implements ExamRepositoryInterface
{
    /**
     * @var \Hiberus\Cortes\Model\ResourceModel\Exam
     */
    private $resourceExam;

    /**
     * @var ExamInterfaceFactory
     */
    private $examFactory;

    /**
     * @var CollectionFactory
     */
    private $examCollectionFactory;

    /**
     * @var Data\ExamSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param \Hiberus\Cortes\Model\ResourceModel\Exam $resourceExam
     * @param ExamInterfaceFactory $examFactory
     * @param CollectionFactory $examCollectionFactory
     * @param Data\ExamSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    function __construct(
        ResourceModel\Exam $resourceExam,
        ExamInterfaceFactory $examFactory,
        CollectionFactory $examCollectionFactory,
        Data\ExamSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resourceExam = $resourceExam;
        $this->examFactory = $examFactory;
        $this->examCollectionFactory = $examCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param Data\ExamInterface|AbstractModel $exam
     * @return Data\ExamInterface
     * @throws CouldNotSaveException
     */
    public function save(Data\ExamInterface $exam)
    {
        try {
            $this->resourceExam->save($exam);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $exam;
    }

    /**
     * @param int $examId
     * @return Data\ExamInterface
     * @throws NoSuchEntityException
     */
    public function getById($examId)
    {
        /** @var Data\ExamInterface|AbstractModel $exam */
        $exam = $this->examFactory->create();
        $this->resourceExam->load($exam, $examId);
        if (!$exam->getId()) {
            throw new NoSuchEntityException(__('Exam with id "%1" does not exist', $examId));
        }
        return $exam;
    }

    /**
     * @param Data\ExamInterface|AbstractModel $exam
     * @return bool|Data\ExamInterface
     * @throws CouldNotSaveException
     */
    public function delete(Data\ExamInterface $exam)
    {
        try {
            $this->resourceExam->delete($exam);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $exam;
    }

    /**
     * @param int $examId
     * @return bool|Data\ExamInterface
     * @throws CouldNotSaveException
     * @throws NoSuchEntityException
     */
    public function deleteById($examId)
    {
        return $this->delete($this->getById($examId));
    }

    /**
     * Retrieve exams matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return ExamSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        /** @var Collection $collection */
        $collection = $this->examCollectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var Data\ExamSearchResultsInterface $searchResults */
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
