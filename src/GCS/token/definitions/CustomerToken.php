<?php
namespace GCS\token\definitions;

use GCS\fei\definitions\Address;
use GCS\fei\definitions\CustomerBase;

/**
 * Class CustomerToken
 *
 * @package GCS\token\definitions
 */
class CustomerToken extends CustomerBase
{
    /**
     * @var Address
     */
    public $billingAddress = null;

    /**
     * @var PersonalInformationToken
     */
    public $personalInformation = null;

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
        if (property_exists($object, 'personalInformation')) {
            if (!is_object($object->personalInformation)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->personalInformation, true) . '\' is not an object'
                );
            }
            $value = new PersonalInformationToken();
            $this->personalInformation = $value->fromObject($object->personalInformation);
        }
        return $this;
    }
}
