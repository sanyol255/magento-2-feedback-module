<?php
/**
 * Action Feedback/Index for CustomerFeedback
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */

namespace SportStore\CustomerFeedback\Controller\Feedback;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

/**
 * Class Index for displaying customer feedback form
 *
 * @package SportStore\CustomerFeedback\Controller\Feedback
 */
class Index extends Action
{
    /**
     * Feedback form factory variable
     *
     * @var PageFactory
     */
    protected $feedbackFormFactory;

    /**
     * Index constructor
     *
     * @param Context $context
     * @param PageFactory $feedbackFormFactory
     */
    public function __construct(Context $context, PageFactory $feedbackFormFactory)
    {
        parent::__construct($context);
        $this->feedbackFormFactory = $feedbackFormFactory;
    }

    /**
     * Rendering feedback form page
     *
     * @return Page
     */
    public function execute() : Page
    {
        $feedbackForm = $this->feedbackFormFactory->create();
        return $feedbackForm;
    }
}


