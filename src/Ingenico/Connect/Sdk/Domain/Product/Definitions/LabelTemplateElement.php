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
class LabelTemplateElement extends DataObject
{
    /**
     * @var string
     */
    public $attributeKey = null;

    /**
     * @var string
     */
    public $mask = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->attributeKey)) {
            $object->attributeKey = $this->attributeKey;
        }
        if (!is_null($this->mask)) {
            $object->mask = $this->mask;
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
        if (property_exists($object, 'attributeKey')) {
            $this->attributeKey = $object->attributeKey;
        }
        if (property_exists($object, 'mask')) {
            $this->mask = $object->mask;
        }
        return $this;
    }
}
