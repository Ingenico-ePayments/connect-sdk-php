<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions\PaymentProductFiltersHostedCheckout;
use UnexpectedValueException;

/**
 * Class HostedCheckoutSpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_HostedCheckoutSpecificInput HostedCheckoutSpecificInput
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
     * @var string
     */
    public $variant = null;

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
        if (property_exists($object, 'returnUrl')) {
            $this->returnUrl = $object->returnUrl;
        }
        if (property_exists($object, 'showResultPage')) {
            $this->showResultPage = $object->showResultPage;
        }
        if (property_exists($object, 'tokens')) {
            $this->tokens = $object->tokens;
        }
        if (property_exists($object, 'variant')) {
            $this->variant = $object->variant;
        }
        return $this;
    }
}
