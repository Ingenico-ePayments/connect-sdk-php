<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment
 */
class DeviceFingerprintDetails extends DataObject
{
    /**
     * @var string
     */
    public $paymentId = null;

    /**
     * @var string
     */
    public $rawDeviceFingerprintOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentId)) {
            $object->paymentId = $this->paymentId;
        }
        if (!is_null($this->rawDeviceFingerprintOutput)) {
            $object->rawDeviceFingerprintOutput = $this->rawDeviceFingerprintOutput;
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
        if (property_exists($object, 'paymentId')) {
            $this->paymentId = $object->paymentId;
        }
        if (property_exists($object, 'rawDeviceFingerprintOutput')) {
            $this->rawDeviceFingerprintOutput = $object->rawDeviceFingerprintOutput;
        }
        return $this;
    }
}
