<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectPaymentMethodSpecificInputBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectPaymentProduct809SpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectPaymentProduct816SpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectPaymentProduct882SpecificInput;
use UnexpectedValueException;

/**
 * Class RedirectPaymentMethodSpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RedirectPaymentMethodSpecificInput RedirectPaymentMethodSpecificInput
 */
class RedirectPaymentMethodSpecificInput extends RedirectPaymentMethodSpecificInputBase
{
    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var RedirectPaymentProduct809SpecificInput
     */
    public $paymentProduct809SpecificInput = null;

    /**
     * @var RedirectPaymentProduct816SpecificInput
     */
    public $paymentProduct816SpecificInput = null;

    /**
     * @var RedirectPaymentProduct882SpecificInput
     */
    public $paymentProduct882SpecificInput = null;

    /**
     * @var string
     */
    public $returnUrl = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'paymentProduct809SpecificInput')) {
            if (!is_object($object->paymentProduct809SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct809SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct809SpecificInput();
            $this->paymentProduct809SpecificInput = $value->fromObject($object->paymentProduct809SpecificInput);
        }
        if (property_exists($object, 'paymentProduct816SpecificInput')) {
            if (!is_object($object->paymentProduct816SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct816SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct816SpecificInput();
            $this->paymentProduct816SpecificInput = $value->fromObject($object->paymentProduct816SpecificInput);
        }
        if (property_exists($object, 'paymentProduct882SpecificInput')) {
            if (!is_object($object->paymentProduct882SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct882SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct882SpecificInput();
            $this->paymentProduct882SpecificInput = $value->fromObject($object->paymentProduct882SpecificInput);
        }
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        return $this;
    }
}
