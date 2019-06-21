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
class FixedListValidator extends DataObject
{
    /**
     * @var string[]
     */
    public $allowedValues = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->allowedValues)) {
            $object->allowedValues = [];
            foreach ($this->allowedValues as $element) {
                if (!is_null($element)) {
                    $object->allowedValues[] = $element;
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
        if (property_exists($object, 'allowedValues')) {
            if (!is_array($object->allowedValues) && !is_object($object->allowedValues)) {
                throw new UnexpectedValueException('value \'' . print_r($object->allowedValues, true) . '\' is not an array or object');
            }
            $this->allowedValues = [];
            foreach ($object->allowedValues as $element) {
                $this->allowedValues[] = $element;
            }
        }
        return $this;
    }
}
