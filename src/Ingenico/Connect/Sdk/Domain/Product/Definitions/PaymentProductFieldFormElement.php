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
class PaymentProductFieldFormElement extends DataObject
{
    /**
     * @var string
     */
    public $type = null;

    /**
     * @var ValueMappingElement[]
     */
    public $valueMapping = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->type)) {
            $object->type = $this->type;
        }
        if (!is_null($this->valueMapping)) {
            $object->valueMapping = [];
            foreach ($this->valueMapping as $element) {
                if (!is_null($element)) {
                    $object->valueMapping[] = $element->toObject();
                }
            }
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
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        if (property_exists($object, 'valueMapping')) {
            if (!is_array($object->valueMapping) && !is_object($object->valueMapping)) {
                throw new UnexpectedValueException('value \'' . print_r($object->valueMapping, true) . '\' is not an array or object');
            }
            $this->valueMapping = [];
            foreach ($object->valueMapping as $element) {
                $value = new ValueMappingElement();
                $this->valueMapping[] = $value->fromObject($element);
            }
        }
        return $this;
    }
}
