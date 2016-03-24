<?php
namespace GCS\RiskAssessments\Definitions;

use GCS\DataObject;
use GCS\Fei\Definitions\Address;
use GCS\Payment\Definitions\AddressPersonal;

/**
 * Class CustomerRiskAssessment
 *
 * @package GCS\RiskAssessments\Definitions
 */
class CustomerRiskAssessment extends DataObject
{
    /**
     * @var Address
     */
    public $billingAddress = null;

    /**
     * @var string
     */
    public $locale = null;

    /**
     * @var PersonalInformationRiskAssessment
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
        if (property_exists($object, 'locale')) {
            $this->locale = $object->locale;
        }
        if (property_exists($object, 'personalInformation')) {
            if (!is_object($object->personalInformation)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->personalInformation, true) . '\' is not an object'
                );
            }
            $value = new PersonalInformationRiskAssessment();
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
