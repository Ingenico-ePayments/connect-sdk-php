<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class CreatePaymentResult extends DataObject
{
    /**
     * @var PaymentCreationOutput
     */
    public $creationOutput = null;

    /**
     * @var MerchantAction
     */
    public $merchantAction = null;

    /**
     * @var Payment
     */
    public $payment = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->creationOutput)) {
            $object->creationOutput = $this->creationOutput->toObject();
        }
        if (!is_null($this->merchantAction)) {
            $object->merchantAction = $this->merchantAction->toObject();
        }
        if (!is_null($this->payment)) {
            $object->payment = $this->payment->toObject();
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
        if (property_exists($object, 'creationOutput')) {
            if (!is_object($object->creationOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->creationOutput, true) . '\' is not an object');
            }
            $value = new PaymentCreationOutput();
            $this->creationOutput = $value->fromObject($object->creationOutput);
        }
        if (property_exists($object, 'merchantAction')) {
            if (!is_object($object->merchantAction)) {
                throw new UnexpectedValueException('value \'' . print_r($object->merchantAction, true) . '\' is not an object');
            }
            $value = new MerchantAction();
            $this->merchantAction = $value->fromObject($object->merchantAction);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        return $this;
    }
}
