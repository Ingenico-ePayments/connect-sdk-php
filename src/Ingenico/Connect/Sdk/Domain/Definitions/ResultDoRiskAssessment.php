<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class ResultDoRiskAssessment extends DataObject
{
    /**
     * @var string
     */
    public $category = null;

    /**
     * @var string
     */
    public $result = null;

    /**
     * @var RetailDecisionsCCFraudCheckOutput
     */
    public $retaildecisionsCCFraudCheckOutput = null;

    /**
     * @var ValidationBankAccountOutput
     */
    public $validationBankAccountOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->category)) {
            $object->category = $this->category;
        }
        if (!is_null($this->result)) {
            $object->result = $this->result;
        }
        if (!is_null($this->retaildecisionsCCFraudCheckOutput)) {
            $object->retaildecisionsCCFraudCheckOutput = $this->retaildecisionsCCFraudCheckOutput->toObject();
        }
        if (!is_null($this->validationBankAccountOutput)) {
            $object->validationBankAccountOutput = $this->validationBankAccountOutput->toObject();
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'category')) {
            $this->category = $object->category;
        }
        if (property_exists($object, 'result')) {
            $this->result = $object->result;
        }
        if (property_exists($object, 'retaildecisionsCCFraudCheckOutput')) {
            if (!is_object($object->retaildecisionsCCFraudCheckOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->retaildecisionsCCFraudCheckOutput, true) . '\' is not an object');
            }
            $value = new RetailDecisionsCCFraudCheckOutput();
            $this->retaildecisionsCCFraudCheckOutput = $value->fromObject($object->retaildecisionsCCFraudCheckOutput);
        }
        if (property_exists($object, 'validationBankAccountOutput')) {
            if (!is_object($object->validationBankAccountOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->validationBankAccountOutput, true) . '\' is not an object');
            }
            $value = new ValidationBankAccountOutput();
            $this->validationBankAccountOutput = $value->fromObject($object->validationBankAccountOutput);
        }
        return $this;
    }
}
