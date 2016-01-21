<?php
class GCS_product_definitions_PaymentProductDisplayHints extends GCS_DataObject
{
    /**
     * @var int
     */
    public $displayOrder = null;

    /**
     * @var string
     */
    public $label = null;

    /**
     * @var string
     */
    public $logo = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'displayOrder')) {
            $this->displayOrder = $object->displayOrder;
        }
        if (property_exists($object, 'label')) {
            $this->label = $object->label;
        }
        if (property_exists($object, 'logo')) {
            $this->logo = $object->logo;
        }
        return $this;
    }
}
