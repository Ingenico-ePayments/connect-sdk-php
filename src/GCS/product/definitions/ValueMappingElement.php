<?php
class GCS_product_definitions_ValueMappingElement extends GCS_DataObject
{
    /**
     * @var string
     */
    public $displayName = null;

    /**
     * @var string
     */
    public $value = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'displayName')) {
            $this->displayName = $object->displayName;
        }
        if (property_exists($object, 'value')) {
            $this->value = $object->value;
        }
        return $this;
    }
}
