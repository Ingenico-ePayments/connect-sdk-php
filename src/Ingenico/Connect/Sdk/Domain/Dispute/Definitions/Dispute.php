<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Dispute\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Dispute\Definitions
 */
class Dispute extends DataObject
{
    /**
     * @var DisputeOutput
     */
    public $disputeOutput = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $paymentId = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @var DisputeStatusOutput
     */
    public $statusOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->disputeOutput)) {
            $object->disputeOutput = $this->disputeOutput->toObject();
        }
        if (!is_null($this->id)) {
            $object->id = $this->id;
        }
        if (!is_null($this->paymentId)) {
            $object->paymentId = $this->paymentId;
        }
        if (!is_null($this->status)) {
            $object->status = $this->status;
        }
        if (!is_null($this->statusOutput)) {
            $object->statusOutput = $this->statusOutput->toObject();
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
        if (property_exists($object, 'disputeOutput')) {
            if (!is_object($object->disputeOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->disputeOutput, true) . '\' is not an object');
            }
            $value = new DisputeOutput();
            $this->disputeOutput = $value->fromObject($object->disputeOutput);
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'paymentId')) {
            $this->paymentId = $object->paymentId;
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        if (property_exists($object, 'statusOutput')) {
            if (!is_object($object->statusOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->statusOutput, true) . '\' is not an object');
            }
            $value = new DisputeStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
