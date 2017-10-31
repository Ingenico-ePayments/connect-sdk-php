<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\EInvoicePaymentProduct9000SpecificInput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class EInvoicePaymentMethodSpecificInput extends AbstractPaymentMethodSpecificInput
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
     * @var bool
     */
    public $requiresApproval = null;

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
        if (property_exists($object, 'requiresApproval')) {
            $this->requiresApproval = $object->requiresApproval;
        }
        return $this;
    }
}
