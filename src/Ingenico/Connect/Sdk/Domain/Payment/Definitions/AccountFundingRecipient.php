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
class AccountFundingRecipient extends DataObject
{
    /**
     * @var string
     */
    public $accountNumber = null;

    /**
     * @var string
     */
    public $accountNumberType = null;

    /**
     * @var Address
     */
    public $address = null;

    /**
     * @var string
     */
    public $dateOfBirth = null;

    /**
     * @var AfrName
     */
    public $name = null;

    /**
     * @var string
     */
    public $partialPan = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->accountNumber)) {
            $object->accountNumber = $this->accountNumber;
        }
        if (!is_null($this->accountNumberType)) {
            $object->accountNumberType = $this->accountNumberType;
        }
        if (!is_null($this->address)) {
            $object->address = $this->address->toObject();
        }
        if (!is_null($this->dateOfBirth)) {
            $object->dateOfBirth = $this->dateOfBirth;
        }
        if (!is_null($this->name)) {
            $object->name = $this->name->toObject();
        }
        if (!is_null($this->partialPan)) {
            $object->partialPan = $this->partialPan;
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
        if (property_exists($object, 'accountNumber')) {
            $this->accountNumber = $object->accountNumber;
        }
        if (property_exists($object, 'accountNumberType')) {
            $this->accountNumberType = $object->accountNumberType;
        }
        if (property_exists($object, 'address')) {
            if (!is_object($object->address)) {
                throw new UnexpectedValueException('value \'' . print_r($object->address, true) . '\' is not an object');
            }
            $value = new Address();
            $this->address = $value->fromObject($object->address);
        }
        if (property_exists($object, 'dateOfBirth')) {
            $this->dateOfBirth = $object->dateOfBirth;
        }
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new UnexpectedValueException('value \'' . print_r($object->name, true) . '\' is not an object');
            }
            $value = new AfrName();
            $this->name = $value->fromObject($object->name);
        }
        if (property_exists($object, 'partialPan')) {
            $this->partialPan = $object->partialPan;
        }
        return $this;
    }
}
