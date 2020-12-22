<?php
/**
 * Feedback Model

 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Model;

use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\Registry;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterface;
use SportStore\CustomerFeedback\Model\ResourceModel\Feedback as ResourceModel;

/**
 * Class Feedback
 * @package SportStore\CustomerFeedback\Model
 */
class Feedback extends AbstractModel implements FeedbackInterface
{
    /**
     * Feedback constructor
     *
     * @param Context $context
     * @param Registry $registry
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param FeedbackValidator $feedbackValidator
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        FeedbackValidator $feedbackValidator,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->_validatorBeforeSave = $feedbackValidator;
    }
    /**
     *Feedback Model initialization with resource model and setting id field name
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init(ResourceModel::class);
        $this->setIdFieldName(FeedbackInterface::ID);
    }

    /**
     * Setting customer first name
     *
     * @param string $firstname
     *
     * @return FeedbackInterface
     */
    public function setFirstname(string $firstname): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::FIRSTNAME, $firstname);
    }

    /**
     * Setting customer last name
     *
     * @param string $lastname
     *
     * @return FeedbackInterface
     */
    public function setLastname(string $lastname): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::LASTNAME, $lastname);
    }

    /**
     * Setting customer age
     *
     * @param int $age
     *
     * @return FeedbackInterface
     */
    public function setAge(int $age): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::AGE, $age);
    }

    /**
     * Setting customer email
     *
     * @param string $email
     *
     * @return FeedbackInterface
     */
    public function setEmail(string $email): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::EMAIL, $email);
    }

    /**
     * SAetting title of the feedback
     *
     * @param string $title
     *
     * @return FeedbackInterface
     */
    public function setTitle(string $title): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::TITLE, $title);
    }

    /**
     * Setting feedback message
     *
     * @param string $message
     *
     * @return FeedbackInterface
     */
    public function setMessage(string $message): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::MESSAGE, $message);
    }

    /**
     * Setting feedback status - 9 (not answered) by default in db_schema
     *
     * @param int $status
     *
     * @return FeedbackInterface
     */
    public function setStatus(int $status): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::STATUS, $status);
    }

    /**
     * Setting admin answer to customer feedback
     *
     * @param string $answer
     *
     * @return FeedbackInterface
     */
    public function setAnswer(string $answer): FeedbackInterface
    {
        return $this->setData(FeedbackInterface::ANSWER, $answer);
    }

    /**
     * Getting primary key - feedback_id field
     *
     * @return int
     */
    public function getFeedbackId(): ?int
    {
        return $this->getData(FeedbackInterface::ID);
    }

    /**
     * Getting customer first name
     *
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->getData(FeedbackInterface::FIRSTNAME);
    }

    /**
     * Getting customer last name
     *
     * @return string
     */
    public function getLastname(): string
    {
        return $this->getData(FeedbackInterface::LASTNAME);
    }

    /**
     * Get customer age
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->getData(FeedbackInterface::AGE);
    }

    /**
     * Getting customer email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->getData(FeedbackInterface::EMAIL);
    }

    /**
     * Getting feedback title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getData(FeedbackInterface::TITLE);
    }

    /**
     * Getting feedback message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->getData(FeedbackInterface::MESSAGE);
    }

    /**
     * Getting feedback status: 7 - answered, 9 - not answered
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->getData(FeedbackInterface::STATUS);
    }

    /**
     * Getting admin answer to feedback
     *
     * @return string|null
     */
    public function getAnswer() : ?string
    {
        return $this->getData(FeedbackInterface::ANSWER);
    }
}
