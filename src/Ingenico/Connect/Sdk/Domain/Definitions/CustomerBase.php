<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\CompanyInformation;
use UnexpectedValueException;

/**
 * Class CustomerBase
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CustomerBase CustomerBase
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
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'companyInformation')) {
            if (!is_object($object->companyInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->companyInformation, true) . '\' is not an object');
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
