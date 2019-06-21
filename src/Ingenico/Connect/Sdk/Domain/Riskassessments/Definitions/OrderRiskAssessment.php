<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AdditionalOrderInputAirlineData;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 */
class OrderRiskAssessment extends DataObject
{
    /**
     * @var AdditionalOrderInputAirlineData
     */
    public $additionalInput = null;

    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var CustomerRiskAssessment
     */
    public $customer = null;

    /**
     * @var ShippingRiskAssessment
     */
    public $shipping = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->additionalInput)) {
            $object->additionalInput = $this->additionalInput->toObject();
        }
        if (!is_null($this->amountOfMoney)) {
            $object->amountOfMoney = $this->amountOfMoney->toObject();
        }
        if (!is_null($this->customer)) {
            $object->customer = $this->customer->toObject();
        }
        if (!is_null($this->shipping)) {
            $object->shipping = $this->shipping->toObject();
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
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new CustomerRiskAssessment();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'shipping')) {
            if (!is_object($object->shipping)) {
                throw new UnexpectedValueException('value \'' . print_r($object->shipping, true) . '\' is not an object');
            }
            $value = new ShippingRiskAssessment();
            $this->shipping = $value->fromObject($object->shipping);
        }
        return $this;
    }
}
