<?php
/**
 * ActionsColumn class for feedback_listing
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Ui\Component\Listing\Columns;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class FeedbackActions
 *
 * @package SportStore\CustomerFeedback\Ui\Component\Listing\Columns
 */
class FeedbackActions extends Column
{
    /**
     * UrlBuilder variable
     *
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * FeedbackActions constructor for actionsColumn
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Setting data source for actions column
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource) : array
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getName()] = [
                    'manage' => [
                        'href' => $this->urlBuilder->getUrl(
                            $this->getData('config/manageUrl'),
                            [
                                $this->getData('config/idUrlParam') => $item['feedback_id']
                            ]
                        ),
                        'label' => __('Manage feedback')
                    ],
                    'delete' => [
                        'href' => $this->urlBuilder->getUrl(
                            $this->getData('config/deleteUrl'),
                            [
                                $this->getData('config/idUrlParam') => $item['feedback_id']
                            ]
                        ),
                        'label' => __('Delete Feedback')
                    ],
                ];
            }
        }

        return $dataSource;
    }
}
