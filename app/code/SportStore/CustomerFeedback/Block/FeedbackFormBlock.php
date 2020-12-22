<?php
/**
 * Block for getting action url for storing data from form to database
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */

namespace SportStore\CustomerFeedback\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class FeedbackFormBlock
 *
 * @package SportStore\CustomerFeedback\Block
 */
class FeedbackFormBlock extends Template
{
    /**
     *Action path for processing submitted feedback form
     */
    const FORM_ACTION = 'customer/feedback/store';

    /**
     * Getting action url for processing form submission
     *
     * @return string
     */
    public function getFeedbackActionUrl() : string
    {
        return $this->getUrl(self::FORM_ACTION);
    }
}
