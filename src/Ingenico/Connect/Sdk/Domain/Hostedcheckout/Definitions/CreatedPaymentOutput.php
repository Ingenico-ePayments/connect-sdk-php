<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PaymentCreationReferences;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 */
class CreatedPaymentOutput extends DataObject
{
    /**
     * @var DisplayedData
     */
    public $displayedData = null;

    /**
     * @var Payment
     */
    public $payment = null;

    /**
     * @var PaymentCreationReferences
     */
    public $paymentCreationReferences = null;

    /**
     * @var string
     * @deprecated Use Payment.statusOutput.statusCategory instead
     */
    public $paymentStatusCategory = null;

    /**
     * @var bool
     */
    public $tokenizationSucceeded = null;

    /**
     * @var string
     */
    public $tokens = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->displayedData)) {
            $object->displayedData = $this->displayedData->toObject();
        }
        if (!is_null($this->payment)) {
            $object->payment = $this->payment->toObject();
        }
        if (!is_null($this->paymentCreationReferences)) {
            $object->paymentCreationReferences = $this->paymentCreationReferences->toObject();
        }
        if (!is_null($this->paymentStatusCategory)) {
            $object->paymentStatusCategory = $this->paymentStatusCategory;
        }
        if (!is_null($this->tokenizationSucceeded)) {
            $object->tokenizationSucceeded = $this->tokenizationSucceeded;
        }
        if (!is_null($this->tokens)) {
            $object->tokens = $this->tokens;
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
        if (property_exists($object, 'displayedData')) {
            if (!is_object($object->displayedData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayedData, true) . '\' is not an object');
            }
            $value = new DisplayedData();
            $this->displayedData = $value->fromObject($object->displayedData);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        if (property_exists($object, 'paymentCreationReferences')) {
            if (!is_object($object->paymentCreationReferences)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentCreationReferences, true) . '\' is not an object');
            }
            $value = new PaymentCreationReferences();
            $this->paymentCreationReferences = $value->fromObject($object->paymentCreationReferences);
        }
        if (property_exists($object, 'paymentStatusCategory')) {
            $this->paymentStatusCategory = $object->paymentStatusCategory;
        }
        if (property_exists($object, 'tokenizationSucceeded')) {
            $this->tokenizationSucceeded = $object->tokenizationSucceeded;
        }
        if (property_exists($object, 'tokens')) {
            $this->tokens = $object->tokens;
        }
        return $this;
    }
}
