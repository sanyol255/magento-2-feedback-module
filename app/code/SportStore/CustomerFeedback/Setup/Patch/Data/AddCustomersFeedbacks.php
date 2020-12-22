<?php
/**
 * Data Patch for adding customers feedbacks
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class AddCustomersFeedbacks
 *
 * @package SportStore\CustomerFeedback\Setup\Patch\Data
 */
class AddCustomersFeedbacks implements DataPatchInterface
{
    /**
     * Variable for managing data patching
     *
     * @var ModuleDataSetupInterface
     */
    protected $feedbacksSetup;

    /**
     * AddCustomersFeedbacks constructor
     *
     * @param ModuleDataSetupInterface $feedbacksSetup
     */
    public function __construct(ModuleDataSetupInterface $feedbacksSetup)
    {
        $this->feedbacksSetup = $feedbacksSetup;
    }

    /**
     * Inserting feedbacks data to customers_feedbacks table
     */
    public function apply()
    {
        $this->feedbacksSetup->startSetup();

        $feedbacks[] = ['firstname' => 'Alexander', 'lastname' => 'Kovalchuk', 'age' => 31, 'email' => 'sanyol255@gmail.com',
            'title' => 'Privat24 payment', 'message' => 'Can  I use Privat24 payments system for purchases in your store?'];
        $feedbacks[] = ['firstname' => 'Jane', 'lastname' => 'Wardford', 'age' => 27, 'email' => 'jany.ward@hotmail.com',
            'title' => 'Christmas discount', 'message' => 'When will your Christmas discount will start?'];
        $feedbacks[] = ['firstname' => 'Steve', 'lastname' => 'Walker', 'age' => 28, 'email' => 'steve27@gmail.com',
            'title' => 'Workout machines', 'message' => 'Do you plan to sell workout machines in the near future?'];
        $feedbacks[] = ['firstname' => 'Randy', 'lastname' => 'Erikson', 'age' => 41, 'email' => 'ranson@yahoo.com',
            'title' => 'Refunding', 'message' => 'How can I refund my purchase?'];

        $this->feedbacksSetup->getConnection()->insertArray(
            $this->feedbacksSetup->getTable('customers_feedbacks'),
            ['firstname', 'lastname', 'age', 'email', 'title', 'message'],
            $feedbacks
        );
        $this->feedbacksSetup->endSetup();
    }

    /**
     * Placeholder for implementing DataPatchInterface
     *
     * @return array
     */
    public function getAliases() : array
    {
        return [];
    }

    /**
     * Placeholder for implementing DataPatchInterface
     *
     * @return array
     */
    public static function getDependencies() : array
    {
        return [];
    }
}
