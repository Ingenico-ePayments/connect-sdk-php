<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\KeyValuePair;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->displayedDataType)) {
            $object->displayedDataType = $this->displayedDataType;
        }
        if (!is_null($this->renderingData)) {
            $object->renderingData = $this->renderingData;
        }
        if (!is_null($this->showData)) {
            $object->showData = [];
            foreach ($this->showData as $element) {
                if (!is_null($element)) {
                    $object->showData[] = $element->toObject();
                }
            }
        }
        return $object;
    }

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
            foreach ($object->showData as $element) {
                $value = new KeyValuePair();
                $this->showData[] = $value->fromObject($element);
            }
        }
        return $this;
    }
}
