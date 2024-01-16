<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 */
class RecurringPaymentsData extends DataObject
{
    /**
     * @var Frequency
     */
    public $recurringInterval = null;

    /**
     * @var TrialInformation
     */
    public $trialInformation = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->recurringInterval)) {
            $object->recurringInterval = $this->recurringInterval->toObject();
        }
        if (!is_null($this->trialInformation)) {
            $object->trialInformation = $this->trialInformation->toObject();
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
        if (property_exists($object, 'recurringInterval')) {
            if (!is_object($object->recurringInterval)) {
                throw new UnexpectedValueException('value \'' . print_r($object->recurringInterval, true) . '\' is not an object');
            }
            $value = new Frequency();
            $this->recurringInterval = $value->fromObject($object->recurringInterval);
        }
        if (property_exists($object, 'trialInformation')) {
            if (!is_object($object->trialInformation)) {
                throw new UnexpectedValueException('value \'' . print_r($object->trialInformation, true) . '\' is not an object');
            }
            $value = new TrialInformation();
            $this->trialInformation = $value->fromObject($object->trialInformation);
        }
        return $this;
    }
}
