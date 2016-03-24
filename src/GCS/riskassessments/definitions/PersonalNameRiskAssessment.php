<?php
namespace GCS\riskassessments\definitions;

use GCS\fei\definitions\PersonalNameBase;

/**
 * Class PersonalNameRiskAssessment
 *
 * @package GCS\riskassessments\definitions
 */
class PersonalNameRiskAssessment extends PersonalNameBase
{
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
        return $this;
    }
}
