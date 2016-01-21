<?php
/**
 * class Directory
 */
class GCS_product_Directory extends GCS_DataObject
{
    /**
     * @var GCS_product_definitions_DirectoryEntry[]
     */
    public $entries = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'entries')) {
            if (!is_array($object->entries) && !is_object($object->entries)) {
                throw new UnexpectedValueException('value \'' . print_r($object->entries, true) . '\' is not an array or object');
            }
            $this->entries = [];
            foreach ($object->entries as $entriesElementObject) {
                $entriesElement = new GCS_product_definitions_DirectoryEntry();
                $this->entries[] = $entriesElement->fromObject($entriesElementObject);
            }
        }
        return $this;
    }
}
