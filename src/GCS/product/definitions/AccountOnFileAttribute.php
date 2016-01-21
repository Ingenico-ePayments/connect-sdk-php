<?php
class GCS_product_definitions_AccountOnFileAttribute extends GCS_fei_definitions_KeyValuePair
{
    /**
     * @var string
     */
    public $mustWriteReason = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'mustWriteReason')) {
            $this->mustWriteReason = $object->mustWriteReason;
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        return $this;
    }
}
