<?php
/**
 * Feedback resource model initialization
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Model\ResourceModel;

use SportStore\CustomerFeedback\Api\Data\FeedbackInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Feedback
 *
 * @package SportStore\CustomerFeedback\Model\ResourceModel
 */
class Feedback extends AbstractDb
{
    /**
     *Resource model init with feedback table and its primary key
     */
    protected function _construct()
    {
        $this->_init('customers_feedbacks', FeedbackInterface::ID);
    }
}
