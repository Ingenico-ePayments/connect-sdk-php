<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AddressPersonal;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 */
class ShippingRiskAssessment extends DataObject
{
    /**
     * @var AddressPersonal
     */
    public $address = null;

    /**
     * @var string
     */
    public $comments = null;

    /**
     * @var string
     */
    public $trackingNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->address)) {
            $object->address = $this->address->toObject();
        }
        if (!is_null($this->comments)) {
            $object->comments = $this->comments;
        }
        if (!is_null($this->trackingNumber)) {
            $object->trackingNumber = $this->trackingNumber;
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
        if (property_exists($object, 'address')) {
            if (!is_object($object->address)) {
                throw new UnexpectedValueException('value \'' . print_r($object->address, true) . '\' is not an object');
            }
            $value = new AddressPersonal();
            $this->address = $value->fromObject($object->address);
        }
        if (property_exists($object, 'comments')) {
            $this->comments = $object->comments;
        }
        if (property_exists($object, 'trackingNumber')) {
            $this->trackingNumber = $object->trackingNumber;
        }
        return $this;
    }
}
