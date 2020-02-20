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
class RedirectPaymentMethodSpecificInput extends AbstractRedirectPaymentMethodSpecificInput
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
     * @var RedirectPaymentProduct840SpecificInput
     */
    public $paymentProduct840SpecificInput = null;

    /**
     * @var RedirectPaymentProduct861SpecificInput
     */
    public $paymentProduct861SpecificInput = null;

    /**
     * @var RedirectPaymentProduct863SpecificInput
     */
    public $paymentProduct863SpecificInput = null;

    /**
     * @var RedirectPaymentProduct869SpecificInput
     */
    public $paymentProduct869SpecificInput = null;

    /**
     * @var RedirectPaymentProduct882SpecificInput
     */
    public $paymentProduct882SpecificInput = null;

    /**
     * @var RedirectionData
     */
    public $redirectionData = null;

    /**
     * @var string
     * @deprecated Use redirectionData.returnUrl instead
     */
    public $returnUrl = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->isRecurring)) {
            $object->isRecurring = $this->isRecurring;
        }
        if (!is_null($this->paymentProduct809SpecificInput)) {
            $object->paymentProduct809SpecificInput = $this->paymentProduct809SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct816SpecificInput)) {
            $object->paymentProduct816SpecificInput = $this->paymentProduct816SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct840SpecificInput)) {
            $object->paymentProduct840SpecificInput = $this->paymentProduct840SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct861SpecificInput)) {
            $object->paymentProduct861SpecificInput = $this->paymentProduct861SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct863SpecificInput)) {
            $object->paymentProduct863SpecificInput = $this->paymentProduct863SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct869SpecificInput)) {
            $object->paymentProduct869SpecificInput = $this->paymentProduct869SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct882SpecificInput)) {
            $object->paymentProduct882SpecificInput = $this->paymentProduct882SpecificInput->toObject();
        }
        if (!is_null($this->redirectionData)) {
            $object->redirectionData = $this->redirectionData->toObject();
        }
        if (!is_null($this->returnUrl)) {
            $object->returnUrl = $this->returnUrl;
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
        if (property_exists($object, 'paymentProduct840SpecificInput')) {
            if (!is_object($object->paymentProduct840SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct840SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct840SpecificInput();
            $this->paymentProduct840SpecificInput = $value->fromObject($object->paymentProduct840SpecificInput);
        }
        if (property_exists($object, 'paymentProduct861SpecificInput')) {
            if (!is_object($object->paymentProduct861SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct861SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct861SpecificInput();
            $this->paymentProduct861SpecificInput = $value->fromObject($object->paymentProduct861SpecificInput);
        }
        if (property_exists($object, 'paymentProduct863SpecificInput')) {
            if (!is_object($object->paymentProduct863SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct863SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct863SpecificInput();
            $this->paymentProduct863SpecificInput = $value->fromObject($object->paymentProduct863SpecificInput);
        }
        if (property_exists($object, 'paymentProduct869SpecificInput')) {
            if (!is_object($object->paymentProduct869SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct869SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct869SpecificInput();
            $this->paymentProduct869SpecificInput = $value->fromObject($object->paymentProduct869SpecificInput);
        }
        if (property_exists($object, 'paymentProduct882SpecificInput')) {
            if (!is_object($object->paymentProduct882SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct882SpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentProduct882SpecificInput();
            $this->paymentProduct882SpecificInput = $value->fromObject($object->paymentProduct882SpecificInput);
        }
        if (property_exists($object, 'redirectionData')) {
            if (!is_object($object->redirectionData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectionData, true) . '\' is not an object');
            }
            $value = new RedirectionData();
            $this->redirectionData = $value->fromObject($object->redirectionData);
        }
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        return $this;
    }
}
