<?php
namespace GCS\Product\Definitions;

use GCS\DataObject;

/**
 * Class RangeValidator
 *
 * @package GCS\Product\Definitions
 */
class RangeValidator extends DataObject
{
    /**
     * @var int
     */
    public $maxValue = null;

    /**
     * @var int
     */
    public $minValue = null;

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
        if (property_exists($object, 'maxValue')) {
            $this->maxValue = $object->maxValue;
        }
        if (property_exists($object, 'minValue')) {
            $this->minValue = $object->minValue;
        }
        return $this;
    }
}
