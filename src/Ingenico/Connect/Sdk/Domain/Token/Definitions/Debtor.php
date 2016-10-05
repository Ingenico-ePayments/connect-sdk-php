<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class Debtor
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Debtor Debtor
 */
class Debtor extends DataObject
{
    /**
     * @var string
     */
    public $additionalAddressInfo = null;

    /**
     * @var string
     */
    public $city = null;

    /**
     * @var string
     */
    public $countryCode = null;

    /**
     * @var string
     */
    public $firstName = null;

    /**
     * @var string
     */
    public $houseNumber = null;

    /**
     * @var string
     */
    public $state = null;

    /**
     * @var string
     */
    public $stateCode = null;

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
    public $surnamePrefix = null;

    /**
     * @var string
     */
    public $zip = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalAddressInfo')) {
            $this->additionalAddressInfo = $object->additionalAddressInfo;
        }
        if (property_exists($object, 'city')) {
            $this->city = $object->city;
        }
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
        }
        if (property_exists($object, 'firstName')) {
            $this->firstName = $object->firstName;
        }
        if (property_exists($object, 'houseNumber')) {
            $this->houseNumber = $object->houseNumber;
        }
        if (property_exists($object, 'state')) {
            $this->state = $object->state;
        }
        if (property_exists($object, 'stateCode')) {
            $this->stateCode = $object->stateCode;
        }
        if (property_exists($object, 'street')) {
            $this->street = $object->street;
        }
        if (property_exists($object, 'surname')) {
            $this->surname = $object->surname;
        }
        if (property_exists($object, 'surnamePrefix')) {
            $this->surnamePrefix = $object->surnamePrefix;
        }
        if (property_exists($object, 'zip')) {
            $this->zip = $object->zip;
        }
        return $this;
    }
}
