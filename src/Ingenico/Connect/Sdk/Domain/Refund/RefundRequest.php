<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\BankRefundMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundCustomer;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundReferences;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Refund
 */
class RefundRequest extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var BankRefundMethodSpecificInput
     */
    public $bankRefundMethodSpecificInput = null;

    /**
     * @var RefundCustomer
     */
    public $customer = null;

    /**
     * @var string
     */
    public $refundDate = null;

    /**
     * @var RefundReferences
     */
    public $refundReferences = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amountOfMoney)) {
            $object->amountOfMoney = $this->amountOfMoney->toObject();
        }
        if (!is_null($this->bankRefundMethodSpecificInput)) {
            $object->bankRefundMethodSpecificInput = $this->bankRefundMethodSpecificInput->toObject();
        }
        if (!is_null($this->customer)) {
            $object->customer = $this->customer->toObject();
        }
        if (!is_null($this->refundDate)) {
            $object->refundDate = $this->refundDate;
        }
        if (!is_null($this->refundReferences)) {
            $object->refundReferences = $this->refundReferences->toObject();
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
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'bankRefundMethodSpecificInput')) {
            if (!is_object($object->bankRefundMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankRefundMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new BankRefundMethodSpecificInput();
            $this->bankRefundMethodSpecificInput = $value->fromObject($object->bankRefundMethodSpecificInput);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new RefundCustomer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'refundDate')) {
            $this->refundDate = $object->refundDate;
        }
        if (property_exists($object, 'refundReferences')) {
            if (!is_object($object->refundReferences)) {
                throw new UnexpectedValueException('value \'' . print_r($object->refundReferences, true) . '\' is not an object');
            }
            $value = new RefundReferences();
            $this->refundReferences = $value->fromObject($object->refundReferences);
        }
        return $this;
    }
}
