<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class Order extends DataObject
{
    /**
     * @var AdditionalOrderInput
     */
    public $additionalInput = null;

    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var Customer
     */
    public $customer = null;

    /**
     * @var LineItem[]
     * @deprecated Use shoppingCart.items instead
     */
    public $items = null;

    /**
     * @var OrderReferences
     */
    public $references = null;

    /**
     * @var Seller
     * @deprecated Use Merchant.seller instead
     */
    public $seller = null;

    /**
     * @var Shipping
     */
    public $shipping = null;

    /**
     * @var ShoppingCart
     */
    public $shoppingCart = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->additionalInput)) {
            $object->additionalInput = $this->additionalInput->toObject();
        }
        if (!is_null($this->amountOfMoney)) {
            $object->amountOfMoney = $this->amountOfMoney->toObject();
        }
        if (!is_null($this->customer)) {
            $object->customer = $this->customer->toObject();
        }
        if (!is_null($this->items)) {
            $object->items = [];
            foreach ($this->items as $element) {
                if (!is_null($element)) {
                    $object->items[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->references)) {
            $object->references = $this->references->toObject();
        }
        if (!is_null($this->seller)) {
            $object->seller = $this->seller->toObject();
        }
        if (!is_null($this->shipping)) {
            $object->shipping = $this->shipping->toObject();
        }
        if (!is_null($this->shoppingCart)) {
            $object->shoppingCart = $this->shoppingCart->toObject();
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
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->additionalInput, true) . '\' is not an object');
            }
            $value = new AdditionalOrderInput();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new Customer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'items')) {
            if (!is_array($object->items) && !is_object($object->items)) {
                throw new UnexpectedValueException('value \'' . print_r($object->items, true) . '\' is not an array or object');
            }
            $this->items = [];
            foreach ($object->items as $element) {
                $value = new LineItem();
                $this->items[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new OrderReferences();
            $this->references = $value->fromObject($object->references);
        }
        if (property_exists($object, 'seller')) {
            if (!is_object($object->seller)) {
                throw new UnexpectedValueException('value \'' . print_r($object->seller, true) . '\' is not an object');
            }
            $value = new Seller();
            $this->seller = $value->fromObject($object->seller);
        }
        if (property_exists($object, 'shipping')) {
            if (!is_object($object->shipping)) {
                throw new UnexpectedValueException('value \'' . print_r($object->shipping, true) . '\' is not an object');
            }
            $value = new Shipping();
            $this->shipping = $value->fromObject($object->shipping);
        }
        if (property_exists($object, 'shoppingCart')) {
            if (!is_object($object->shoppingCart)) {
                throw new UnexpectedValueException('value \'' . print_r($object->shoppingCart, true) . '\' is not an object');
            }
            $value = new ShoppingCart();
            $this->shoppingCart = $value->fromObject($object->shoppingCart);
        }
        return $this;
    }
}
