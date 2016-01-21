<?php
/**
 * class ConvertAmount
 */
class GCS_services_ConvertAmount extends GCS_DataObject
{
    /**
     * @var int
     */
    public $convertedAmount = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'convertedAmount')) {
            $this->convertedAmount = $object->convertedAmount;
        }
        return $this;
    }
}
