<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\FraudResults;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class EInvoicePaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var FraudResults
     */
    public $fraudResults = null;

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
        if (!is_null($this->fraudResults)) {
            $object->fraudResults = $this->fraudResults->toObject();
        }
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
        if (property_exists($object, 'fraudResults')) {
            if (!is_object($object->fraudResults)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudResults, true) . '\' is not an object');
            }
            $value = new FraudResults();
            $this->fraudResults = $value->fromObject($object->fraudResults);
        }
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
