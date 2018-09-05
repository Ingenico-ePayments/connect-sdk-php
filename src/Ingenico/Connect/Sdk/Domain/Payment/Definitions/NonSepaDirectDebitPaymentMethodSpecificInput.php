<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractPaymentMethodSpecificInput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class NonSepaDirectDebitPaymentMethodSpecificInput extends AbstractPaymentMethodSpecificInput
{
    /**
     * @var string
     */
    public $dateCollect = null;

    /**
     * @var string
     */
    public $directDebitText = null;

    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var NonSepaDirectDebitPaymentProduct705SpecificInput
     */
    public $paymentProduct705SpecificInput = null;

    /**
     * @var NonSepaDirectDebitPaymentProduct730SpecificInput
     */
    public $paymentProduct730SpecificInput = null;

    /**
     * @var string
     */
    public $recurringPaymentSequenceIndicator = null;

    /**
     * @var string
     */
    public $token = null;

    /**
     * @var bool
     */
    public $tokenize = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'dateCollect')) {
            $this->dateCollect = $object->dateCollect;
        }
        if (property_exists($object, 'directDebitText')) {
            $this->directDebitText = $object->directDebitText;
        }
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'paymentProduct705SpecificInput')) {
            if (!is_object($object->paymentProduct705SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct705SpecificInput, true) . '\' is not an object');
            }
            $value = new NonSepaDirectDebitPaymentProduct705SpecificInput();
            $this->paymentProduct705SpecificInput = $value->fromObject($object->paymentProduct705SpecificInput);
        }
        if (property_exists($object, 'paymentProduct730SpecificInput')) {
            if (!is_object($object->paymentProduct730SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct730SpecificInput, true) . '\' is not an object');
            }
            $value = new NonSepaDirectDebitPaymentProduct730SpecificInput();
            $this->paymentProduct730SpecificInput = $value->fromObject($object->paymentProduct730SpecificInput);
        }
        if (property_exists($object, 'recurringPaymentSequenceIndicator')) {
            $this->recurringPaymentSequenceIndicator = $object->recurringPaymentSequenceIndicator;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        if (property_exists($object, 'tokenize')) {
            $this->tokenize = $object->tokenize;
        }
        return $this;
    }
}
