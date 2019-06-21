<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class TokenNonSepaDirectDebit extends AbstractToken
{
    /**
     * @var CustomerToken
     */
    public $customer = null;

    /**
     * @var MandateNonSepaDirectDebit
     */
    public $mandate = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->customer)) {
            $object->customer = $this->customer->toObject();
        }
        if (!is_null($this->mandate)) {
            $object->mandate = $this->mandate->toObject();
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
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new CustomerToken();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'mandate')) {
            if (!is_object($object->mandate)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mandate, true) . '\' is not an object');
            }
            $value = new MandateNonSepaDirectDebit();
            $this->mandate = $value->fromObject($object->mandate);
        }
        return $this;
    }
}
