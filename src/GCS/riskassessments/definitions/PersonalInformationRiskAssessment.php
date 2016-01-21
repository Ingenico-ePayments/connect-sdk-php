<?php
class GCS_riskassessments_definitions_PersonalInformationRiskAssessment extends GCS_DataObject
{
    /**
     * @var GCS_riskassessments_definitions_PersonalNameRiskAssessment
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
            $value = new GCS_riskassessments_definitions_PersonalNameRiskAssessment();
            $this->name = $value->fromObject($object->name);
        }
        return $this;
    }
}
