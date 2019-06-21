<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product
 */
class GetCustomerDetailsResponse extends DataObject
{
    /**
     * @var string
     */
    public $city = null;

    /**
     * @var string
     */
    public $country = null;

    /**
     * @var string
     */
    public $emailAddress = null;

    /**
     * @var string
     */
    public $firstName = null;

    /**
     * @var string
     */
    public $fiscalNumber = null;

    /**
     * @var string
     */
    public $languageCode = null;

    /**
     * @var string
     */
    public $phoneNumber = null;

    /**
     * @var string
     */
    public $street = null;

    /**
     * @var string
     */
    public $surname = null;

    /**
     * @var string
     */
    public $zip = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->city)) {
            $object->city = $this->city;
        }
        if (!is_null($this->country)) {
            $object->country = $this->country;
        }
        if (!is_null($this->emailAddress)) {
            $object->emailAddress = $this->emailAddress;
        }
        if (!is_null($this->firstName)) {
            $object->firstName = $this->firstName;
        }
        if (!is_null($this->fiscalNumber)) {
            $object->fiscalNumber = $this->fiscalNumber;
        }
        if (!is_null($this->languageCode)) {
            $object->languageCode = $this->languageCode;
        }
        if (!is_null($this->phoneNumber)) {
            $object->phoneNumber = $this->phoneNumber;
        }
        if (!is_null($this->street)) {
            $object->street = $this->street;
        }
        if (!is_null($this->surname)) {
            $object->surname = $this->surname;
        }
        if (!is_null($this->zip)) {
            $object->zip = $this->zip;
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
        if (property_exists($object, 'city')) {
            $this->city = $object->city;
        }
        if (property_exists($object, 'country')) {
            $this->country = $object->country;
        }
        if (property_exists($object, 'emailAddress')) {
            $this->emailAddress = $object->emailAddress;
        }
        if (property_exists($object, 'firstName')) {
            $this->firstName = $object->firstName;
        }
        if (property_exists($object, 'fiscalNumber')) {
            $this->fiscalNumber = $object->fiscalNumber;
        }
        if (property_exists($object, 'languageCode')) {
            $this->languageCode = $object->languageCode;
        }
        if (property_exists($object, 'phoneNumber')) {
            $this->phoneNumber = $object->phoneNumber;
        }
        if (property_exists($object, 'street')) {
            $this->street = $object->street;
        }
        if (property_exists($object, 'surname')) {
            $this->surname = $object->surname;
        }
        if (property_exists($object, 'zip')) {
            $this->zip = $object->zip;
        }
        return $this;
    }
}
