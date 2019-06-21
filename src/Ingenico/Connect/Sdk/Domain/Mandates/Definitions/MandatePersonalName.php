<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Mandates\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Mandates\Definitions
 */
class MandatePersonalName extends DataObject
{
    /**
     * @var string
     */
    public $firstName = null;

    /**
     * @var string
     */
    public $surname = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->firstName)) {
            $object->firstName = $this->firstName;
        }
        if (!is_null($this->surname)) {
            $object->surname = $this->surname;
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
        if (property_exists($object, 'firstName')) {
            $this->firstName = $object->firstName;
        }
        if (property_exists($object, 'surname')) {
            $this->surname = $object->surname;
        }
        return $this;
    }
}
