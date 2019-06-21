<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 */
class HostedCheckoutSpecificInput extends DataObject
{
    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var string
     */
    public $locale = null;

    /**
     * @var PaymentProductFiltersHostedCheckout
     */
    public $paymentProductFilters = null;

    /**
     * @var bool
     */
    public $returnCancelState = null;

    /**
     * @var string
     */
    public $returnUrl = null;

    /**
     * @var bool
     */
    public $showResultPage = null;

    /**
     * @var string
     */
    public $tokens = null;

    /**
     * @var bool
     */
    public $validateShoppingCart = null;

    /**
     * @var string
     */
    public $variant = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->isRecurring)) {
            $object->isRecurring = $this->isRecurring;
        }
        if (!is_null($this->locale)) {
            $object->locale = $this->locale;
        }
        if (!is_null($this->paymentProductFilters)) {
            $object->paymentProductFilters = $this->paymentProductFilters->toObject();
        }
        if (!is_null($this->returnCancelState)) {
            $object->returnCancelState = $this->returnCancelState;
        }
        if (!is_null($this->returnUrl)) {
            $object->returnUrl = $this->returnUrl;
        }
        if (!is_null($this->showResultPage)) {
            $object->showResultPage = $this->showResultPage;
        }
        if (!is_null($this->tokens)) {
            $object->tokens = $this->tokens;
        }
        if (!is_null($this->validateShoppingCart)) {
            $object->validateShoppingCart = $this->validateShoppingCart;
        }
        if (!is_null($this->variant)) {
            $object->variant = $this->variant;
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
        if (property_exists($object, 'locale')) {
            $this->locale = $object->locale;
        }
        if (property_exists($object, 'paymentProductFilters')) {
            if (!is_object($object->paymentProductFilters)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProductFilters, true) . '\' is not an object');
            }
            $value = new PaymentProductFiltersHostedCheckout();
            $this->paymentProductFilters = $value->fromObject($object->paymentProductFilters);
        }
        if (property_exists($object, 'returnCancelState')) {
            $this->returnCancelState = $object->returnCancelState;
        }
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        if (property_exists($object, 'showResultPage')) {
            $this->showResultPage = $object->showResultPage;
        }
        if (property_exists($object, 'tokens')) {
            $this->tokens = $object->tokens;
        }
        if (property_exists($object, 'validateShoppingCart')) {
            $this->validateShoppingCart = $object->validateShoppingCart;
        }
        if (property_exists($object, 'variant')) {
            $this->variant = $object->variant;
        }
        return $this;
    }
}
