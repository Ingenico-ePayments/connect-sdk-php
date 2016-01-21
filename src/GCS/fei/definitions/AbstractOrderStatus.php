<?php
class GCS_fei_definitions_AbstractOrderStatus extends GCS_DataObject
{
    /**
     * @var string
     */
    public $id = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        return $this;
    }
}
