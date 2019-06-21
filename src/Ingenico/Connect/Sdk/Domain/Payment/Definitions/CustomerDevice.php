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
class CustomerDevice extends DataObject
{
    /**
     * @var string
     */
    public $acceptHeader = null;

    /**
     * @var BrowserData
     */
    public $browserData = null;

    /**
     * @var string
     */
    public $defaultFormFill = null;

    /**
     * @var string
     */
    public $deviceFingerprintTransactionId = null;

    /**
     * @var string
     */
    public $ipAddress = null;

    /**
     * @var string
     */
    public $locale = null;

    /**
     * @var string
     */
    public $timezoneOffsetUtcMinutes = null;

    /**
     * @var string
     */
    public $userAgent = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->acceptHeader)) {
            $object->acceptHeader = $this->acceptHeader;
        }
        if (!is_null($this->browserData)) {
            $object->browserData = $this->browserData->toObject();
        }
        if (!is_null($this->defaultFormFill)) {
            $object->defaultFormFill = $this->defaultFormFill;
        }
        if (!is_null($this->deviceFingerprintTransactionId)) {
            $object->deviceFingerprintTransactionId = $this->deviceFingerprintTransactionId;
        }
        if (!is_null($this->ipAddress)) {
            $object->ipAddress = $this->ipAddress;
        }
        if (!is_null($this->locale)) {
            $object->locale = $this->locale;
        }
        if (!is_null($this->timezoneOffsetUtcMinutes)) {
            $object->timezoneOffsetUtcMinutes = $this->timezoneOffsetUtcMinutes;
        }
        if (!is_null($this->userAgent)) {
            $object->userAgent = $this->userAgent;
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
        if (property_exists($object, 'acceptHeader')) {
            $this->acceptHeader = $object->acceptHeader;
        }
        if (property_exists($object, 'browserData')) {
            if (!is_object($object->browserData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->browserData, true) . '\' is not an object');
            }
            $value = new BrowserData();
            $this->browserData = $value->fromObject($object->browserData);
        }
        if (property_exists($object, 'defaultFormFill')) {
            $this->defaultFormFill = $object->defaultFormFill;
        }
        if (property_exists($object, 'deviceFingerprintTransactionId')) {
            $this->deviceFingerprintTransactionId = $object->deviceFingerprintTransactionId;
        }
        if (property_exists($object, 'ipAddress')) {
            $this->ipAddress = $object->ipAddress;
        }
        if (property_exists($object, 'locale')) {
            $this->locale = $object->locale;
        }
        if (property_exists($object, 'timezoneOffsetUtcMinutes')) {
            $this->timezoneOffsetUtcMinutes = $object->timezoneOffsetUtcMinutes;
        }
        if (property_exists($object, 'userAgent')) {
            $this->userAgent = $object->userAgent;
        }
        return $this;
    }
}
