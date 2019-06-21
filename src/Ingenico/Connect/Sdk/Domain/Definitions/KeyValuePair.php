<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->key)) {
            $object->key = $this->key;
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
        if (property_exists($object, 'key')) {
            $this->key = $object->key;
        }
        if (property_exists($object, 'value')) {
            $this->value = $object->value;
        }
        return $this;
    }
}
