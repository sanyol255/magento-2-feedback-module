<?php
/**
 * Feedback Repository

 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterface;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterfaceFactory;
use SportStore\CustomerFeedback\Api\FeedbackRepositoryInterface;
use SportStore\CustomerFeedback\Model\ResourceModel\Feedback as ResourceModel;
use SportStore\CustomerFeedback\Model\ResourceModel\Feedback\CollectionFactory;

/**
 * Class FeedbackRepository
 *
 * @package SportStore\CustomerFeedback\Model
 */
class FeedbackRepository implements FeedbackRepositoryInterface
{
    /**
     * Feedback resource model
     *
     * @var ResourceModel
     */
    protected $resourceModel;

    /**
     * Factory for feedback interface
     *
     * @var FeedbackInterfaceFactory
     */
    protected $modelFactory;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $processor;

    /**
     * @var SearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * FeedbackRepository constructor
     *
     * @param FeedbackInterfaceFactory $modelFactory
     * @param ResourceModel $resourceModel
     * @param CollectionFactory $collectionFactory
     * @param CollectionProcessorInterface $processor
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        FeedbackInterfaceFactory $modelFactory,
        ResourceModel $resourceModel,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $processor,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resourceModel = $resourceModel;
        $this->modelFactory = $modelFactory;
        $this->collectionFactory = $collectionFactory;
        $this->processor = $processor;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    /**
     * Getting data by id
     *
     * @param int $id
     *
     * @return FeedbackInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id) : FeedbackInterface
    {
        $model = $this->modelFactory->create();
        $this->resourceModel->load($model, $id, FeedbackInterface::ID);
        if (!$model->getFeedbackId()) {
            throw new NoSuchEntityException(__('There is no such entity %1!', $id));
        }
        return $model;
    }

    /**
     * Getting list of feedbacks
     *
     * @param SearchCriteriaInterface $criteria
     *
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria) : SearchResultsInterface
    {
        $collection = $this->collectionFactory->create();

        $this->processor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        return $searchResults;
    }

    /**
     * Delete by id
     *
     * @param int $id
     */
    public function deleteById(int $id)
    {
        $model = $this->getById($id);
        $this->delete($model);
    }

    /**
     * Delete method
     *
     * @param FeedbackInterface $model
     */
    public function delete(FeedbackInterface $model)
    {
        $this->resourceModel->delete($model);
    }

    /**
     * Save data method
     *
     * @param FeedbackInterface $model
     *
     * @return FeedbackInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(FeedbackInterface $model) : FeedbackInterface
    {
        $this->resourceModel->save($model);

        return $model;
    }
}
