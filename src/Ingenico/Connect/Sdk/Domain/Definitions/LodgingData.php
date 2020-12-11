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
class LodgingData extends DataObject
{
    /**
     * @var LodgingCharge[]
     */
    public $charges = null;

    /**
     * @var string
     */
    public $checkInDate = null;

    /**
     * @var string
     */
    public $checkOutDate = null;

    /**
     * @var string
     */
    public $folioNumber = null;

    /**
     * @var bool
     */
    public $isConfirmedReservation = null;

    /**
     * @var bool
     */
    public $isFacilityFireSafetyConform = null;

    /**
     * @var bool
     */
    public $isNoShow = null;

    /**
     * @var bool
     */
    public $isPreferenceSmokingRoom = null;

    /**
     * @var int
     */
    public $numberOfAdults = null;

    /**
     * @var int
     */
    public $numberOfNights = null;

    /**
     * @var int
     */
    public $numberOfRooms = null;

    /**
     * @var string
     */
    public $programCode = null;

    /**
     * @var string
     */
    public $propertyCustomerServicePhoneNumber = null;

    /**
     * @var string
     */
    public $propertyPhoneNumber = null;

    /**
     * @var string
     */
    public $renterName = null;

    /**
     * @var LodgingRoom[]
     */
    public $rooms = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->charges)) {
            $object->charges = [];
            foreach ($this->charges as $element) {
                if (!is_null($element)) {
                    $object->charges[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->checkInDate)) {
            $object->checkInDate = $this->checkInDate;
        }
        if (!is_null($this->checkOutDate)) {
            $object->checkOutDate = $this->checkOutDate;
        }
        if (!is_null($this->folioNumber)) {
            $object->folioNumber = $this->folioNumber;
        }
        if (!is_null($this->isConfirmedReservation)) {
            $object->isConfirmedReservation = $this->isConfirmedReservation;
        }
        if (!is_null($this->isFacilityFireSafetyConform)) {
            $object->isFacilityFireSafetyConform = $this->isFacilityFireSafetyConform;
        }
        if (!is_null($this->isNoShow)) {
            $object->isNoShow = $this->isNoShow;
        }
        if (!is_null($this->isPreferenceSmokingRoom)) {
            $object->isPreferenceSmokingRoom = $this->isPreferenceSmokingRoom;
        }
        if (!is_null($this->numberOfAdults)) {
            $object->numberOfAdults = $this->numberOfAdults;
        }
        if (!is_null($this->numberOfNights)) {
            $object->numberOfNights = $this->numberOfNights;
        }
        if (!is_null($this->numberOfRooms)) {
            $object->numberOfRooms = $this->numberOfRooms;
        }
        if (!is_null($this->programCode)) {
            $object->programCode = $this->programCode;
        }
        if (!is_null($this->propertyCustomerServicePhoneNumber)) {
            $object->propertyCustomerServicePhoneNumber = $this->propertyCustomerServicePhoneNumber;
        }
        if (!is_null($this->propertyPhoneNumber)) {
            $object->propertyPhoneNumber = $this->propertyPhoneNumber;
        }
        if (!is_null($this->renterName)) {
            $object->renterName = $this->renterName;
        }
        if (!is_null($this->rooms)) {
            $object->rooms = [];
            foreach ($this->rooms as $element) {
                if (!is_null($element)) {
                    $object->rooms[] = $element->toObject();
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
        if (property_exists($object, 'charges')) {
            if (!is_array($object->charges) && !is_object($object->charges)) {
                throw new UnexpectedValueException('value \'' . print_r($object->charges, true) . '\' is not an array or object');
            }
            $this->charges = [];
            foreach ($object->charges as $element) {
                $value = new LodgingCharge();
                $this->charges[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'checkInDate')) {
            $this->checkInDate = $object->checkInDate;
        }
        if (property_exists($object, 'checkOutDate')) {
            $this->checkOutDate = $object->checkOutDate;
        }
        if (property_exists($object, 'folioNumber')) {
            $this->folioNumber = $object->folioNumber;
        }
        if (property_exists($object, 'isConfirmedReservation')) {
            $this->isConfirmedReservation = $object->isConfirmedReservation;
        }
        if (property_exists($object, 'isFacilityFireSafetyConform')) {
            $this->isFacilityFireSafetyConform = $object->isFacilityFireSafetyConform;
        }
        if (property_exists($object, 'isNoShow')) {
            $this->isNoShow = $object->isNoShow;
        }
        if (property_exists($object, 'isPreferenceSmokingRoom')) {
            $this->isPreferenceSmokingRoom = $object->isPreferenceSmokingRoom;
        }
        if (property_exists($object, 'numberOfAdults')) {
            $this->numberOfAdults = $object->numberOfAdults;
        }
        if (property_exists($object, 'numberOfNights')) {
            $this->numberOfNights = $object->numberOfNights;
        }
        if (property_exists($object, 'numberOfRooms')) {
            $this->numberOfRooms = $object->numberOfRooms;
        }
        if (property_exists($object, 'programCode')) {
            $this->programCode = $object->programCode;
        }
        if (property_exists($object, 'propertyCustomerServicePhoneNumber')) {
            $this->propertyCustomerServicePhoneNumber = $object->propertyCustomerServicePhoneNumber;
        }
        if (property_exists($object, 'propertyPhoneNumber')) {
            $this->propertyPhoneNumber = $object->propertyPhoneNumber;
        }
        if (property_exists($object, 'renterName')) {
            $this->renterName = $object->renterName;
        }
        if (property_exists($object, 'rooms')) {
            if (!is_array($object->rooms) && !is_object($object->rooms)) {
                throw new UnexpectedValueException('value \'' . print_r($object->rooms, true) . '\' is not an array or object');
            }
            $this->rooms = [];
            foreach ($object->rooms as $element) {
                $value = new LodgingRoom();
                $this->rooms[] = $value->fromObject($element);
            }
        }
        return $this;
    }
}
