<?php
/**
 * StatusOptions Model for replacing integer feedback  statuses to their string representation
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Model;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class StatusOptions
 *
 * @package SportStore\CustomerFeedback\Model
 */
class StatusOptions implements OptionSourceInterface
{
    /**#@+
     * String feedbacks statuses
     */
    const NOT_ANSWERED_TITLE = 'Not answered';
    const ANSWERED_TITLE = 'Answered';

    /**#@+
     *Integer feedbacks statuses
     */
    const NOT_ANSWERED = 9;
    const ANSWERED = 7;

    /**
     * Return array with integer status and string analog
     *
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => self::NOT_ANSWERED, 'label' => __(self::NOT_ANSWERED_TITLE)],
            ['value' => self::ANSWERED, 'label' => __(self::ANSWERED_TITLE)]
        ];
    }
}
