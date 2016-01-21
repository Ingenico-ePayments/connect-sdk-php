<?php
class GCS_product_definitions_PaymentProductFieldFormElement extends GCS_DataObject
{
    /**
     * @var string
     */
    public $type = null;

    /**
     * @var GCS_product_definitions_ValueMappingElement[]
     */
    public $valueMapping = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        if (property_exists($object, 'valueMapping')) {
            if (!is_array($object->valueMapping) && !is_object($object->valueMapping)) {
                throw new UnexpectedValueException('value \'' . print_r($object->valueMapping, true) . '\' is not an array or object');
            }
            $this->valueMapping = [];
            foreach ($object->valueMapping as $valueMappingElementObject) {
                $valueMappingElement = new GCS_product_definitions_ValueMappingElement();
                $this->valueMapping[] = $valueMappingElement->fromObject($valueMappingElementObject);
            }
        }
        return $this;
    }
}
