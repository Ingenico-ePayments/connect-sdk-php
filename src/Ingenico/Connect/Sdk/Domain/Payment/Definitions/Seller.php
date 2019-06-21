<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class Seller extends DataObject
{
    /**
     * @var Address
     */
    public $address = null;

    /**
     * @var string
     */
    public $channelCode = null;

    /**
     * @var string
     */
    public $description = null;

    /**
     * @var string
     */
    public $geocode = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $invoiceNumber = null;

    /**
     * @var string
     */
    public $mcc = null;

    /**
     * @var string
     */
    public $name = null;

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
        if (!is_null($this->channelCode)) {
            $object->channelCode = $this->channelCode;
        }
        if (!is_null($this->description)) {
            $object->description = $this->description;
        }
        if (!is_null($this->geocode)) {
            $object->geocode = $this->geocode;
        }
        if (!is_null($this->id)) {
            $object->id = $this->id;
        }
        if (!is_null($this->invoiceNumber)) {
            $object->invoiceNumber = $this->invoiceNumber;
        }
        if (!is_null($this->mcc)) {
            $object->mcc = $this->mcc;
        }
        if (!is_null($this->name)) {
            $object->name = $this->name;
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
            $value = new Address();
            $this->address = $value->fromObject($object->address);
        }
        if (property_exists($object, 'channelCode')) {
            $this->channelCode = $object->channelCode;
        }
        if (property_exists($object, 'description')) {
            $this->description = $object->description;
        }
        if (property_exists($object, 'geocode')) {
            $this->geocode = $object->geocode;
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'invoiceNumber')) {
            $this->invoiceNumber = $object->invoiceNumber;
        }
        if (property_exists($object, 'mcc')) {
            $this->mcc = $object->mcc;
        }
        if (property_exists($object, 'name')) {
            $this->name = $object->name;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        return $this;
    }
}
