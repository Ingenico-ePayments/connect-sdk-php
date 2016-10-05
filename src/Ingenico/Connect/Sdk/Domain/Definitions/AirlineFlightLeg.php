<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class AirlineFlightLeg
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_AirlineFlightLeg AirlineFlightLeg
 */
class AirlineFlightLeg extends DataObject
{
    /**
     * @var string
     */
    public $airlineClass = null;

    /**
     * @var string
     */
    public $arrivalAirport = null;

    /**
     * @var string
     */
    public $carrierCode = null;

    /**
     * @var string
     */
    public $date = null;

    /**
     * @var string
     */
    public $departureTime = null;

    /**
     * @var string
     */
    public $fare = null;

    /**
     * @var string
     */
    public $fareBasis = null;

    /**
     * @var string
     */
    public $flightNumber = null;

    /**
     * @var int
     */
    public $number = null;

    /**
     * @var string
     */
    public $originAirport = null;

    /**
     * @var string
     */
    public $stopoverCode = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'airlineClass')) {
            $this->airlineClass = $object->airlineClass;
        }
        if (property_exists($object, 'arrivalAirport')) {
            $this->arrivalAirport = $object->arrivalAirport;
        }
        if (property_exists($object, 'carrierCode')) {
            $this->carrierCode = $object->carrierCode;
        }
        if (property_exists($object, 'date')) {
            $this->date = $object->date;
        }
        if (property_exists($object, 'departureTime')) {
            $this->departureTime = $object->departureTime;
        }
        if (property_exists($object, 'fare')) {
            $this->fare = $object->fare;
        }
        if (property_exists($object, 'fareBasis')) {
            $this->fareBasis = $object->fareBasis;
        }
        if (property_exists($object, 'flightNumber')) {
            $this->flightNumber = $object->flightNumber;
        }
        if (property_exists($object, 'number')) {
            $this->number = $object->number;
        }
        if (property_exists($object, 'originAirport')) {
            $this->originAirport = $object->originAirport;
        }
        if (property_exists($object, 'stopoverCode')) {
            $this->stopoverCode = $object->stopoverCode;
        }
        return $this;
    }
}
