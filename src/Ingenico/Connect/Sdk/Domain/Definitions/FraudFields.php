<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class FraudFields
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_FraudFields FraudFields
 */
class FraudFields extends DataObject
{
    /**
     * @var string
     */
    public $customerIpAddress = null;

    /**
     * @var string
     */
    public $defaultFormFill = null;

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
     */
    public $hasForgottenPwd = null;

    /**
     * @var bool
     */
    public $hasPassword = null;

    /**
     * @var bool
     */
    public $isPreviousCustomer = null;

    /**
     * @var string
     */
    public $orderTimezone = null;

    /**
     * @var string
     */
    public $shipComments = null;

    /**
     * @var string
     */
    public $shipmentTrackingNumber = null;

    /**
     * @var string[]
     */
    public $userData = null;

    /**
     * @var string
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
        if (property_exists($object, 'customerIpAddress')) {
            $this->customerIpAddress = $object->customerIpAddress;
        }
        if (property_exists($object, 'defaultFormFill')) {
            $this->defaultFormFill = $object->defaultFormFill;
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
