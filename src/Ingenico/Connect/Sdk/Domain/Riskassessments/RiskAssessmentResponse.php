<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\ResultDoRiskAssessment;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments
 */
class RiskAssessmentResponse extends DataObject
{
    /**
     * @var ResultDoRiskAssessment[]
     */
    public $results = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->results)) {
            $object->results = [];
            foreach ($this->results as $element) {
                if (!is_null($element)) {
                    $object->results[] = $element->toObject();
                }
            }
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
        if (property_exists($object, 'results')) {
            if (!is_array($object->results) && !is_object($object->results)) {
                throw new UnexpectedValueException('value \'' . print_r($object->results, true) . '\' is not an array or object');
            }
            $this->results = [];
            foreach ($object->results as $element) {
                $value = new ResultDoRiskAssessment();
                $this->results[] = $value->fromObject($element);
            }
        }
        return $this;
    }
}
