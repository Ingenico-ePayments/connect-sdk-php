<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class EInvoicePaymentMethodSpecificInput extends AbstractEInvoicePaymentMethodSpecificInput
{
    /**
     * @var bool
     */
    public $acceptedTermsAndConditions = null;

    /**
     * @var EInvoicePaymentProduct9000SpecificInput
     */
    public $paymentProduct9000SpecificInput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->acceptedTermsAndConditions)) {
            $object->acceptedTermsAndConditions = $this->acceptedTermsAndConditions;
        }
        if (!is_null($this->paymentProduct9000SpecificInput)) {
            $object->paymentProduct9000SpecificInput = $this->paymentProduct9000SpecificInput->toObject();
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
        if (property_exists($object, 'acceptedTermsAndConditions')) {
            $this->acceptedTermsAndConditions = $object->acceptedTermsAndConditions;
        }
        if (property_exists($object, 'paymentProduct9000SpecificInput')) {
            if (!is_object($object->paymentProduct9000SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct9000SpecificInput, true) . '\' is not an object');
            }
            $value = new EInvoicePaymentProduct9000SpecificInput();
            $this->paymentProduct9000SpecificInput = $value->fromObject($object->paymentProduct9000SpecificInput);
        }
        return $this;
    }
}
