<?php
namespace GCS\riskassessments\definitions;

use GCS\fei\definitions\FraudFields;

/**
 * Class RiskAssessment
 *
 * @package GCS\riskassessments\definitions
 */
class RiskAssessment extends \GCS\DataObject
{
    /**
     * @var FraudFields
     */
    public $fraudFields = null;

    /**
     * @var OrderRiskAssessment
     */
    public $order = null;

    /**
     * @var int
     */
    public $paymentProductId = null;

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
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->fraudFields, true) . '\' is not an object'
                );
            }
            $value = new FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->order, true) . '\' is not an object'
                );
            }
            $value = new OrderRiskAssessment();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'paymentProductId')) {
            $this->paymentProductId = $object->paymentProductId;
        }
        return $this;
    }
}
