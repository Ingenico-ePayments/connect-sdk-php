<?php
namespace GCS\HostedCheckout\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\KeyValuePair;

/**
 * Class DisplayedData
 *
 * @package GCS\HostedCheckout\Definitions
 */
class DisplayedData extends DataObject
{
    /**
     * @var string
     */
    public $displayedDataType = null;

    /**
     * @var string
     */
    public $renderingData = null;

    /**
     * @var KeyValuePair[]
     */
    public $showData = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'displayedDataType')) {
            $this->displayedDataType = $object->displayedDataType;
        }
        if (property_exists($object, 'renderingData')) {
            $this->renderingData = $object->renderingData;
        }
        if (property_exists($object, 'showData')) {
            if (!is_array($object->showData) && !is_object($object->showData)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->showData, true) . '\' is not an array or object'
                );
            }
            $this->showData = [];
            foreach ($object->showData as $showDataElementObject) {
                $showDataElement = new KeyValuePair();
                $this->showData[] = $showDataElement->fromObject($showDataElementObject);
            }
        }
        return $this;
    }
}
