<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->maxValue)) {
            $object->maxValue = $this->maxValue;
        }
        if (!is_null($this->minValue)) {
            $object->minValue = $this->minValue;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
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
