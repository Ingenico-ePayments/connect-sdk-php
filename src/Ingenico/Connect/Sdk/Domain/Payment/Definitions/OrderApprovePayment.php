<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AdditionalOrderInputAirlineData;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class OrderApprovePayment extends DataObject
{
    /**
     * @var AdditionalOrderInputAirlineData
     */
    public $additionalInput = null;

    /**
     * @var CustomerApprovePayment
     */
    public $customer = null;

    /**
     * @var OrderReferencesApprovePayment
     */
    public $references = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->additionalInput)) {
            $object->additionalInput = $this->additionalInput->toObject();
        }
        if (!is_null($this->customer)) {
            $object->customer = $this->customer->toObject();
        }
        if (!is_null($this->references)) {
            $object->references = $this->references->toObject();
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
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->additionalInput, true) . '\' is not an object');
            }
            $value = new AdditionalOrderInputAirlineData();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new CustomerApprovePayment();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new OrderReferencesApprovePayment();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
