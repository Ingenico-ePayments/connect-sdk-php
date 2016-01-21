<?php
class GCS_product_definitions_PaymentProductFieldTooltip extends GCS_DataObject
{
    /**
     * @var string
     */
    public $image = null;

    /**
     * @var string
     */
    public $label = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'image')) {
            $this->image = $object->image;
        }
        if (property_exists($object, 'label')) {
            $this->label = $object->label;
        }
        return $this;
    }
}
