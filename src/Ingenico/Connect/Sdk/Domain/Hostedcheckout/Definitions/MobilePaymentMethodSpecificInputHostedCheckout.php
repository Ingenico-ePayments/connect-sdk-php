<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractPaymentMethodSpecificInput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 */
class MobilePaymentMethodSpecificInputHostedCheckout extends AbstractPaymentMethodSpecificInput
{
    /**
     * @var MobilePaymentProduct302SpecificInputHostedCheckout
     */
    public $paymentProduct302SpecificInput = null;

    /**
     * @var MobilePaymentProduct320SpecificInputHostedCheckout
     */
    public $paymentProduct320SpecificInput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProduct302SpecificInput)) {
            $object->paymentProduct302SpecificInput = $this->paymentProduct302SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct320SpecificInput)) {
            $object->paymentProduct320SpecificInput = $this->paymentProduct320SpecificInput->toObject();
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
        if (property_exists($object, 'paymentProduct302SpecificInput')) {
            if (!is_object($object->paymentProduct302SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct302SpecificInput, true) . '\' is not an object');
            }
            $value = new MobilePaymentProduct302SpecificInputHostedCheckout();
            $this->paymentProduct302SpecificInput = $value->fromObject($object->paymentProduct302SpecificInput);
        }
        if (property_exists($object, 'paymentProduct320SpecificInput')) {
            if (!is_object($object->paymentProduct320SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct320SpecificInput, true) . '\' is not an object');
            }
            $value = new MobilePaymentProduct320SpecificInputHostedCheckout();
            $this->paymentProduct320SpecificInput = $value->fromObject($object->paymentProduct320SpecificInput);
        }
        return $this;
    }
}
