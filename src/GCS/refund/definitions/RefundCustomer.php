<?php
namespace GCS\refund\definitions;

use GCS\DataObject;
use GCS\fei\definitions\CompanyInformation;
use GCS\fei\definitions\ContactDetailsBase;
use GCS\payment\definitions\AddressPersonal;

/**
 * Class RefundCustomer
 *
 * @package GCS\refund\definitions
 */
class RefundCustomer extends DataObject
{
    /**
     * @var AddressPersonal
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
            $value = new AddressPersonal();
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
        return $this;
    }
}
