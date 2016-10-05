<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Riskassessments;

use Ingenico\Connect\Sdk\Domain\Definitions\Card;
use Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions\RiskAssessment;
use UnexpectedValueException;

/**
 * Class RiskAssessmentCard
 *
 * @package Ingenico\Connect\Sdk\Domain\Riskassessments
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RiskAssessmentCard RiskAssessmentCard
 */
class RiskAssessmentCard extends RiskAssessment
{
    /**
     * @var Card
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
            $value = new Card();
            $this->card = $value->fromObject($object->card);
        }
        return $this;
    }
}
