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
class PaymentProductFieldTooltip extends DataObject
{
    /**
     * @var string
     */
    public $image = null;

    /**
     * @var string
     */
    public $label = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->image)) {
            $object->image = $this->image;
        }
        if (!is_null($this->label)) {
            $object->label = $this->label;
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
        if (property_exists($object, 'image')) {
            $this->image = $object->image;
        }
        if (property_exists($object, 'label')) {
            $this->label = $object->label;
        }
        return $this;
    }
}
