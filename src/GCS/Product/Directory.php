<?php
namespace GCS\Product;

/**
 * Class Directory
 *
 * @package GCS\Product
 */
class Directory extends \GCS\DataObject
{
    /**
     * @var Definitions\DirectoryEntry[]
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
                $entriesElement = new Definitions\DirectoryEntry();
                $this->entries[] = $entriesElement->fromObject($entriesElementObject);
            }
        }
        return $this;
    }
}
