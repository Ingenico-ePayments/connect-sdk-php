<?php
namespace GCS\product;

/**
 * Class Directory
 *
 * @package GCS\product
 */
class Directory extends \GCS\DataObject
{
    /**
     * @var definitions\DirectoryEntry[]
     */
    public $entries = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'entries')) {
            if (!is_array($object->entries) && !is_object($object->entries)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->entries, true) . '\' is not an array or object'
                );
            }
            $this->entries = [];
            foreach ($object->entries as $entriesElementObject) {
                $entriesElement = new definitions\DirectoryEntry();
                $this->entries[] = $entriesElement->fromObject($entriesElementObject);
            }
        }
        return $this;
    }
}
