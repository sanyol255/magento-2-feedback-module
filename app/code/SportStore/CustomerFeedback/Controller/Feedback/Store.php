<?php
/**
 * Action Feedback/Store for CustomerFeedback
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Controller\Feedback;

use Exception;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterfaceFactory;
use SportStore\CustomerFeedback\Api\FeedbackRepositoryInterface;

/**
 * Class Store for saving customer feedback data to database
 *
 * @package SportStore\CustomerFeedback\Controller\Feedback
 */
class Store extends Action
{
    /**
     * Variable for feedback model
     *
     * @var FeedbackInterfaceFactory
     */
    protected $feedbackFactory;

    /**
     * Variable for feedback repository
     *
     * @var FeedbackRepositoryInterface
     */
    protected $feedbackRepository;

    /**
     * Store action constructor
     *
     * @param Context $context
     * @param FeedbackInterfaceFactory $feedbackFactory
     * @param FeedbackRepositoryInterface $feedbackRepository
     */
    public function __construct(
        Context $context,
        FeedbackInterfaceFactory $feedbackFactory,
        FeedbackRepositoryInterface $feedbackRepository
    ) {
        parent::__construct($context);
        $this->feedbackFactory = $feedbackFactory;
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * Saving feedback data from form to database and redirecting back to feedback form page with
     * successful message
     */
    public function execute()
    {
        $model = $this->feedbackFactory->create();
        $model->setFirstname($this->getRequest()->getParam('firstname'))
              ->setLastname($this->getRequest()->getParam('lastname'))
              ->setAge($this->getRequest()->getParam('age'))
              ->setEmail($this->getRequest()->getParam('email'))
              ->setMessage($this->getRequest()->getParam('message'))
              ->setTitle($this->getRequest()->getParam('title'));
        try {
            $this->feedbackRepository->save($model);
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        $this->_redirect('customer/feedback/index');
        $this->messageManager->addNoticeMessage(__('Your feedback was added'));
    }
}
