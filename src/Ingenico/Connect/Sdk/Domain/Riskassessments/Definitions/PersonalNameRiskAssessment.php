<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\PersonalNameBase;
use UnexpectedValueException;

/**
 * Class PersonalNameRiskAssessment
 *
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PersonalNameRiskAssessment PersonalNameRiskAssessment
 */
class PersonalNameRiskAssessment extends PersonalNameBase
{
    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        return $this;
    }
}
