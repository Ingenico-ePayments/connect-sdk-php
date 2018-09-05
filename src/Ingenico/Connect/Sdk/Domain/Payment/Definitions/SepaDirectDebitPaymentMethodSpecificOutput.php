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
class SepaDirectDebitPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
{
    /**
     * @var FraudResults
     */
    public $fraudResults = null;

    /**
     * @var PaymentProduct771SpecificOutput
     */
    public $paymentProduct771SpecificOutput = null;

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
        if (property_exists($object, 'paymentProduct771SpecificOutput')) {
            if (!is_object($object->paymentProduct771SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct771SpecificOutput, true) . '\' is not an object');
            }
            $value = new PaymentProduct771SpecificOutput();
            $this->paymentProduct771SpecificOutput = $value->fromObject($object->paymentProduct771SpecificOutput);
        }
        return $this;
    }
}
