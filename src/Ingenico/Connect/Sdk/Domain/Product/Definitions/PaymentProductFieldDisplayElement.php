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
class PaymentProductFieldDisplayElement extends DataObject
{
    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $label = null;

    /**
     * @var string
     */
    public $type = null;

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
        if (!is_null($this->id)) {
            $object->id = $this->id;
        }
        if (!is_null($this->label)) {
            $object->label = $this->label;
        }
        if (!is_null($this->type)) {
            $object->type = $this->type;
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
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'label')) {
            $this->label = $object->label;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        if (property_exists($object, 'value')) {
            $this->value = $object->value;
        }
        return $this;
    }
}
