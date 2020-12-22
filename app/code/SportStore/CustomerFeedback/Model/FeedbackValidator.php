<?php
/**
 * Feedback form validation
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Model;

use Magento\Customer\Model\Session;
use Magento\Framework\Validator\AbstractValidator;
use Magento\Framework\Validator\NotEmpty;

/**
 * Class FeedbackValidator
 *
 * @package SportStore\CustomerFeedback\Model
 */
class FeedbackValidator extends AbstractValidator
{
    /**
     * Current feedback session
     *
     * @var Session
     */
    protected $feedbackSession;

    /**
     * FeedbackValidator constructor
     *
     * @param Session $feedbackSession
     */
    public function __construct(Session $feedbackSession)
    {
        $this->feedbackSession = $feedbackSession;
    }

    /**
     * Method for validation customer input
     *
     * @param mixed $value
     *
     * @return bool
     * @throws \Zend_Validate_Exception
     */
    public function isValid($value) : bool
    {
        $messages = [];

        $firstname = $value->getFirstname();
        if (!\Zend_Validate::is($firstname, NotEmpty::class)) {
            $messages['invalid_firstname'] = __('Firstname field cannot be empty');
        }

        $lastname = $value->getLastname();
        if (!\Zend_Validate::is($lastname, NotEmpty::class)) {
            $messages['invalid_lastname'] = __('Lastname field cannot be empty');
        }

        $age = (int) $value->getAge();
        if (!is_numeric($age) || ($age === 0)) {
            $messages['invalid_age'] = $age === 0 ? __('Customer age cannot be 0') : __('Customer age must be a number');
        }

        $feedbackTitle = $value->getTitle();
        if (!\Zend_Validate::is($feedbackTitle, NotEmpty::class)) {
            $messages['invalid_feedback_title'] = __('Feedback title cannot be empty');
        }

        $this->_addMessages($messages);

        return empty($messages);
    }
}
