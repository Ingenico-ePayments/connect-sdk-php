<?php
class GCS_payment_definitions_Order extends GCS_DataObject
{
    /**
     * @var GCS_payment_definitions_AdditionalOrderInput
     */
    public $additionalInput = null;

    /**
     * @var GCS_fei_definitions_AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var GCS_payment_definitions_Customer
     */
    public $customer = null;

    /**
     * @var GCS_payment_definitions_LineItem[]
     */
    public $items = null;

    /**
     * @var GCS_payment_definitions_OrderReferences
     */
    public $references = null;

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
            $value = new GCS_payment_definitions_AdditionalOrderInput();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_Customer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'items')) {
            if (!is_array($object->items) && !is_object($object->items)) {
                throw new UnexpectedValueException('value \'' . print_r($object->items, true) . '\' is not an array or object');
            }
            $this->items = [];
            foreach ($object->items as $itemsElementObject) {
                $itemsElement = new GCS_payment_definitions_LineItem();
                $this->items[] = $itemsElement->fromObject($itemsElementObject);
            }
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_OrderReferences();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
