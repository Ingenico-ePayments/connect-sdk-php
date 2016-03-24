<?php
namespace GCS\RiskAssessments\Definitions;

use GCS\DataObject;

/**
 * Class PersonalInformationRiskAssessment
 *
 * @package GCS\RiskAssessments\Definitions
 */
class PersonalInformationRiskAssessment extends DataObject
{
    /**
     * @var PersonalNameRiskAssessment
     */
    public $name = null;

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
        if (property_exists($object, 'name')) {
            if (!is_object($object->name)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->name, true) . '\' is not an object'
                );
            }
            $value = new PersonalNameRiskAssessment();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
