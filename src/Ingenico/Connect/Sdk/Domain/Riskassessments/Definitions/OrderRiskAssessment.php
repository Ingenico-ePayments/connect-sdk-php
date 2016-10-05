<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AdditionalOrderInputAirlineData;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions\CustomerRiskAssessment;
use UnexpectedValueException;

/**
 * Class OrderRiskAssessment
 *
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_OrderRiskAssessment OrderRiskAssessment
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
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->additionalInput, true) . '\' is not an object');
            }
            $value = new AdditionalOrderInputAirlineData();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new CustomerRiskAssessment();
            $this->customer = $value->fromObject($object->customer);
        }
        return $this;
    }
}
