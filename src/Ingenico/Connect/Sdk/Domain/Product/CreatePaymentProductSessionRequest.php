<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\MobilePaymentProductSession302SpecificInput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product
 */
class CreatePaymentProductSessionRequest extends DataObject
{
    /**
     * @var MobilePaymentProductSession302SpecificInput
     */
    public $paymentProductSession302SpecificInput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProductSession302SpecificInput)) {
            $object->paymentProductSession302SpecificInput = $this->paymentProductSession302SpecificInput->toObject();
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
        if (property_exists($object, 'paymentProductSession302SpecificInput')) {
            if (!is_object($object->paymentProductSession302SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProductSession302SpecificInput, true) . '\' is not an object');
            }
            $value = new MobilePaymentProductSession302SpecificInput();
            $this->paymentProductSession302SpecificInput = $value->fromObject($object->paymentProductSession302SpecificInput);
        }
        return $this;
    }
}
