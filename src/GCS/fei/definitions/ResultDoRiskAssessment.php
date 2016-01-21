<?php
class GCS_fei_definitions_ResultDoRiskAssessment extends GCS_DataObject
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
     * @var GCS_fei_definitions_RetailDecisionsCCFraudCheckOutput
     */
    public $retaildecisionsCCFraudCheckOutput = null;

    /**
     * @var GCS_fei_definitions_ValidationBankAccountOutput
     */
    public $validationBankAccountOutput = null;

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
            $value = new GCS_fei_definitions_RetailDecisionsCCFraudCheckOutput();
            $this->retaildecisionsCCFraudCheckOutput = $value->fromObject($object->retaildecisionsCCFraudCheckOutput);
        }
        if (property_exists($object, 'validationBankAccountOutput')) {
            if (!is_object($object->validationBankAccountOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->validationBankAccountOutput, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_ValidationBankAccountOutput();
            $this->validationBankAccountOutput = $value->fromObject($object->validationBankAccountOutput);
        }
        return $this;
    }
}
