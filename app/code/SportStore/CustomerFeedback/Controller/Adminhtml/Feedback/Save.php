<?php
/**
 * Action Adminhtml/Feedback/Save for CustomerFeedback
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Controller\Adminhtml\Feedback;

use Exception;
use Magento\Backend\App\AbstractAction;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\ResponseInterface;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterface;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterfaceFactory;
use SportStore\CustomerFeedback\Api\FeedbackRepositoryInterface;

/**
 * Class Save
 *
 * @package SportStore\CustomerFeedback\Controller\Adminhtml\Feedback
 */
class Save extends AbstractAction implements HttpPostActionInterface
{
    /**
     *Save ACL Resource from etc/acl.xml
     */
    const SAVE_ACL_RESOURCE = 'SportStore_CustomerFeedback::feedback_save';

    /**
     * Feedback Interface factory
     *
     * @var FeedbackInterfaceFactory
     */
    protected $feedbackInterfaceFactory;

    /**
     * Feedback repository
     *
     * @var FeedbackRepositoryInterface
     */
    protected $feedbackRepository;

    /**
     * Save constructor
     *
     * @param Action\Context $context
     * @param FeedbackInterfaceFactory $feedbackInterfaceFactory
     * @param FeedbackRepositoryInterface $feedbackRepository
     */
    public function __construct(
        Action\Context $context,
        FeedbackInterfaceFactory $feedbackInterfaceFactory,
        FeedbackRepositoryInterface $feedbackRepository
    ) {
        parent::__construct($context);
        $this->feedbackInterfaceFactory = $feedbackInterfaceFactory;
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * Saving changes to feedback and redirect to manage current feedback page
     *
     * @return ResponseInterface
     */
    public function execute() :ResponseInterface
    {
        $model = $this->feedbackInterfaceFactory->create();
        $data = $this->getRequest()->getParams();
        if (!$this->getRequest()->getParam(FeedbackInterface::ID)) {
            unset($data[FeedbackInterface::ID]);
        }
        $model->setData($data);
        try {
            $this->feedbackRepository->save($model);
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $this->_redirect('customerfeed/feedback/manage', [FeedbackInterface::ID => $model->getId()]);
    }

    /**
     * Adding SAVE_VIEW_ACL_RESOURCE to allowed resources
     *
     * @return bool
     */
    protected function _isAllowed() : bool
    {
        return $this->_authorization->isAllowed(static::SAVE_ACL_RESOURCE);
    }
}
