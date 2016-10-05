<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class PaymentProduct840CustomerAccount
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProduct840CustomerAccount PaymentProduct840CustomerAccount
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
