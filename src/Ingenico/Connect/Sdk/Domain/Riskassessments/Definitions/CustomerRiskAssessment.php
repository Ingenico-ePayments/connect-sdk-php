<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AddressPersonal;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 */
class CustomerRiskAssessment extends DataObject
{
    /**
     * @var CustomerAccountRiskAssessment
     */
    public $account = null;

    /**
     * @var string
     */
    public $accountType = null;

    /**
     * @var Address
     */
    public $billingAddress = null;

    /**
     * @var ContactDetailsRiskAssessment
     */
    public $contactDetails = null;

    /**
     * @var CustomerDeviceRiskAssessment
     */
    public $device = null;

    /**
     * @var bool
     */
    public $isPreviousCustomer = null;

    /**
     * @var string
     */
    public $locale = null;

    /**
     * @var PersonalInformationRiskAssessment
     */
    public $personalInformation = null;

    /**
     * @var AddressPersonal
     * @deprecated Use Order.shipping.address instead
     */
    public $shippingAddress = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->account)) {
            $object->account = $this->account->toObject();
        }
        if (!is_null($this->accountType)) {
            $object->accountType = $this->accountType;
        }
        if (!is_null($this->billingAddress)) {
            $object->billingAddress = $this->billingAddress->toObject();
        }
        if (!is_null($this->contactDetails)) {
            $object->contactDetails = $this->contactDetails->toObject();
        }
        if (!is_null($this->device)) {
            $object->device = $this->device->toObject();
        }
        if (!is_null($this->isPreviousCustomer)) {
            $object->isPreviousCustomer = $this->isPreviousCustomer;
        }
        if (!is_null($this->locale)) {
            $object->locale = $this->locale;
        }
        if (!is_null($this->personalInformation)) {
            $object->personalInformation = $this->personalInformation->toObject();
        }
        if (!is_null($this->shippingAddress)) {
            $object->shippingAddress = $this->shippingAddress->toObject();
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
        if (property_exists($object, 'account')) {
            if (!is_object($object->account)) {
                throw new UnexpectedValueException('value \'' . print_r($object->account, true) . '\' is not an object');
            }
            $value = new CustomerAccountRiskAssessment();
            $this->account = $value->fromObject($object->account);
        }
        if (property_exists($object, 'accountType')) {
            $this->accountType = $object->accountType;
        }
        if (property_exists($object, 'billingAddress')) {
            if (!is_object($object->billingAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->billingAddress, true) . '\' is not an object');
            }
            $value = new Address();
            $this->billingAddress = $value->fromObject($object->billingAddress);
        }
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->contactDetails, true) . '\' is not an object');
            }
            $value = new ContactDetailsRiskAssessment();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        if (property_exists($object, 'device')) {
            if (!is_object($object->device)) {
                throw new UnexpectedValueException('value \'' . print_r($object->device, true) . '\' is not an object');
            }
            $value = new CustomerDeviceRiskAssessment();
            $this->device = $value->fromObject($object->device);
        }
        if (property_exists($object, 'isPreviousCustomer')) {
            $this->isPreviousCustomer = $object->isPreviousCustomer;
        }
        if (property_exists($object, 'locale')) {
            $this->locale = $object->locale;
        }
        if (property_exists($object, 'personalInformation')) {
            if (!is_object($object->personalInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->personalInformation, true) . '\' is not an object');
            }
            $value = new PersonalInformationRiskAssessment();
            $this->personalInformation = $value->fromObject($object->personalInformation);
        }
        if (property_exists($object, 'shippingAddress')) {
            if (!is_object($object->shippingAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->shippingAddress, true) . '\' is not an object');
            }
            $value = new AddressPersonal();
            $this->shippingAddress = $value->fromObject($object->shippingAddress);
        }
        return $this;
    }
}
