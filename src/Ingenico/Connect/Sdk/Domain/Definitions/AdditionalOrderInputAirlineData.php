<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class AdditionalOrderInputAirlineData extends DataObject
{
    /**
     * @var AirlineData
     */
    public $airlineData = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->airlineData)) {
            $object->airlineData = $this->airlineData->toObject();
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
        if (property_exists($object, 'airlineData')) {
            if (!is_object($object->airlineData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->airlineData, true) . '\' is not an object');
            }
            $value = new AirlineData();
            $this->airlineData = $value->fromObject($object->airlineData);
        }
        return $this;
    }
}
