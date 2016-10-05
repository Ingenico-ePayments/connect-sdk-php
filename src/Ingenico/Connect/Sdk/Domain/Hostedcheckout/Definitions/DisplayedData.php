<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\KeyValuePair;
use UnexpectedValueException;

/**
 * Class DisplayedData
 *
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_DisplayedData DisplayedData
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
     * @return $this
     * @throws UnexpectedValueException
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
                throw new UnexpectedValueException('value \'' . print_r($object->showData, true) . '\' is not an array or object');
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
