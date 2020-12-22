<?php
/**
 *Button for delete action
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Block\Adminhtml\Feedback\Form\Buttons;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use SportStore\CustomerFeedback\Api\Data\FeedbackInterface;

/**
 * Class DeleteButton
 *
 * @package SportStore\CustomerFeedback\Block\Adminhtml\Feedback\Form\Buttons
 */
class DeleteButton extends Template implements ButtonProviderInterface
{

    /**
     * Returning delete button data
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
                'label' => __('Delete Feedback'),
                'class' => 'delete',
                'on_click' => 'deleteConfirm(\''
                    . __('Are you sure you want to delete this feedback ?')
                    . '\', \'' . $this->getDeleteUrl() . '\')',
        ];
    }

    /**
     * Composing delete url with path to delete action and current feedback id
     *
     * @return string
     */
    public function getDeleteUrl() : string
    {
        return $this->getUrl('customerfeed/feedback/delete', ['feedback_id' => $this->getRequest()->getParam(FeedbackInterface::ID)]);
    }
}
