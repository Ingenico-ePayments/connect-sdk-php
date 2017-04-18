<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AdditionalOrderInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Customer;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\LineItem;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderReferences;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ShoppingCart;
use UnexpectedValueException;

/**
 * Class Order
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Order Order
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
     */
    public $items = null;

    /**
     * @var OrderReferences
     */
    public $references = null;

    /**
     * @var ShoppingCart
     */
    public $shoppingCart = null;

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
            foreach ($object->items as $itemsElementObject) {
                $itemsElement = new LineItem();
                $this->items[] = $itemsElement->fromObject($itemsElementObject);
            }
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new OrderReferences();
            $this->references = $value->fromObject($object->references);
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
