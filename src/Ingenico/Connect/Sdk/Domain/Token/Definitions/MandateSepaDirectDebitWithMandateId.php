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
class MandateSepaDirectDebitWithMandateId extends MandateSepaDirectDebitWithoutCreditor
{
    /**
     * @var string
     */
    public $mandateId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->mandateId)) {
            $object->mandateId = $this->mandateId;
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
        if (property_exists($object, 'mandateId')) {
            $this->mandateId = $object->mandateId;
        }
        return $this;
    }
}
