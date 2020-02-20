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
class RedirectPaymentProduct869SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $issuerId = null;

    /**
     * @var string
     */
    public $residentIdName = null;

    /**
     * @var string
     */
    public $residentIdNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->issuerId)) {
            $object->issuerId = $this->issuerId;
        }
        if (!is_null($this->residentIdName)) {
            $object->residentIdName = $this->residentIdName;
        }
        if (!is_null($this->residentIdNumber)) {
            $object->residentIdNumber = $this->residentIdNumber;
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
        if (property_exists($object, 'issuerId')) {
            $this->issuerId = $object->issuerId;
        }
        if (property_exists($object, 'residentIdName')) {
            $this->residentIdName = $object->residentIdName;
        }
        if (property_exists($object, 'residentIdNumber')) {
            $this->residentIdNumber = $object->residentIdNumber;
        }
        return $this;
    }
}
