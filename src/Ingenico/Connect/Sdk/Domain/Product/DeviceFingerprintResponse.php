<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product
 */
class DeviceFingerprintResponse extends DataObject
{
    /**
     * @var string
     */
    public $deviceFingerprintTransactionId = null;

    /**
     * @var string
     */
    public $html = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->deviceFingerprintTransactionId)) {
            $object->deviceFingerprintTransactionId = $this->deviceFingerprintTransactionId;
        }
        if (!is_null($this->html)) {
            $object->html = $this->html;
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
        if (property_exists($object, 'deviceFingerprintTransactionId')) {
            $this->deviceFingerprintTransactionId = $object->deviceFingerprintTransactionId;
        }
        if (property_exists($object, 'html')) {
            $this->html = $object->html;
        }
        return $this;
    }
}
