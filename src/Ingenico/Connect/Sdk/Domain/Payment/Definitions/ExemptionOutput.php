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
class ExemptionOutput extends DataObject
{
    /**
     * @var string
     */
    public $exemptionRaised = null;

    /**
     * @var string
     */
    public $exemptionRejectionReason = null;

    /**
     * @var string
     */
    public $exemptionRequest = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->exemptionRaised)) {
            $object->exemptionRaised = $this->exemptionRaised;
        }
        if (!is_null($this->exemptionRejectionReason)) {
            $object->exemptionRejectionReason = $this->exemptionRejectionReason;
        }
        if (!is_null($this->exemptionRequest)) {
            $object->exemptionRequest = $this->exemptionRequest;
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
        if (property_exists($object, 'exemptionRaised')) {
            $this->exemptionRaised = $object->exemptionRaised;
        }
        if (property_exists($object, 'exemptionRejectionReason')) {
            $this->exemptionRejectionReason = $object->exemptionRejectionReason;
        }
        if (property_exists($object, 'exemptionRequest')) {
            $this->exemptionRequest = $object->exemptionRequest;
        }
        return $this;
    }
}
