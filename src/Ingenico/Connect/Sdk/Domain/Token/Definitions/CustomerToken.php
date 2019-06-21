<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\CustomerBase;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class CustomerToken extends CustomerBase
{
    /**
     * @var Address
     */
    public $billingAddress = null;

    /**
     * @var PersonalInformationToken
     */
    public $personalInformation = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->billingAddress)) {
            $object->billingAddress = $this->billingAddress->toObject();
        }
        if (!is_null($this->personalInformation)) {
            $object->personalInformation = $this->personalInformation->toObject();
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
        if (property_exists($object, 'billingAddress')) {
            if (!is_object($object->billingAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->billingAddress, true) . '\' is not an object');
            }
            $value = new Address();
            $this->billingAddress = $value->fromObject($object->billingAddress);
        }
        if (property_exists($object, 'personalInformation')) {
            if (!is_object($object->personalInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->personalInformation, true) . '\' is not an object');
            }
            $value = new PersonalInformationToken();
            $this->personalInformation = $value->fromObject($object->personalInformation);
        }
        return $this;
    }
}
