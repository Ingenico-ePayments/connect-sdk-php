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
class RefundPaymentProduct840CustomerAccount extends DataObject
{
    /**
     * @var string
     */
    public $customerAccountStatus = null;

    /**
     * @var string
     */
    public $customerAddressStatus = null;

    /**
     * @var string
     */
    public $payerId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->customerAccountStatus)) {
            $object->customerAccountStatus = $this->customerAccountStatus;
        }
        if (!is_null($this->customerAddressStatus)) {
            $object->customerAddressStatus = $this->customerAddressStatus;
        }
        if (!is_null($this->payerId)) {
            $object->payerId = $this->payerId;
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
        if (property_exists($object, 'customerAccountStatus')) {
            $this->customerAccountStatus = $object->customerAccountStatus;
        }
        if (property_exists($object, 'customerAddressStatus')) {
            $this->customerAddressStatus = $object->customerAddressStatus;
        }
        if (property_exists($object, 'payerId')) {
            $this->payerId = $object->payerId;
        }
        return $this;
    }
}
