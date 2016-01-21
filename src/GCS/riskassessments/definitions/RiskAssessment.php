<?php
class GCS_riskassessments_definitions_RiskAssessment extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_FraudFields
     */
    public $fraudFields = null;

    /**
     * @var GCS_riskassessments_definitions_OrderRiskAssessment
     */
    public $order = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudFields, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new GCS_riskassessments_definitions_OrderRiskAssessment();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
