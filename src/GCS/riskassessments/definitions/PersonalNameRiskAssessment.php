<?php
class GCS_riskassessments_definitions_PersonalNameRiskAssessment extends GCS_fei_definitions_PersonalNameBase
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
