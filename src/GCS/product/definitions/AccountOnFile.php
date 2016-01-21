<?php
class GCS_product_definitions_AccountOnFile extends GCS_DataObject
{
    /**
     * @var GCS_product_definitions_AccountOnFileAttribute[]
     */
    public $attributes = null;

    /**
     * @var GCS_product_definitions_AccountOnFileDisplayHints
     */
    public $displayHints = null;

    /**
     * @var int
     */
    public $id = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'attributes')) {
            if (!is_array($object->attributes) && !is_object($object->attributes)) {
                throw new UnexpectedValueException('value \'' . print_r($object->attributes, true) . '\' is not an array or object');
            }
            $this->attributes = [];
            foreach ($object->attributes as $attributesElementObject) {
                $attributesElement = new GCS_product_definitions_AccountOnFileAttribute();
                $this->attributes[] = $attributesElement->fromObject($attributesElementObject);
            }
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayHints, true) . '\' is not an object');
            }
            $value = new GCS_product_definitions_AccountOnFileDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
