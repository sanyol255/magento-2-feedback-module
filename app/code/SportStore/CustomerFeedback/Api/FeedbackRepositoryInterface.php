<?php
/**
 *Interface for Feedback Repository
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterface;

/**
 * Interface FeedbackRepositoryInterface
 *
 * @package SportStore\CustomerFeedback\Api
 */
interface FeedbackRepositoryInterface
{
    /**
     * Method for getting data by id
     *
     * @param int $id
     *
     * @return FeedbackInterface
     */
    public function getById(int $id) : FeedbackInterface;

    /**
     * Method for getting list of data specified by search criteria
     *
     * @param SearchCriteriaInterface $criteria
     *
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria) : SearchResultsInterface;

    /**
     * Method for deleting data by id
     *
     * @param int $id
     */
    public function deleteById(int $id);

    /**
     * Method for deleting data
     *
     * @param FeedbackInterface $model
     */
    public function delete(FeedbackInterface $model);

    /**
     * Method for saving data
     *
     * @param FeedbackInterface $model
     *
     * @return FeedbackInterface
     */
    public function save(FeedbackInterface $model) : FeedbackInterface;
}
