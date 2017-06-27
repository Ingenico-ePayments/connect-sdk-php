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
class FraudFieldsShippingDetails extends DataObject
{
    /**
     * @var string
     */
    public $methodDetails = null;

    /**
     * @var int
     */
    public $methodSpeed = null;

    /**
     * @var int
     */
    public $methodType = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'methodDetails')) {
            $this->methodDetails = $object->methodDetails;
        }
        if (property_exists($object, 'methodSpeed')) {
            $this->methodSpeed = $object->methodSpeed;
        }
        if (property_exists($object, 'methodType')) {
            $this->methodType = $object->methodType;
        }
        return $this;
    }
}
