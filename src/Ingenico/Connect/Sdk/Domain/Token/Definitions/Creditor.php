<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class Creditor
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Creditor Creditor
 */
class Creditor extends DataObject
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
    public $houseNumber = null;

    /**
     * @var string
     */
    public $iban = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $name = null;

    /**
     * @var string
     */
    public $referenceParty = null;

    /**
     * @var string
     */
    public $referencePartyId = null;

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
        if (property_exists($object, 'additionalAddressInfo')) {
            $this->additionalAddressInfo = $object->additionalAddressInfo;
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
        if (property_exists($object, 'iban')) {
            $this->iban = $object->iban;
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'name')) {
            $this->name = $object->name;
        }
        if (property_exists($object, 'referenceParty')) {
            $this->referenceParty = $object->referenceParty;
        }
        if (property_exists($object, 'referencePartyId')) {
            $this->referencePartyId = $object->referencePartyId;
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
