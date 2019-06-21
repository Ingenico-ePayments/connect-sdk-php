<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\ContactDetailsBase;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class ContactDetails extends ContactDetailsBase
{
    /**
     * @var string
     */
    public $faxNumber = null;

    /**
     * @var string
     */
    public $mobilePhoneNumber = null;

    /**
     * @var string
     */
    public $phoneNumber = null;

    /**
     * @var string
     */
    public $workPhoneNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->faxNumber)) {
            $object->faxNumber = $this->faxNumber;
        }
        if (!is_null($this->mobilePhoneNumber)) {
            $object->mobilePhoneNumber = $this->mobilePhoneNumber;
        }
        if (!is_null($this->phoneNumber)) {
            $object->phoneNumber = $this->phoneNumber;
        }
        if (!is_null($this->workPhoneNumber)) {
            $object->workPhoneNumber = $this->workPhoneNumber;
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
        if (property_exists($object, 'faxNumber')) {
            $this->faxNumber = $object->faxNumber;
        }
        if (property_exists($object, 'mobilePhoneNumber')) {
            $this->mobilePhoneNumber = $object->mobilePhoneNumber;
        }
        if (property_exists($object, 'phoneNumber')) {
            $this->phoneNumber = $object->phoneNumber;
        }
        if (property_exists($object, 'workPhoneNumber')) {
            $this->workPhoneNumber = $object->workPhoneNumber;
        }
        return $this;
    }
}
