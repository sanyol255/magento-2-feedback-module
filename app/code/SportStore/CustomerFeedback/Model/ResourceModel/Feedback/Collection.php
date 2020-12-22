<?php
/**
 * Feedback Collection initialization

 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Model\ResourceModel\Feedback;

use SportStore\CustomerFeedback\Model\Feedback;
use SportStore\CustomerFeedback\Model\ResourceModel\Feedback as ResourceFeedback;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 *
 * @package SportStore\CustomerFeedback\Model\ResourceModel\Feedback
 */
class Collection extends AbstractCollection
{
    /**
     *Collection init with Feedback model and resource model
     */
    public function _construct()
    {
        $this->_init(Feedback::class, ResourceFeedback::class);
    }
}
