<?php
namespace GCS\payout\definitions;

use GCS\DataObject;
use GCS\fei\definitions\Address;
use GCS\fei\definitions\CompanyInformation;
use GCS\fei\definitions\ContactDetailsBase;
use GCS\payment\definitions\PersonalName;

/**
 * Class PayoutCustomer
 *
 * @package GCS\payout\definitions
 */
class PayoutCustomer extends DataObject
{
    /**
     * @var Address
     */
    public $address = null;

    /**
     * @var CompanyInformation
     */
    public $companyInformation = null;

    /**
     * @var ContactDetailsBase
     */
    public $contactDetails = null;

    /**
     * @var string
     */
    public $merchantCustomerId = null;

    /**
     * @var PersonalName
     */
    public $name = null;

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
        if (property_exists($object, 'address')) {
            if (!is_object($object->address)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->address, true) . '\' is not an object'
                );
            }
            $value = new Address();
            $this->address = $value->fromObject($object->address);
        }
        if (property_exists($object, 'companyInformation')) {
            if (!is_object($object->companyInformation)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->companyInformation, true) . '\' is not an object'
                );
            }
            $value = new CompanyInformation();
            $this->companyInformation = $value->fromObject($object->companyInformation);
        }
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->contactDetails, true) . '\' is not an object'
                );
            }
            $value = new ContactDetailsBase();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        if (property_exists($object, 'merchantCustomerId')) {
            $this->merchantCustomerId = $object->merchantCustomerId;
        }
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->name, true) . '\' is not an object'
                );
            }
            $value = new PersonalName();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
