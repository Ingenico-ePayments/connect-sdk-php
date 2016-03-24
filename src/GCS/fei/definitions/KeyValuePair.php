<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class KeyValuePair
 *
 * @package GCS\fei\definitions
 */
class KeyValuePair extends DataObject
{
    /**
     * @var string
     */
    public $key = null;

    /**
     * @var string
     */
    public $value = null;

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
        if (property_exists($object, 'key')) {
            $this->key = $object->key;
        }
        if (property_exists($object, 'value')) {
            $this->value = $object->value;
        }
        return $this;
    }
}
