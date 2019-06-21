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
class SdkDataInput extends DataObject
{
    /**
     * @var string
     */
    public $deviceInfo = null;

    /**
     * @var DeviceRenderOptions
     */
    public $deviceRenderOptions = null;

    /**
     * @var string
     */
    public $sdkAppId = null;

    /**
     * @var string
     */
    public $sdkEncryptedData = null;

    /**
     * @var string
     */
    public $sdkEphemeralPublicKey = null;

    /**
     * @var string
     */
    public $sdkMaxTimeout = null;

    /**
     * @var string
     */
    public $sdkReferenceNumber = null;

    /**
     * @var string
     */
    public $sdkTransactionId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->deviceInfo)) {
            $object->deviceInfo = $this->deviceInfo;
        }
        if (!is_null($this->deviceRenderOptions)) {
            $object->deviceRenderOptions = $this->deviceRenderOptions->toObject();
        }
        if (!is_null($this->sdkAppId)) {
            $object->sdkAppId = $this->sdkAppId;
        }
        if (!is_null($this->sdkEncryptedData)) {
            $object->sdkEncryptedData = $this->sdkEncryptedData;
        }
        if (!is_null($this->sdkEphemeralPublicKey)) {
            $object->sdkEphemeralPublicKey = $this->sdkEphemeralPublicKey;
        }
        if (!is_null($this->sdkMaxTimeout)) {
            $object->sdkMaxTimeout = $this->sdkMaxTimeout;
        }
        if (!is_null($this->sdkReferenceNumber)) {
            $object->sdkReferenceNumber = $this->sdkReferenceNumber;
        }
        if (!is_null($this->sdkTransactionId)) {
            $object->sdkTransactionId = $this->sdkTransactionId;
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
        if (property_exists($object, 'deviceInfo')) {
            $this->deviceInfo = $object->deviceInfo;
        }
        if (property_exists($object, 'deviceRenderOptions')) {
            if (!is_object($object->deviceRenderOptions)) {
                throw new UnexpectedValueException('value \'' . print_r($object->deviceRenderOptions, true) . '\' is not an object');
            }
            $value = new DeviceRenderOptions();
            $this->deviceRenderOptions = $value->fromObject($object->deviceRenderOptions);
        }
        if (property_exists($object, 'sdkAppId')) {
            $this->sdkAppId = $object->sdkAppId;
        }
        if (property_exists($object, 'sdkEncryptedData')) {
            $this->sdkEncryptedData = $object->sdkEncryptedData;
        }
        if (property_exists($object, 'sdkEphemeralPublicKey')) {
            $this->sdkEphemeralPublicKey = $object->sdkEphemeralPublicKey;
        }
        if (property_exists($object, 'sdkMaxTimeout')) {
            $this->sdkMaxTimeout = $object->sdkMaxTimeout;
        }
        if (property_exists($object, 'sdkReferenceNumber')) {
            $this->sdkReferenceNumber = $object->sdkReferenceNumber;
        }
        if (property_exists($object, 'sdkTransactionId')) {
            $this->sdkTransactionId = $object->sdkTransactionId;
        }
        return $this;
    }
}
