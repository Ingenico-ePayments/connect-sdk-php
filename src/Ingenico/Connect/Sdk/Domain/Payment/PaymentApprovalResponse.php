<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ApprovePaymentCardPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ApprovePaymentMobilePaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment
 */
class PaymentApprovalResponse extends DataObject
{
    /**
     * @var ApprovePaymentCardPaymentMethodSpecificOutput
     */
    public $cardPaymentMethodSpecificOutput = null;

    /**
     * @var ApprovePaymentMobilePaymentMethodSpecificOutput
     */
    public $mobilePaymentMethodSpecificOutput = null;

    /**
     * @var Payment
     */
    public $payment = null;

    /**
     * @var ApprovePaymentCardPaymentMethodSpecificOutput
     * @deprecated Use cardPaymentMethodSpecificOutput instead
     */
    public $paymentMethodSpecificOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->cardPaymentMethodSpecificOutput)) {
            $object->cardPaymentMethodSpecificOutput = $this->cardPaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->mobilePaymentMethodSpecificOutput)) {
            $object->mobilePaymentMethodSpecificOutput = $this->mobilePaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->payment)) {
            $object->payment = $this->payment->toObject();
        }
        if (!is_null($this->paymentMethodSpecificOutput)) {
            $object->paymentMethodSpecificOutput = $this->paymentMethodSpecificOutput->toObject();
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
        if (property_exists($object, 'cardPaymentMethodSpecificOutput')) {
            if (!is_object($object->cardPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new ApprovePaymentCardPaymentMethodSpecificOutput();
            $this->cardPaymentMethodSpecificOutput = $value->fromObject($object->cardPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'mobilePaymentMethodSpecificOutput')) {
            if (!is_object($object->mobilePaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mobilePaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new ApprovePaymentMobilePaymentMethodSpecificOutput();
            $this->mobilePaymentMethodSpecificOutput = $value->fromObject($object->mobilePaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        if (property_exists($object, 'paymentMethodSpecificOutput')) {
            if (!is_object($object->paymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new ApprovePaymentCardPaymentMethodSpecificOutput();
            $this->paymentMethodSpecificOutput = $value->fromObject($object->paymentMethodSpecificOutput);
        }
        return $this;
    }
}
