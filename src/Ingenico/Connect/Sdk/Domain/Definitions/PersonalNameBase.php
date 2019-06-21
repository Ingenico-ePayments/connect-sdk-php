<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class PersonalNameBase extends DataObject
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
     * @var string
     */
    public $surnamePrefix = null;

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
        if (!is_null($this->surnamePrefix)) {
            $object->surnamePrefix = $this->surnamePrefix;
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
        if (property_exists($object, 'surnamePrefix')) {
            $this->surnamePrefix = $object->surnamePrefix;
        }
        return $this;
    }
}
