<?php
class GCS_product_definitions_RangeValidator extends GCS_DataObject
{
    /**
     * @var int
     */
    public $maxValue = null;

    /**
     * @var int
     */
    public $minValue = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'maxValue')) {
            $this->maxValue = $object->maxValue;
        }
        if (property_exists($object, 'minValue')) {
            $this->minValue = $object->minValue;
        }
        return $this;
    }
}
