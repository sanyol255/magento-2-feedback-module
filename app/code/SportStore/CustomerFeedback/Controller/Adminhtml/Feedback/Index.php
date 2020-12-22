<?php
/**
 * Action Adminhtml/Feedback/Index for CustomerFeedback

 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Controller\Adminhtml\Feedback;

use Magento\Backend\App\AbstractAction;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index for displaying feedbacks list
 *
 * @package SportStore\CustomerFeedback\Controller\Adminhtml\Feedback
 */
class Index extends AbstractAction implements HttpGetActionInterface
{
    /**
     *Grid ACL Resource from etc/acl.xml
     */
    const GRID_VIEW_ACL_RESOURCE = 'SportStore_CustomerFeedback:feedback_grid';

    /**
     * PageFactory variable
     *
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * Index constructor
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    /**
     * Creating feedback grid page and setting active feedback menu with custom title
     *
     * @return Page
     */
    public function execute() : Page
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('SportStore_CustomerFeedback::feedback_menu');
        $page->getConfig()->getTitle()->prepend(__('Customers Feedbacks'));

        return $page;
    }

    /**
     * Adding GRID_VIEW_ACL_RESOURCE to allowed resources
     *
     * @return bool
     */
    protected function _isAllowed() : bool
    {
        return $this->_authorization->isAllowed(static::GRID_VIEW_ACL_RESOURCE);
    }
}
