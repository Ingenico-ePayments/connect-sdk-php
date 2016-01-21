<?php
/**
 * class RiskAssessmentResponse
 */
class GCS_riskassessments_RiskAssessmentResponse extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_ResultDoRiskAssessment[]
     */
    public $results = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'results')) {
            if (!is_array($object->results) && !is_object($object->results)) {
                throw new UnexpectedValueException('value \'' . print_r($object->results, true) . '\' is not an array or object');
            }
            $this->results = [];
            foreach ($object->results as $resultsElementObject) {
                $resultsElement = new GCS_fei_definitions_ResultDoRiskAssessment();
                $this->results[] = $resultsElement->fromObject($resultsElementObject);
            }
        }
        return $this;
    }
}
