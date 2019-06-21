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
class ProtectionEligibility extends DataObject
{
    /**
     * @var string
     */
    public $eligibility = null;

    /**
     * @var string
     */
    public $type = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->eligibility)) {
            $object->eligibility = $this->eligibility;
        }
        if (!is_null($this->type)) {
            $object->type = $this->type;
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
        if (property_exists($object, 'eligibility')) {
            $this->eligibility = $object->eligibility;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        return $this;
    }
}
