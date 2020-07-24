<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\MobilePaymentProductSession302SpecificOutput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product
 */
class CreatePaymentProductSessionResponse extends DataObject
{
    /**
     * @var MobilePaymentProductSession302SpecificOutput
     */
    public $paymentProductSession302SpecificOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProductSession302SpecificOutput)) {
            $object->paymentProductSession302SpecificOutput = $this->paymentProductSession302SpecificOutput->toObject();
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
        if (property_exists($object, 'paymentProductSession302SpecificOutput')) {
            if (!is_object($object->paymentProductSession302SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProductSession302SpecificOutput, true) . '\' is not an object');
            }
            $value = new MobilePaymentProductSession302SpecificOutput();
            $this->paymentProductSession302SpecificOutput = $value->fromObject($object->paymentProductSession302SpecificOutput);
        }
        return $this;
    }
}
