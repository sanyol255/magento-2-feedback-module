<?php
/**
 * Action Adminhtml/Feedback/Manage for CustomerFeedback
 *
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
 * Class Manage
 *
 * @package SportStore\CustomerFeedback\Controller\Adminhtml\Feedback
 */
class Manage extends AbstractAction implements HttpGetActionInterface
{
    /**
     * Manage ACL Resource from etc/acl.xml
     */
    const MANAGE_ACL_RESOURCE = 'SportStore_CustomerFeedback::feedback_manage';

    /**
     * Page Factory variable
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Manage constructor
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
     * Creating manage feedback page
     *
     * @return Page
     */
    public function execute() : Page
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Managing Customer Feedback'));
        $resultPage->setActiveMenu('SportStore_CustomerFeedback::feedback_menu');

        return $resultPage;
    }

    /**
     *Adding MANAGE_VIEW_ACL_RESOURCE to allowed resources
     *
     * @return bool
     */
    protected function _isAllowed() : bool
    {
        return $this->_authorization->isAllowed(static::MANAGE_ACL_RESOURCE);
    }
}
