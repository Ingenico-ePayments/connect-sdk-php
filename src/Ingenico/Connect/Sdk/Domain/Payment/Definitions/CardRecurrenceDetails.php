<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class CardRecurrenceDetails extends DataObject
{
    /**
     * @var string
     */
    public $endDate = null;

    /**
     * @var int
     */
    public $minFrequency = null;

    /**
     * @var string
     */
    public $recurringPaymentSequenceIndicator = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->endDate)) {
            $object->endDate = $this->endDate;
        }
        if (!is_null($this->minFrequency)) {
            $object->minFrequency = $this->minFrequency;
        }
        if (!is_null($this->recurringPaymentSequenceIndicator)) {
            $object->recurringPaymentSequenceIndicator = $this->recurringPaymentSequenceIndicator;
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
        if (property_exists($object, 'endDate')) {
            $this->endDate = $object->endDate;
        }
        if (property_exists($object, 'minFrequency')) {
            $this->minFrequency = $object->minFrequency;
        }
        if (property_exists($object, 'recurringPaymentSequenceIndicator')) {
            $this->recurringPaymentSequenceIndicator = $object->recurringPaymentSequenceIndicator;
        }
        return $this;
    }
}
