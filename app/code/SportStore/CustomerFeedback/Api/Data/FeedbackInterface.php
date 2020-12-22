<?php
/**
 *Interface for Feedback Model
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Api\Data;

/**
 * Interface FeedbackInterface
 *
 * @package SportStore\CustomerFeedback\Api\Data
 */
interface FeedbackInterface
{
    /**#@+
    *Constants that define fields for customers_feedbacks table
    */
    const ID = 'feedback_id';
    const FIRSTNAME = 'firstname';
    const LASTNAME = 'lastname';
    const AGE = 'age';
    const EMAIL = 'email';
    const TITLE = 'title';
    const MESSAGE = 'message';
    const STATUS = 'status';
    const ANSWER = 'answer';

    /**
     * Method for getting primary key from field feedback_id
     *
     * @return int
     */
    public function getFeedbackId() : ?int;

    /**
     *Get customer first name method
     *
     * @return string
     */
    public function getFirstname() : string;

    /**
     * Get customer last name method
     *
     * @return string
     */
    public function getLastname() : string;

    /**
     *Get customer age method
     *
     * @return int
     */
    public function getAge() : int;

    /**
     * Get customer email method
     *
     * @return string
     */
    public function getEmail() : string;

    /**
     * Get title of customer feedback
     *
     * @return string
     */

    public function getTitle() : string;

    /**
     * Get customer feedback message
     *
     * @return string
     */
    public function getMessage() : string;

    /**
     * Get status of customer feedback
     *
     * @return int
     */
    public function getStatus() : int;

    /**
     * Get answer from admin to customer feedback
     *
     * @return string
     */
    public function getAnswer() : ?string;

    /**
     * Setting customer first name
     *
     * @param string $firstname
     *
     * @return $this
     */
    public function setFirstname(string $firstname) : self;

    /**
     * Setting customer last name
     *
     * @param string $lastname
     *
     * @return $this
     */
    public function setLastname(string $lastname) : self;

    /**
     * Setting customer age
     *
     * @param int $age
     *
     * @return $this
     */
    public function setAge(int $age) : self;

    /**
     * Setting customer email
     *
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email) : self;

    /**
     * Setting title of customer feedback
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title) : self;

    /**
     * Setting customer feedback message
     *
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message) : self;

    /**
     * Setting status of customer feedback - 9 (not answered) by default in db_schema
     *
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status) : self;

    /**
     * Setting answer to customer feedback
     *
     * @param string $answer
     *
     * @return $this
     */
    public function setAnswer(string $answer) : self;
}
