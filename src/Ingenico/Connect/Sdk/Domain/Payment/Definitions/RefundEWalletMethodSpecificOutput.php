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
class RefundEWalletMethodSpecificOutput extends RefundMethodSpecificOutput
{
    /**
     * @var RefundPaymentProduct840SpecificOutput
     */
    public $paymentProduct840SpecificOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProduct840SpecificOutput)) {
            $object->paymentProduct840SpecificOutput = $this->paymentProduct840SpecificOutput->toObject();
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
        if (property_exists($object, 'paymentProduct840SpecificOutput')) {
            if (!is_object($object->paymentProduct840SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct840SpecificOutput, true) . '\' is not an object');
            }
            $value = new RefundPaymentProduct840SpecificOutput();
            $this->paymentProduct840SpecificOutput = $value->fromObject($object->paymentProduct840SpecificOutput);
        }
        return $this;
    }
}
