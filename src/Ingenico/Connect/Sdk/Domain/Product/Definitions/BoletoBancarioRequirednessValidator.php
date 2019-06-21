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
class BoletoBancarioRequirednessValidator extends DataObject
{
    /**
     * @var int
     */
    public $fiscalNumberLength = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->fiscalNumberLength)) {
            $object->fiscalNumberLength = $this->fiscalNumberLength;
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
        if (property_exists($object, 'fiscalNumberLength')) {
            $this->fiscalNumberLength = $object->fiscalNumberLength;
        }
        return $this;
    }
}
