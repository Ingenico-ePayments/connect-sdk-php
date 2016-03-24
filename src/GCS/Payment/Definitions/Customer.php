<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\Address;
use GCS\Fei\Definitions\CustomerBase;

/**
 * Class Customer
 *
 * @package GCS\Payment\Definitions
 */
class Customer extends CustomerBase
{
    /**
     * @var Address
     */
    public $billingAddress = null;

    /**
     * @var ContactDetails
     */
    public $contactDetails = null;

    /**
     * @var string
     */
    public $fiscalNumber = null;

    /**
     * @var string
     */
    public $locale = null;

    /**
     * @var PersonalInformation
     */
    public $personalInformation = null;

    /**
     * @var AddressPersonal
     */
    public $shippingAddress = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'billingAddress')) {
            if (!is_object($object->billingAddress)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->billingAddress, true) . '\' is not an object'
                );
            }
            $value = new Address();
            $this->billingAddress = $value->fromObject($object->billingAddress);
        }
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->contactDetails, true) . '\' is not an object'
                );
            }
            $value = new ContactDetails();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        if (property_exists($object, 'fiscalNumber')) {
            $this->fiscalNumber = $object->fiscalNumber;
        }
        if (property_exists($object, 'locale')) {
            $this->locale = $object->locale;
        }
        if (property_exists($object, 'personalInformation')) {
            if (!is_object($object->personalInformation)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->personalInformation, true) . '\' is not an object'
                );
            }
            $value = new PersonalInformation();
            $this->personalInformation = $value->fromObject($object->personalInformation);
        }
        if (property_exists($object, 'shippingAddress')) {
            if (!is_object($object->shippingAddress)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->shippingAddress, true) . '\' is not an object'
                );
            }
            $value = new AddressPersonal();
            $this->shippingAddress = $value->fromObject($object->shippingAddress);
        }
        return $this;
    }
}
