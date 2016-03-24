<?php
namespace GCS\riskassessments;

use GCS\fei\definitions\Card;

/**
 * Class RiskAssessmentCard
 *
 * @package GCS\riskassessments
 */
class RiskAssessmentCard extends definitions\RiskAssessment
{
    /**
     * @var Card
     */
    public $card = null;

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
        if (property_exists($object, 'card')) {
            if (!is_object($object->card)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->card, true) . '\' is not an object'
                );
            }
            $value = new Card();
            $this->card = $value->fromObject($object->card);
        }
        return $this;
    }
}
