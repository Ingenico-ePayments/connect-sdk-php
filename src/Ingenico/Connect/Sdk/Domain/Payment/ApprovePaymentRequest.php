<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderApprovePayment;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment
 */
class ApprovePaymentRequest extends DataObject
{
    /**
     * @var int
     */
    public $amount = null;

    /**
     * @var ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput
     */
    public $directDebitPaymentMethodSpecificInput = null;

    /**
     * @var OrderApprovePayment
     */
    public $order = null;

    /**
     * @var ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput
     */
    public $sepaDirectDebitPaymentMethodSpecificInput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amount)) {
            $object->amount = $this->amount;
        }
        if (!is_null($this->directDebitPaymentMethodSpecificInput)) {
            $object->directDebitPaymentMethodSpecificInput = $this->directDebitPaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->order)) {
            $object->order = $this->order->toObject();
        }
        if (!is_null($this->sepaDirectDebitPaymentMethodSpecificInput)) {
            $object->sepaDirectDebitPaymentMethodSpecificInput = $this->sepaDirectDebitPaymentMethodSpecificInput->toObject();
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
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->directDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput();
            $this->directDebitPaymentMethodSpecificInput = $value->fromObject($object->directDebitPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new OrderApprovePayment();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput();
            $this->sepaDirectDebitPaymentMethodSpecificInput = $value->fromObject($object->sepaDirectDebitPaymentMethodSpecificInput);
        }
        return $this;
    }
}
