<?php
class GCS_payment_definitions_Customer extends GCS_fei_definitions_CustomerBase
{
    /**
     * @var GCS_fei_definitions_Address
     */
    public $billingAddress = null;

    /**
     * @var GCS_payment_definitions_ContactDetails
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
     * @var GCS_payment_definitions_PersonalInformation
     */
    public $personalInformation = null;

    /**
     * @var GCS_payment_definitions_AddressPersonal
     */
    public $shippingAddress = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'billingAddress')) {
            if (!is_object($object->billingAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->billingAddress, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_Address();
            $this->billingAddress = $value->fromObject($object->billingAddress);
        }
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->contactDetails, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_ContactDetails();
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
                throw new UnexpectedValueException('value \'' . print_r($object->personalInformation, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PersonalInformation();
            $this->personalInformation = $value->fromObject($object->personalInformation);
        }
        if (property_exists($object, 'shippingAddress')) {
            if (!is_object($object->shippingAddress)) {
                throw new UnexpectedValueException('value \'' . print_r($object->shippingAddress, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_AddressPersonal();
            $this->shippingAddress = $value->fromObject($object->shippingAddress);
        }
        return $this;
    }
}
