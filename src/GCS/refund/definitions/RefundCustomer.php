<?php
class GCS_refund_definitions_RefundCustomer extends GCS_DataObject
{
    /**
     * @var GCS_payment_definitions_AddressPersonal
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
            $value = new GCS_payment_definitions_AddressPersonal();
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
        return $this;
    }
}
