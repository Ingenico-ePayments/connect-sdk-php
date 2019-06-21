<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\FraudFields;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 */
class RiskAssessment extends DataObject
{
    /**
     * @var FraudFields
     */
    public $fraudFields = null;

    /**
     * @var MerchantRiskAssessment
     */
    public $merchant = null;

    /**
     * @var OrderRiskAssessment
     */
    public $order = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->fraudFields)) {
            $object->fraudFields = $this->fraudFields->toObject();
        }
        if (!is_null($this->merchant)) {
            $object->merchant = $this->merchant->toObject();
        }
        if (!is_null($this->order)) {
            $object->order = $this->order->toObject();
        }
        if (!is_null($this->paymentProductId)) {
            $object->paymentProductId = $this->paymentProductId;
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
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudFields, true) . '\' is not an object');
            }
            $value = new FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'merchant')) {
            if (!is_object($object->merchant)) {
                throw new UnexpectedValueException('value \'' . print_r($object->merchant, true) . '\' is not an object');
            }
            $value = new MerchantRiskAssessment();
            $this->merchant = $value->fromObject($object->merchant);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new OrderRiskAssessment();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
