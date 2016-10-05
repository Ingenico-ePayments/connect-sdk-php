<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Product\Definitions\DirectoryEntry;
use UnexpectedValueException;

/**
 * Class Directory
 *
 * @package Ingenico\Connect\Sdk\Domain\Product
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Directory Directory
 */
class Directory extends DataObject
{
    /**
     * @var DirectoryEntry[]
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
                $entriesElement = new DirectoryEntry();
                $this->entries[] = $entriesElement->fromObject($entriesElementObject);
            }
        }
        return $this;
    }
}
