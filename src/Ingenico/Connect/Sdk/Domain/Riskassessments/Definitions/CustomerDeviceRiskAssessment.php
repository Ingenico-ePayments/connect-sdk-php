<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 */
class CustomerDeviceRiskAssessment extends DataObject
{
    /**
     * @var string
     */
    public $defaultFormFill = null;

    /**
     * @var string
     */
    public $deviceFingerprintTransactionId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->defaultFormFill)) {
            $object->defaultFormFill = $this->defaultFormFill;
        }
        if (!is_null($this->deviceFingerprintTransactionId)) {
            $object->deviceFingerprintTransactionId = $this->deviceFingerprintTransactionId;
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
        if (property_exists($object, 'defaultFormFill')) {
            $this->defaultFormFill = $object->defaultFormFill;
        }
        if (property_exists($object, 'deviceFingerprintTransactionId')) {
            $this->deviceFingerprintTransactionId = $object->deviceFingerprintTransactionId;
        }
        return $this;
    }
}
