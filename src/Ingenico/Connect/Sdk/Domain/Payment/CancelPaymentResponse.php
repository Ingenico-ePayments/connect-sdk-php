<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CancelPaymentCardPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CancelPaymentMobilePaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment
 */
class CancelPaymentResponse extends DataObject
{
    /**
     * @var CancelPaymentCardPaymentMethodSpecificOutput
     */
    public $cardPaymentMethodSpecificOutput = null;

    /**
     * @var CancelPaymentMobilePaymentMethodSpecificOutput
     */
    public $mobilePaymentMethodSpecificOutput = null;

    /**
     * @var Payment
     */
    public $payment = null;

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
            $value = new CancelPaymentCardPaymentMethodSpecificOutput();
            $this->cardPaymentMethodSpecificOutput = $value->fromObject($object->cardPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'mobilePaymentMethodSpecificOutput')) {
            if (!is_object($object->mobilePaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mobilePaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new CancelPaymentMobilePaymentMethodSpecificOutput();
            $this->mobilePaymentMethodSpecificOutput = $value->fromObject($object->mobilePaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        return $this;
    }
}
