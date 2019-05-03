<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class FraudFields extends DataObject
{
    /**
     * @var bool
     * @deprecated For risk assessments there is no replacement. For other calls, use Order.shipping.addressIndicator instead
     */
    public $addressesAreIdentical = null;

    /**
     * @var string
     */
    public $blackListData = null;

    /**
     * @var Address
     * @deprecated This should be the same as Order.customer.billingAddress
     */
    public $cardOwnerAddress = null;

    /**
     * @var string
     */
    public $customerIpAddress = null;

    /**
     * @var string
     * @deprecated Use Order.customer.device.defaultFormFill instead
     */
    public $defaultFormFill = null;

    /**
     * @var bool
     * @deprecated No replacement
     */
    public $deviceFingerprintActivated = null;

    /**
     * @var string
     * @deprecated Use Order.customer.device.deviceFingerprintTransactionId instead
     */
    public $deviceFingerprintTransactionId = null;

    /**
     * @var string
     */
    public $giftCardType = null;

    /**
     * @var string
     */
    public $giftMessage = null;

    /**
     * @var bool
     * @deprecated Use Order.customer.account.hasForgottenPassword instead
     */
    public $hasForgottenPwd = null;

    /**
     * @var bool
     * @deprecated Use Order.customer.account.hasPassword instead
     */
    public $hasPassword = null;

    /**
     * @var bool
     * @deprecated Use Order.customer.isPreviousCustomer instead
     */
    public $isPreviousCustomer = null;

    /**
     * @var string
     */
    public $orderTimezone = null;

    /**
     * @var string
     * @deprecated Use Order.shipping.comments instead
     */
    public $shipComments = null;

    /**
     * @var string
     * @deprecated Use Order.shipping.trackingNumber instead
     */
    public $shipmentTrackingNumber = null;

    /**
     * @var FraudFieldsShippingDetails
     * @deprecated No replacement
     */
    public $shippingDetails = null;

    /**
     * @var string[]
     */
    public $userData = null;

    /**
     * @var string
     * @deprecated Use Merchant.websiteUrl instead
     */
    public $website = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'addressesAreIdentical')) {
            $this->addressesAreIdentical = $object->addressesAreIdentical;
        }
        if (property_exists($object, 'blackListData')) {
            $this->blackListData = $object->blackListData;
        }
        if (property_exists($object, 'cardOwnerAddress')) {
            if (!is_object($object->cardOwnerAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardOwnerAddress, true) . '\' is not an object');
            }
            $value = new Address();
            $this->cardOwnerAddress = $value->fromObject($object->cardOwnerAddress);
        }
        if (property_exists($object, 'customerIpAddress')) {
            $this->customerIpAddress = $object->customerIpAddress;
        }
        if (property_exists($object, 'defaultFormFill')) {
            $this->defaultFormFill = $object->defaultFormFill;
        }
        if (property_exists($object, 'deviceFingerprintActivated')) {
            $this->deviceFingerprintActivated = $object->deviceFingerprintActivated;
        }
        if (property_exists($object, 'deviceFingerprintTransactionId')) {
            $this->deviceFingerprintTransactionId = $object->deviceFingerprintTransactionId;
        }
        if (property_exists($object, 'giftCardType')) {
            $this->giftCardType = $object->giftCardType;
        }
        if (property_exists($object, 'giftMessage')) {
            $this->giftMessage = $object->giftMessage;
        }
        if (property_exists($object, 'hasForgottenPwd')) {
            $this->hasForgottenPwd = $object->hasForgottenPwd;
        }
        if (property_exists($object, 'hasPassword')) {
            $this->hasPassword = $object->hasPassword;
        }
        if (property_exists($object, 'isPreviousCustomer')) {
            $this->isPreviousCustomer = $object->isPreviousCustomer;
        }
        if (property_exists($object, 'orderTimezone')) {
            $this->orderTimezone = $object->orderTimezone;
        }
        if (property_exists($object, 'shipComments')) {
            $this->shipComments = $object->shipComments;
        }
        if (property_exists($object, 'shipmentTrackingNumber')) {
            $this->shipmentTrackingNumber = $object->shipmentTrackingNumber;
        }
        if (property_exists($object, 'shippingDetails')) {
            if (!is_object($object->shippingDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->shippingDetails, true) . '\' is not an object');
            }
            $value = new FraudFieldsShippingDetails();
            $this->shippingDetails = $value->fromObject($object->shippingDetails);
        }
        if (property_exists($object, 'userData')) {
            if (!is_array($object->userData) && !is_object($object->userData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->userData, true) . '\' is not an array or object');
            }
            $this->userData = [];
            foreach ($object->userData as $userDataElementObject) {
                $this->userData[] = $userDataElementObject;
            }
        }
        if (property_exists($object, 'website')) {
            $this->website = $object->website;
        }
        return $this;
    }
}
