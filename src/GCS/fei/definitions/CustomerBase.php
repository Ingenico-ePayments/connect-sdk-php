<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class CustomerBase
 *
 * @package GCS\fei\definitions
 */
class CustomerBase extends DataObject
{
    /**
     * @var CompanyInformation
     */
    public $companyInformation = null;

    /**
     * @var string
     */
    public $merchantCustomerId = null;

    /**
     * @var string
     */
    public $vatNumber = null;

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
        if (property_exists($object, 'companyInformation')) {
            if (!is_object($object->companyInformation)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->companyInformation, true) . '\' is not an object'
                );
            }
            $value = new CompanyInformation();
            $this->companyInformation = $value->fromObject($object->companyInformation);
        }
        if (property_exists($object, 'merchantCustomerId')) {
            $this->merchantCustomerId = $object->merchantCustomerId;
        }
        if (property_exists($object, 'vatNumber')) {
            $this->vatNumber = $object->vatNumber;
        }
        return $this;
    }
}
