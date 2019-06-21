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
class ValueMappingElement extends DataObject
{
    /**
     * @var PaymentProductFieldDisplayElement[]
     */
    public $displayElements = null;

    /**
     * @var string
     * @deprecated Use displayElements instead with ID 'displayName'
     */
    public $displayName = null;

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
        if (!is_null($this->displayElements)) {
            $object->displayElements = [];
            foreach ($this->displayElements as $element) {
                if (!is_null($element)) {
                    $object->displayElements[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->displayName)) {
            $object->displayName = $this->displayName;
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
        if (property_exists($object, 'displayElements')) {
            if (!is_array($object->displayElements) && !is_object($object->displayElements)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayElements, true) . '\' is not an array or object');
            }
            $this->displayElements = [];
            foreach ($object->displayElements as $element) {
                $value = new PaymentProductFieldDisplayElement();
                $this->displayElements[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'displayName')) {
            $this->displayName = $object->displayName;
        }
        if (property_exists($object, 'value')) {
            $this->value = $object->value;
        }
        return $this;
    }
}
