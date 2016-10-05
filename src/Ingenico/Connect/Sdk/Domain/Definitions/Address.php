<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class Address
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Address Address
 */
class Address extends DataObject
{
    /**
     * @var string
     */
    public $additionalInfo = null;

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
    public $zip = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalInfo')) {
            $this->additionalInfo = $object->additionalInfo;
        }
        if (property_exists($object, 'city')) {
            $this->city = $object->city;
        }
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
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
        if (property_exists($object, 'zip')) {
            $this->zip = $object->zip;
        }
        return $this;
    }
}
