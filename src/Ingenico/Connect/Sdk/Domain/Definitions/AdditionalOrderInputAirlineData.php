<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AirlineData;
use UnexpectedValueException;

/**
 * Class AdditionalOrderInputAirlineData
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_AdditionalOrderInputAirlineData AdditionalOrderInputAirlineData
 */
class AdditionalOrderInputAirlineData extends DataObject
{
    /**
     * @var AirlineData
     */
    public $airlineData = null;

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
