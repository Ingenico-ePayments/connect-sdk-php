<?php
namespace GCS\RiskAssessments;

use GCS\DataObject;
use GCS\Fei\Definitions\ResultDoRiskAssessment;

/**
 * Class RiskAssessmentResponse
 *
 * @package GCS\RiskAssessments
 */
class RiskAssessmentResponse extends DataObject
{
    /**
     * @var ResultDoRiskAssessment[]
     */
    public $results = null;

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
        if (property_exists($object, 'results')) {
            if (!is_array($object->results) && !is_object($object->results)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->results, true) . '\' is not an array or object'
                );
            }
            $this->results = [];
            foreach ($object->results as $resultsElementObject) {
                $resultsElement = new ResultDoRiskAssessment();
                $this->results[] = $resultsElement->fromObject($resultsElementObject);
            }
        }
        return $this;
    }
}
