<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Mandates\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Mandates\Definitions
 */
class CreateMandateBase extends DataObject
{
    /**
     * @var string
     */
    public $alias = null;

    /**
     * @var MandateCustomer
     */
    public $customer = null;

    /**
     * @var string
     */
    public $customerReference = null;

    /**
     * @var string
     */
    public $language = null;

    /**
     * @var string
     */
    public $recurrenceType = null;

    /**
     * @var string
     */
    public $signatureType = null;

    /**
     * @var string
     */
    public $uniqueMandateReference = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->alias)) {
            $object->alias = $this->alias;
        }
        if (!is_null($this->customer)) {
            $object->customer = $this->customer->toObject();
        }
        if (!is_null($this->customerReference)) {
            $object->customerReference = $this->customerReference;
        }
        if (!is_null($this->language)) {
            $object->language = $this->language;
        }
        if (!is_null($this->recurrenceType)) {
            $object->recurrenceType = $this->recurrenceType;
        }
        if (!is_null($this->signatureType)) {
            $object->signatureType = $this->signatureType;
        }
        if (!is_null($this->uniqueMandateReference)) {
            $object->uniqueMandateReference = $this->uniqueMandateReference;
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
        if (property_exists($object, 'alias')) {
            $this->alias = $object->alias;
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new MandateCustomer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'customerReference')) {
            $this->customerReference = $object->customerReference;
        }
        if (property_exists($object, 'language')) {
            $this->language = $object->language;
        }
        if (property_exists($object, 'recurrenceType')) {
            $this->recurrenceType = $object->recurrenceType;
        }
        if (property_exists($object, 'signatureType')) {
            $this->signatureType = $object->signatureType;
        }
        if (property_exists($object, 'uniqueMandateReference')) {
            $this->uniqueMandateReference = $object->uniqueMandateReference;
        }
        return $this;
    }
}
