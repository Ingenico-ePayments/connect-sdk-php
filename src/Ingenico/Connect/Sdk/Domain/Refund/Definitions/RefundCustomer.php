<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\CompanyInformation;
use Ingenico\Connect\Sdk\Domain\Definitions\ContactDetailsBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AddressPersonal;
use UnexpectedValueException;

/**
 * Class RefundCustomer
 *
 * @package Ingenico\Connect\Sdk\Domain\Refund\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RefundCustomer RefundCustomer
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
            $value = new AddressPersonal();
            $this->address = $value->fromObject($object->address);
        }
        if (property_exists($object, 'companyInformation')) {
            if (!is_object($object->companyInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->companyInformation, true) . '\' is not an object');
            }
            $value = new CompanyInformation();
            $this->companyInformation = $value->fromObject($object->companyInformation);
        }
        if (property_exists($object, 'contactDetails')) {
            if (!is_object($object->contactDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->contactDetails, true) . '\' is not an object');
            }
            $value = new ContactDetailsBase();
            $this->contactDetails = $value->fromObject($object->contactDetails);
        }
        return $this;
    }
}
