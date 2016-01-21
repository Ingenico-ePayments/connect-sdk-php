<?php
class GCS_payout_definitions_PayoutCustomer extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_Address
     */
    public $address = null;

    /**
     * @var GCS_fei_definitions_CompanyInformation
     */
    public $companyInformation = null;

    /**
     * @var GCS_fei_definitions_ContactDetailsBase
     */
    public $contactDetails = null;

    /**
     * @var string
     */
    public $merchantCustomerId = null;

    /**
     * @var GCS_payment_definitions_PersonalName
     */
    public $name = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'address')) {
            if (!is_object($object->address)) {
                throw new UnexpectedValueException('value \'' . print_r($object->address, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_Address();
            $this->address = $value->fromObject($object->address);
        }
        if (property_exists($object, 'companyInformation')) {
            if (!is_object($object->companyInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->companyInformation, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_CompanyInformation();
            $this->companyInformation = $value->fromObject($object->companyInformation);
        }
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->contactDetails, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_ContactDetailsBase();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        if (property_exists($object, 'merchantCustomerId')) {
            $this->merchantCustomerId = $object->merchantCustomerId;
        }
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new UnexpectedValueException('value \'' . print_r($object->name, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PersonalName();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
