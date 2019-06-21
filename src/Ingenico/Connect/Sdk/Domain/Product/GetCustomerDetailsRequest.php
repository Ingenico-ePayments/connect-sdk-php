<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\KeyValuePair;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product
 */
class GetCustomerDetailsRequest extends DataObject
{
    /**
     * @var string
     */
    public $countryCode = null;

    /**
     * @var KeyValuePair[]
     */
    public $values = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->countryCode)) {
            $object->countryCode = $this->countryCode;
        }
        if (!is_null($this->values)) {
            $object->values = [];
            foreach ($this->values as $element) {
                if (!is_null($element)) {
                    $object->values[] = $element->toObject();
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
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
        }
        if (property_exists($object, 'values')) {
            if (!is_array($object->values) && !is_object($object->values)) {
                throw new UnexpectedValueException('value \'' . print_r($object->values, true) . '\' is not an array or object');
            }
            $this->values = [];
            foreach ($object->values as $element) {
                $value = new KeyValuePair();
                $this->values[] = $value->fromObject($element);
            }
        }
        return $this;
    }
}
