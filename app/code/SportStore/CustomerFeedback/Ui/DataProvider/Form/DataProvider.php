<?php
/**
 * Data Provider for manage feedback form component
 *
 * @category  SportStore
 * @package   SportStore\CustomerFeedback
 * @author    Kovalchuk Oleksandr sanyol255@gmail.com
 * @copyright 2020 Kovalchuk Oleksandr
 */
namespace SportStore\CustomerFeedback\Ui\DataProvider\Form;

use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;
use SportStore\CustomerFeedback\Model\ResourceModel\Feedback\CollectionFactory as FeedbackCollectionFactory;

/**
 * Class DataProvider
 *
 * @package SportStore\CustomerFeedback\Ui\DataProvider\Form
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * Array with form loaded data
     *
     * @var array
     */
    protected $_loadedData = [];

    /**
     * Object with dala collection
     *
     * @var FeedbackCollectionFactory
     */
    protected $feedbackCollectionFactory;

    /**
     * Current request for data collection
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * DataProvider constructor
     *
     * @param $name
     * @param $primaryFieldName
     * @param $requestFieldName
     * @param FeedbackCollectionFactory $feedbackCollectionFactory
     * @param RequestInterface $request
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        FeedbackCollectionFactory $feedbackCollectionFactory,
        RequestInterface $request,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $feedbackCollectionFactory->create();
        $this->request = $request;
    }

    /**
     *Method for getting form collection data
     *
     * @return array
     */
    public function getData() : array
    {
        if (!empty($this->_loadedData)) {
            return $this->_loadedData;
        }

        $this->collection->addFieldToFilter($this->getPrimaryFieldName(), $this->request->getParam($this->getRequestFieldName()));

        foreach ($this->getCollection() as $item) {
            $this->_loadedData[$item->getId()] = $item->getData();
        }

        return $this->_loadedData;
    }
}
