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
class AbstractIndicator extends DataObject
{
    /**
     * @var string
     */
    public $name = null;

    /**
     * @var string
     */
    public $value = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->name)) {
            $object->name = $this->name;
        }
        if (!is_null($this->value)) {
            $object->value = $this->value;
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
        if (property_exists($object, 'name')) {
            $this->name = $object->name;
        }
        if (property_exists($object, 'value')) {
            $this->value = $object->value;
        }
        return $this;
    }
}
