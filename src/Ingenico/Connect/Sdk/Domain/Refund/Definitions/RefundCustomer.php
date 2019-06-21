<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\CompanyInformation;
use Ingenico\Connect\Sdk\Domain\Definitions\ContactDetailsBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AddressPersonal;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Refund\Definitions
 */
class RefundCustomer extends DataObject
{
    /**
     * @var AddressPersonal
     */
    public $address = null;

    /**
     * @var CompanyInformation
     */
    public $companyInformation = null;

    /**
     * @var ContactDetailsBase
     */
    public $contactDetails = null;

    /**
     * @var string
     */
    public $fiscalNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->address)) {
            $object->address = $this->address->toObject();
        }
        if (!is_null($this->companyInformation)) {
            $object->companyInformation = $this->companyInformation->toObject();
        }
        if (!is_null($this->contactDetails)) {
            $object->contactDetails = $this->contactDetails->toObject();
        }
        if (!is_null($this->fiscalNumber)) {
            $object->fiscalNumber = $this->fiscalNumber;
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
        if (property_exists($object, 'companyInformation')) {
            if (!is_object($object->companyInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->companyInformation, true) . '\' is not an object');
            }
            $value = new CompanyInformation();
            $this->companyInformation = $value->fromObject($object->companyInformation);
        }
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->contactDetails, true) . '\' is not an object');
            }
            $value = new ContactDetailsBase();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        if (property_exists($object, 'fiscalNumber')) {
            $this->fiscalNumber = $object->fiscalNumber;
        }
        return $this;
    }
}
