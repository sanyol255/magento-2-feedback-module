<?php
/**
 * Adminhtml/Feedback/Delete action
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
use SportStore\CustomerFeedback\Api\FeedbackRepositoryInterface;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterface;

/**
 * Class Delete
 *
 * @package SportStore\CustomerFeedback\Controller\Adminhtml\Feedback
 */
class Delete extends AbstractAction implements HttpGetActionInterface
{
    /**
     * Delete ACL Resource from etc/acl.xml
     */
    const DELETE_ACL_RESOURCE = 'SportStore_CustomerFeedback::feedback_delete';

    /**
     * Feedback Repository
     *
     * @var FeedbackRepositoryInterface
     */
    protected $feedbackRepository;

    /**
     * Delete constructor
     *
     * @param Context $context
     * @param FeedbackRepositoryInterface $feedbackRepository
     */
    public function __construct(
        Context $context,
        FeedbackRepositoryInterface $feedbackRepository
    ) {
        parent::__construct($context);
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * Delete feedback with redirect to admin grid with successful message
     */
    public function execute()
    {
        $this->feedbackRepository->deleteById($this->getRequest()->getParam(FeedbackInterface::ID));
        $this->_redirect('customerfeed/feedback/index');
        $this->messageManager->addNoticeMessage(__('Feedback was successfully deleted'));
    }

    /**
     * Adding DELETE_ACL_RESOURCE to allowed resources
     *
     * @return bool
     */
    protected function _isAllowed() : bool
    {
        return $this->_authorization->isAllowed(static::DELETE_ACL_RESOURCE);
    }
}
