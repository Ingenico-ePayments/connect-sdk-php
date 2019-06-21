<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Capture\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractOrderStatus;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Capture\Definitions
 */
class Capture extends AbstractOrderStatus
{
    /**
     * @var CaptureOutput
     */
    public $captureOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @var CaptureStatusOutput
     */
    public $statusOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->captureOutput)) {
            $object->captureOutput = $this->captureOutput->toObject();
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
        if (property_exists($object, 'captureOutput')) {
            if (!is_object($object->captureOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->captureOutput, true) . '\' is not an object');
            }
            $value = new CaptureOutput();
            $this->captureOutput = $value->fromObject($object->captureOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        if (property_exists($object, 'statusOutput')) {
            if (!is_object($object->statusOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->statusOutput, true) . '\' is not an object');
            }
            $value = new CaptureStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
