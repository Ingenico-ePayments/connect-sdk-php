<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class CustomerBase extends DataObject
{
    /**
     * @var CompanyInformation
     */
    public $companyInformation = null;

    /**
     * @var string
     */
    public $merchantCustomerId = null;

    /**
     * @var string
     * @deprecated Use companyInformation.vatNumber instead
     */
    public $vatNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->companyInformation)) {
            $object->companyInformation = $this->companyInformation->toObject();
        }
        if (!is_null($this->merchantCustomerId)) {
            $object->merchantCustomerId = $this->merchantCustomerId;
        }
        if (!is_null($this->vatNumber)) {
            $object->vatNumber = $this->vatNumber;
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
        if (property_exists($object, 'companyInformation')) {
            if (!is_object($object->companyInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->companyInformation, true) . '\' is not an object');
            }
            $value = new CompanyInformation();
            $this->companyInformation = $value->fromObject($object->companyInformation);
        }
        if (property_exists($object, 'merchantCustomerId')) {
            $this->merchantCustomerId = $object->merchantCustomerId;
        }
        if (property_exists($object, 'vatNumber')) {
            $this->vatNumber = $object->vatNumber;
        }
        return $this;
    }
}
