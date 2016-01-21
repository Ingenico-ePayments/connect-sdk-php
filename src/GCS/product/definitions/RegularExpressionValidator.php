<?php
class GCS_product_definitions_RegularExpressionValidator extends GCS_DataObject
{
    /**
     * @var string
     */
    public $regularExpression = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'regularExpression')) {
            $this->regularExpression = $object->regularExpression;
        }
        return $this;
    }
}
