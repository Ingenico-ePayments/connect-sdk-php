<?php
namespace GCS\RiskAssessments\Definitions;

use GCS\Fei\Definitions\PersonalNameBase;

/**
 * Class PersonalNameRiskAssessment
 *
 * @package GCS\RiskAssessments\Definitions
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
