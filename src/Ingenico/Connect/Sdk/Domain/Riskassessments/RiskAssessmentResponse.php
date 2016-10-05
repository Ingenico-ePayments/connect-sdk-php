<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\ResultDoRiskAssessment;
use UnexpectedValueException;

/**
 * Class RiskAssessmentResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RiskAssessmentResponse RiskAssessmentResponse
 */
class RiskAssessmentResponse extends DataObject
{
    /**
     * @var ResultDoRiskAssessment[]
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
                $resultsElement = new ResultDoRiskAssessment();
                $this->results[] = $resultsElement->fromObject($resultsElementObject);
            }
        }
        return $this;
    }
}
