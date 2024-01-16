<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 */
class TrialInformation extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoneyAfterTrial = null;

    /**
     * @var string
     */
    public $endDate = null;

    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var TrialPeriod
     */
    public $trialPeriod = null;

    /**
     * @var Frequency
     */
    public $trialPeriodRecurring = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amountOfMoneyAfterTrial)) {
            $object->amountOfMoneyAfterTrial = $this->amountOfMoneyAfterTrial->toObject();
        }
        if (!is_null($this->endDate)) {
            $object->endDate = $this->endDate;
        }
        if (!is_null($this->isRecurring)) {
            $object->isRecurring = $this->isRecurring;
        }
        if (!is_null($this->trialPeriod)) {
            $object->trialPeriod = $this->trialPeriod->toObject();
        }
        if (!is_null($this->trialPeriodRecurring)) {
            $object->trialPeriodRecurring = $this->trialPeriodRecurring->toObject();
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amountOfMoneyAfterTrial')) {
            if (!is_object($object->amountOfMoneyAfterTrial)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoneyAfterTrial, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoneyAfterTrial = $value->fromObject($object->amountOfMoneyAfterTrial);
        }
        if (property_exists($object, 'endDate')) {
            $this->endDate = $object->endDate;
        }
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'trialPeriod')) {
            if (!is_object($object->trialPeriod)) {
                throw new UnexpectedValueException('value \'' . print_r($object->trialPeriod, true) . '\' is not an object');
            }
            $value = new TrialPeriod();
            $this->trialPeriod = $value->fromObject($object->trialPeriod);
        }
        if (property_exists($object, 'trialPeriodRecurring')) {
            if (!is_object($object->trialPeriodRecurring)) {
                throw new UnexpectedValueException('value \'' . print_r($object->trialPeriodRecurring, true) . '\' is not an object');
            }
            $value = new Frequency();
            $this->trialPeriodRecurring = $value->fromObject($object->trialPeriodRecurring);
        }
        return $this;
    }
}
