<?php
/**
 * class BINLookupRequest
 */
class GCS_services_BINLookupRequest extends GCS_DataObject
{
    /**
     * @var string
     */
    public $bin = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bin')) {
            $this->bin = $object->bin;
        }
        return $this;
    }
}
