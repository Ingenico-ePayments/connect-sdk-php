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
class MicrosoftFraudResults extends DataObject
{
    /**
     * @var string
     */
    public $deviceCountryCode = null;

    /**
     * @var string
     */
    public $deviceId = null;

    /**
     * @var int
     */
    public $fraudScore = null;

    /**
     * @var string
     */
    public $trueIpAddress = null;

    /**
     * @var string
     */
    public $userDeviceType = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->deviceCountryCode)) {
            $object->deviceCountryCode = $this->deviceCountryCode;
        }
        if (!is_null($this->deviceId)) {
            $object->deviceId = $this->deviceId;
        }
        if (!is_null($this->fraudScore)) {
            $object->fraudScore = $this->fraudScore;
        }
        if (!is_null($this->trueIpAddress)) {
            $object->trueIpAddress = $this->trueIpAddress;
        }
        if (!is_null($this->userDeviceType)) {
            $object->userDeviceType = $this->userDeviceType;
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
        if (property_exists($object, 'deviceCountryCode')) {
            $this->deviceCountryCode = $object->deviceCountryCode;
        }
        if (property_exists($object, 'deviceId')) {
            $this->deviceId = $object->deviceId;
        }
        if (property_exists($object, 'fraudScore')) {
            $this->fraudScore = $object->fraudScore;
        }
        if (property_exists($object, 'trueIpAddress')) {
            $this->trueIpAddress = $object->trueIpAddress;
        }
        if (property_exists($object, 'userDeviceType')) {
            $this->userDeviceType = $object->userDeviceType;
        }
        return $this;
    }
}
