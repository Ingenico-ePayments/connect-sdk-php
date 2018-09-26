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
    public $arrivalTime = null;

    /**
     * @var string
     */
    public $carrierCode = null;

    /**
     * @var string
     */
    public $conjunctionTicket = null;

    /**
     * @var string
     */
    public $couponNumber = null;

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
    public $endorsementOrRestriction = null;

    /**
     * @var string
     */
    public $exchangeTicket = null;

    /**
     * @var string
     */
    public $fare = null;

    /**
     * @var string
     */
    public $fareBasis = null;

    /**
     * @var int
     */
    public $fee = null;

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
    public $passengerClass = null;

    /**
     * @var string
     * @deprecated Use passengerClass instead
     */
    public $serviceClass = null;

    /**
     * @var string
     */
    public $stopoverCode = null;

    /**
     * @var int
     */
    public $taxes = null;

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
        if (property_exists($object, 'arrivalTime')) {
            $this->arrivalTime = $object->arrivalTime;
        }
        if (property_exists($object, 'carrierCode')) {
            $this->carrierCode = $object->carrierCode;
        }
        if (property_exists($object, 'conjunctionTicket')) {
            $this->conjunctionTicket = $object->conjunctionTicket;
        }
        if (property_exists($object, 'couponNumber')) {
            $this->couponNumber = $object->couponNumber;
        }
        if (property_exists($object, 'date')) {
            $this->date = $object->date;
        }
        if (property_exists($object, 'departureTime')) {
            $this->departureTime = $object->departureTime;
        }
        if (property_exists($object, 'endorsementOrRestriction')) {
            $this->endorsementOrRestriction = $object->endorsementOrRestriction;
        }
        if (property_exists($object, 'exchangeTicket')) {
            $this->exchangeTicket = $object->exchangeTicket;
        }
        if (property_exists($object, 'fare')) {
            $this->fare = $object->fare;
        }
        if (property_exists($object, 'fareBasis')) {
            $this->fareBasis = $object->fareBasis;
        }
        if (property_exists($object, 'fee')) {
            $this->fee = $object->fee;
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
        if (property_exists($object, 'passengerClass')) {
            $this->passengerClass = $object->passengerClass;
        }
        if (property_exists($object, 'serviceClass')) {
            $this->serviceClass = $object->serviceClass;
        }
        if (property_exists($object, 'stopoverCode')) {
            $this->stopoverCode = $object->stopoverCode;
        }
        if (property_exists($object, 'taxes')) {
            $this->taxes = $object->taxes;
        }
        return $this;
    }
}
