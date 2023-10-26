<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class PersonalIdentification extends DataObject
{
    /**
     * @var string
     */
    public $idIssuingCountryCode = null;

    /**
     * @var string
     */
    public $idType = null;

    /**
     * @var string
     */
    public $idValue = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->idIssuingCountryCode)) {
            $object->idIssuingCountryCode = $this->idIssuingCountryCode;
        }
        if (!is_null($this->idType)) {
            $object->idType = $this->idType;
        }
        if (!is_null($this->idValue)) {
            $object->idValue = $this->idValue;
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
        if (property_exists($object, 'idIssuingCountryCode')) {
            $this->idIssuingCountryCode = $object->idIssuingCountryCode;
        }
        if (property_exists($object, 'idType')) {
            $this->idType = $object->idType;
        }
        if (property_exists($object, 'idValue')) {
            $this->idValue = $object->idValue;
        }
        return $this;
    }
}
