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
class PaymentProductFieldDataRestrictions extends DataObject
{
    /**
     * @var bool
     */
    public $isRequired = null;

    /**
     * @var PaymentProductFieldValidators
     */
    public $validators = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->isRequired)) {
            $object->isRequired = $this->isRequired;
        }
        if (!is_null($this->validators)) {
            $object->validators = $this->validators->toObject();
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
        if (property_exists($object, 'isRequired')) {
            $this->isRequired = $object->isRequired;
        }
        if (property_exists($object, 'validators')) {
            if (!is_object($object->validators)) {
                throw new UnexpectedValueException('value \'' . print_r($object->validators, true) . '\' is not an object');
            }
            $value = new PaymentProductFieldValidators();
            $this->validators = $value->fromObject($object->validators);
        }
        return $this;
    }
}
