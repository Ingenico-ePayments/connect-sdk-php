<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class CardWithoutCvv extends CardEssentials
{
    /**
     * @var string
     */
    public $cardholderName = null;

    /**
     * @var string
     */
    public $issueNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->cardholderName)) {
            $object->cardholderName = $this->cardholderName;
        }
        if (!is_null($this->issueNumber)) {
            $object->issueNumber = $this->issueNumber;
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
        if (property_exists($object, 'cardholderName')) {
            $this->cardholderName = $object->cardholderName;
        }
        if (property_exists($object, 'issueNumber')) {
            $this->issueNumber = $object->issueNumber;
        }
        return $this;
    }
}
