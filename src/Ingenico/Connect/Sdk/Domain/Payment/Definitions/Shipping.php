<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class Shipping extends DataObject
{
    /**
     * @var AddressPersonal
     */
    public $address = null;

    /**
     * @var string
     */
    public $addressIndicator = null;

    /**
     * @var string
     */
    public $comments = null;

    /**
     * @var string
     */
    public $emailAddress = null;

    /**
     * @var string
     */
    public $firstUsageDate = null;

    /**
     * @var bool
     */
    public $isFirstUsage = null;

    /**
     * @var string
     */
    public $trackingNumber = null;

    /**
     * @var string
     */
    public $type = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->address)) {
            $object->address = $this->address->toObject();
        }
        if (!is_null($this->addressIndicator)) {
            $object->addressIndicator = $this->addressIndicator;
        }
        if (!is_null($this->comments)) {
            $object->comments = $this->comments;
        }
        if (!is_null($this->emailAddress)) {
            $object->emailAddress = $this->emailAddress;
        }
        if (!is_null($this->firstUsageDate)) {
            $object->firstUsageDate = $this->firstUsageDate;
        }
        if (!is_null($this->isFirstUsage)) {
            $object->isFirstUsage = $this->isFirstUsage;
        }
        if (!is_null($this->trackingNumber)) {
            $object->trackingNumber = $this->trackingNumber;
        }
        if (!is_null($this->type)) {
            $object->type = $this->type;
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
        if (property_exists($object, 'address')) {
            if (!is_object($object->address)) {
                throw new UnexpectedValueException('value \'' . print_r($object->address, true) . '\' is not an object');
            }
            $value = new AddressPersonal();
            $this->address = $value->fromObject($object->address);
        }
        if (property_exists($object, 'addressIndicator')) {
            $this->addressIndicator = $object->addressIndicator;
        }
        if (property_exists($object, 'comments')) {
            $this->comments = $object->comments;
        }
        if (property_exists($object, 'emailAddress')) {
            $this->emailAddress = $object->emailAddress;
        }
        if (property_exists($object, 'firstUsageDate')) {
            $this->firstUsageDate = $object->firstUsageDate;
        }
        if (property_exists($object, 'isFirstUsage')) {
            $this->isFirstUsage = $object->isFirstUsage;
        }
        if (property_exists($object, 'trackingNumber')) {
            $this->trackingNumber = $object->trackingNumber;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        return $this;
    }
}
