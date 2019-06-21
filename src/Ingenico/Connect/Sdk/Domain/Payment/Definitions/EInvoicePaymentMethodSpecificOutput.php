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
class EInvoicePaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var EInvoicePaymentProduct9000SpecificOutput
     */
    public $paymentProduct9000SpecificOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProduct9000SpecificOutput)) {
            $object->paymentProduct9000SpecificOutput = $this->paymentProduct9000SpecificOutput->toObject();
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
        if (property_exists($object, 'paymentProduct9000SpecificOutput')) {
            if (!is_object($object->paymentProduct9000SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct9000SpecificOutput, true) . '\' is not an object');
            }
            $value = new EInvoicePaymentProduct9000SpecificOutput();
            $this->paymentProduct9000SpecificOutput = $value->fromObject($object->paymentProduct9000SpecificOutput);
        }
        return $this;
    }
}
