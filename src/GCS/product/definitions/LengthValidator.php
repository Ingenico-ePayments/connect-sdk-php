<?php
namespace GCS\product\definitions;

use GCS\DataObject;

/**
 * Class LengthValidator
 *
 * @package GCS\product\definitions
 */
class LengthValidator extends DataObject
{
    /**
     * @var int
     */
    public $maxLength = null;

    /**
     * @var int
     */
    public $minLength = null;

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
        if (property_exists($object, 'maxLength')) {
            $this->maxLength = $object->maxLength;
        }
        if (property_exists($object, 'minLength')) {
            $this->minLength = $object->minLength;
        }
        return $this;
    }
}
