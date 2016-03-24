<?php
namespace GCS\Payment\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\AmountOfMoney;

/**
 * Class Order
 *
 * @package GCS\Payment\Definitions
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
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->additionalInput, true) . '\' is not an object'
                );
            }
            $value = new AdditionalOrderInput();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->amountOfMoney, true) . '\' is not an object'
                );
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->customer, true) . '\' is not an object'
                );
            }
            $value = new Customer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'items')) {
            if (!is_array($object->items) && !is_object($object->items)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->items, true) . '\' is not an array or object'
                );
            }
            $this->items = [];
            foreach ($object->items as $itemsElementObject) {
                $itemsElement = new LineItem();
                $this->items[] = $itemsElement->fromObject($itemsElementObject);
            }
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->references, true) . '\' is not an object'
                );
            }
            $value = new OrderReferences();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
