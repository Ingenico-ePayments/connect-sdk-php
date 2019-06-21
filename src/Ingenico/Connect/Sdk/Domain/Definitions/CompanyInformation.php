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
class CompanyInformation extends DataObject
{
    /**
     * @var string
     */
    public $name = null;

    /**
     * @var string
     */
    public $vatNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->name)) {
            $object->name = $this->name;
        }
        if (!is_null($this->vatNumber)) {
            $object->vatNumber = $this->vatNumber;
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
        if (property_exists($object, 'name')) {
            $this->name = $object->name;
        }
        if (property_exists($object, 'vatNumber')) {
            $this->vatNumber = $object->vatNumber;
        }
        return $this;
    }
}
