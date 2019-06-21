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
class PaymentProduct840CustomerAccount extends DataObject
{
    /**
     * @var string
     */
    public $accountId = null;

    /**
     * @var string
     */
    public $billingAgreementId = null;

    /**
     * @var string
     */
    public $companyName = null;

    /**
     * @var string
     */
    public $contactPhone = null;

    /**
     * @var string
     */
    public $countryCode = null;

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
    public $firstName = null;

    /**
     * @var string
     */
    public $payerId = null;

    /**
     * @var string
     */
    public $surname = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->accountId)) {
            $object->accountId = $this->accountId;
        }
        if (!is_null($this->billingAgreementId)) {
            $object->billingAgreementId = $this->billingAgreementId;
        }
        if (!is_null($this->companyName)) {
            $object->companyName = $this->companyName;
        }
        if (!is_null($this->contactPhone)) {
            $object->contactPhone = $this->contactPhone;
        }
        if (!is_null($this->countryCode)) {
            $object->countryCode = $this->countryCode;
        }
        if (!is_null($this->customerAccountStatus)) {
            $object->customerAccountStatus = $this->customerAccountStatus;
        }
        if (!is_null($this->customerAddressStatus)) {
            $object->customerAddressStatus = $this->customerAddressStatus;
        }
        if (!is_null($this->firstName)) {
            $object->firstName = $this->firstName;
        }
        if (!is_null($this->payerId)) {
            $object->payerId = $this->payerId;
        }
        if (!is_null($this->surname)) {
            $object->surname = $this->surname;
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
        if (property_exists($object, 'accountId')) {
            $this->accountId = $object->accountId;
        }
        if (property_exists($object, 'billingAgreementId')) {
            $this->billingAgreementId = $object->billingAgreementId;
        }
        if (property_exists($object, 'companyName')) {
            $this->companyName = $object->companyName;
        }
        if (property_exists($object, 'contactPhone')) {
            $this->contactPhone = $object->contactPhone;
        }
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
        }
        if (property_exists($object, 'customerAccountStatus')) {
            $this->customerAccountStatus = $object->customerAccountStatus;
        }
        if (property_exists($object, 'customerAddressStatus')) {
            $this->customerAddressStatus = $object->customerAddressStatus;
        }
        if (property_exists($object, 'firstName')) {
            $this->firstName = $object->firstName;
        }
        if (property_exists($object, 'payerId')) {
            $this->payerId = $object->payerId;
        }
        if (property_exists($object, 'surname')) {
            $this->surname = $object->surname;
        }
        return $this;
    }
}
