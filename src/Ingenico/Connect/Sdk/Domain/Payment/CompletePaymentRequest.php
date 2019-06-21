<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CompletePaymentCardPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Merchant;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment
 */
class CompletePaymentRequest extends DataObject
{
    /**
     * @var CompletePaymentCardPaymentMethodSpecificInput
     */
    public $cardPaymentMethodSpecificInput = null;

    /**
     * @var Merchant
     */
    public $merchant = null;

    /**
     * @var Order
     */
    public $order = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->cardPaymentMethodSpecificInput)) {
            $object->cardPaymentMethodSpecificInput = $this->cardPaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->merchant)) {
            $object->merchant = $this->merchant->toObject();
        }
        if (!is_null($this->order)) {
            $object->order = $this->order->toObject();
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
        if (property_exists($object, 'cardPaymentMethodSpecificInput')) {
            if (!is_object($object->cardPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new CompletePaymentCardPaymentMethodSpecificInput();
            $this->cardPaymentMethodSpecificInput = $value->fromObject($object->cardPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'merchant')) {
            if (!is_object($object->merchant)) {
                throw new UnexpectedValueException('value \'' . print_r($object->merchant, true) . '\' is not an object');
            }
            $value = new Merchant();
            $this->merchant = $value->fromObject($object->merchant);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new Order();
            $this->order = $value->fromObject($object->order);
        }
        return $this;
    }
}
