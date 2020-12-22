<?php
/**
 * Action Adminhtml/Feedback/Details for CustomerFeedback

 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Controller\Adminhtml\Feedback;

use Magento\Backend\App\AbstractAction;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\View\Result\Page;

/**
 * Class Details
 *
 * @package SportStore\CustomerFeedback\Controller\Adminhtml\Feedback
 */
class Details extends AbstractAction implements HttpGetActionInterface
{
    /**
     * Details ACL Resource from etc/acl.xml
     */
    const DETAILS_ACL_RESOURCE = 'SportStore_CustomerFeedback::feedback_details';
    /**
     * PageFactory variable
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Details constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Creating feedback details page and setting active feedback menu with custom title
     *
     * @return Page
     */
    public function execute() : Page
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Feedback Details'));
        $resultPage->setActiveMenu('SportStore_CustomerFeedback::feedback_menu');

        return $resultPage;
    }

    /**
     * Adding DETAILS_ACL_RESOURCE to allowed resources
     *
     * @return bool
     */
    protected function _isAllowed() : bool
    {
        return $this->_authorization->isAllowed(static::DETAILS_ACL_RESOURCE);
    }
}
