<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions\PersonalNameRiskAssessment;
use UnexpectedValueException;

/**
 * Class PersonalInformationRiskAssessment
 *
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PersonalInformationRiskAssessment PersonalInformationRiskAssessment
 */
class PersonalInformationRiskAssessment extends DataObject
{
    /**
     * @var PersonalNameRiskAssessment
     */
    public $name = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new UnexpectedValueException('value \'' . print_r($object->name, true) . '\' is not an object');
            }
            $value = new PersonalNameRiskAssessment();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
