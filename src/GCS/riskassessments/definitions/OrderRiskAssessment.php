<?php
namespace GCS\riskassessments\definitions;

use GCS\DataObject;
use GCS\fei\definitions\AdditionalOrderInputAirlineData;
use GCS\fei\definitions\AmountOfMoney;

/**
 * Class OrderRiskAssessment
 *
 * @package GCS\riskassessments\definitions
 */
class OrderRiskAssessment extends DataObject
{
    /**
     * @var AdditionalOrderInputAirlineData
     */
    public $additionalInput = null;

    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var CustomerRiskAssessment
     */
    public $customer = null;

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
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->additionalInput, true) . '\' is not an object'
                );
            }
            $value = new AdditionalOrderInputAirlineData();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->amountOfMoney, true) . '\' is not an object'
                );
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->customer, true) . '\' is not an object'
                );
            }
            $value = new CustomerRiskAssessment();
            $this->customer = $value->fromObject($object->customer);
        }
        return $this;
    }
}
