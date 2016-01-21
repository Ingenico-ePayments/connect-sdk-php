<?php
/**
 * class RiskAssessmentCard
 */
class GCS_riskassessments_RiskAssessmentCard extends GCS_riskassessments_definitions_RiskAssessment
{
    /**
     * @var GCS_fei_definitions_Card
     */
    public $card = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'card')) {
            if (!is_object($object->card)) {
                throw new UnexpectedValueException('value \'' . print_r($object->card, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_Card();
            $this->card = $value->fromObject($object->card);
        }
        return $this;
    }
}
