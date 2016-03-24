<?php
namespace GCS\fei\definitions;

use GCS\DataObject;

/**
 * Class ResultDoRiskAssessment
 *
 * @package GCS\fei\definitions
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
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
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
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->retaildecisionsCCFraudCheckOutput, true) . '\' is not an object'
                );
            }
            $value = new RetailDecisionsCCFraudCheckOutput();
            $this->retaildecisionsCCFraudCheckOutput = $value->fromObject($object->retaildecisionsCCFraudCheckOutput);
        }
        if (property_exists($object, 'validationBankAccountOutput')) {
            if (!is_object($object->validationBankAccountOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->validationBankAccountOutput, true) . '\' is not an object'
                );
            }
            $value = new ValidationBankAccountOutput();
            $this->validationBankAccountOutput = $value->fromObject($object->validationBankAccountOutput);
        }
        return $this;
    }
}
