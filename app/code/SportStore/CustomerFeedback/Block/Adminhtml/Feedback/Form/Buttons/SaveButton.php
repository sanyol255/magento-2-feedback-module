<?php
/**
 *Button for save action
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Block\Adminhtml\Feedback\Form\Buttons;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * @package SportStore\CustomerFeedback\Block\Adminhtml\Feedback\Form\Buttons
 */
class SaveButton implements ButtonProviderInterface
{

    /**
     * Returning save button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Feedback'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 50,
        ];
    }
}
