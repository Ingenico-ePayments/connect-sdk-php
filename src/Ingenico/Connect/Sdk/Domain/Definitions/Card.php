<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class Card extends CardWithoutCvv
{
    /**
     * @var string
     */
    public $cvv = null;

    /**
     * @var string
     */
    public $partialPin = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->cvv)) {
            $object->cvv = $this->cvv;
        }
        if (!is_null($this->partialPin)) {
            $object->partialPin = $this->partialPin;
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
        if (property_exists($object, 'cvv')) {
            $this->cvv = $object->cvv;
        }
        if (property_exists($object, 'partialPin')) {
            $this->partialPin = $object->partialPin;
        }
        return $this;
    }
}
