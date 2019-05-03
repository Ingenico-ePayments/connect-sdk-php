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
class CustomerAccount extends DataObject
{
    /**
     * @var CustomerAccountAuthentication
     */
    public $authentication = null;

    /**
     * @var string
     */
    public $changeDate = null;

    /**
     * @var bool
     */
    public $changedDuringCheckout = null;

    /**
     * @var string
     */
    public $createDate = null;

    /**
     * @var bool
     */
    public $hadSuspiciousActivity = null;

    /**
     * @var bool
     */
    public $hasForgottenPassword = null;

    /**
     * @var bool
     */
    public $hasPassword = null;

    /**
     * @var string
     */
    public $passwordChangeDate = null;

    /**
     * @var bool
     */
    public $passwordChangedDuringCheckout = null;

    /**
     * @var PaymentAccountOnFile
     */
    public $paymentAccountOnFile = null;

    /**
     * @var string
     */
    public $paymentAccountOnFileType = null;

    /**
     * @var CustomerPaymentActivity
     */
    public $paymentActivity = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'authentication')) {
            if (!is_object($object->authentication)) {
                throw new UnexpectedValueException('value \'' . print_r($object->authentication, true) . '\' is not an object');
            }
            $value = new CustomerAccountAuthentication();
            $this->authentication = $value->fromObject($object->authentication);
        }
        if (property_exists($object, 'changeDate')) {
            $this->changeDate = $object->changeDate;
        }
        if (property_exists($object, 'changedDuringCheckout')) {
            $this->changedDuringCheckout = $object->changedDuringCheckout;
        }
        if (property_exists($object, 'createDate')) {
            $this->createDate = $object->createDate;
        }
        if (property_exists($object, 'hadSuspiciousActivity')) {
            $this->hadSuspiciousActivity = $object->hadSuspiciousActivity;
        }
        if (property_exists($object, 'hasForgottenPassword')) {
            $this->hasForgottenPassword = $object->hasForgottenPassword;
        }
        if (property_exists($object, 'hasPassword')) {
            $this->hasPassword = $object->hasPassword;
        }
        if (property_exists($object, 'passwordChangeDate')) {
            $this->passwordChangeDate = $object->passwordChangeDate;
        }
        if (property_exists($object, 'passwordChangedDuringCheckout')) {
            $this->passwordChangedDuringCheckout = $object->passwordChangedDuringCheckout;
        }
        if (property_exists($object, 'paymentAccountOnFile')) {
            if (!is_object($object->paymentAccountOnFile)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentAccountOnFile, true) . '\' is not an object');
            }
            $value = new PaymentAccountOnFile();
            $this->paymentAccountOnFile = $value->fromObject($object->paymentAccountOnFile);
        }
        if (property_exists($object, 'paymentAccountOnFileType')) {
            $this->paymentAccountOnFileType = $object->paymentAccountOnFileType;
        }
        if (property_exists($object, 'paymentActivity')) {
            if (!is_object($object->paymentActivity)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentActivity, true) . '\' is not an object');
            }
            $value = new CustomerPaymentActivity();
            $this->paymentActivity = $value->fromObject($object->paymentActivity);
        }
        return $this;
    }
}
