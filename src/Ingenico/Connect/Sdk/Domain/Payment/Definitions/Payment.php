<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractOrderStatus;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class Payment extends AbstractOrderStatus
{
    /**
     * @var HostedCheckoutSpecificOutput
     */
    public $hostedCheckoutSpecificOutput = null;

    /**
     * @var PaymentOutput
     */
    public $paymentOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @var PaymentStatusOutput
     */
    public $statusOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->hostedCheckoutSpecificOutput)) {
            $object->hostedCheckoutSpecificOutput = $this->hostedCheckoutSpecificOutput->toObject();
        }
        if (!is_null($this->paymentOutput)) {
            $object->paymentOutput = $this->paymentOutput->toObject();
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
        if (property_exists($object, 'hostedCheckoutSpecificOutput')) {
            if (!is_object($object->hostedCheckoutSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->hostedCheckoutSpecificOutput, true) . '\' is not an object');
            }
            $value = new HostedCheckoutSpecificOutput();
            $this->hostedCheckoutSpecificOutput = $value->fromObject($object->hostedCheckoutSpecificOutput);
        }
        if (property_exists($object, 'paymentOutput')) {
            if (!is_object($object->paymentOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentOutput, true) . '\' is not an object');
            }
            $value = new PaymentOutput();
            $this->paymentOutput = $value->fromObject($object->paymentOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        if (property_exists($object, 'statusOutput')) {
            if (!is_object($object->statusOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->statusOutput, true) . '\' is not an object');
            }
            $value = new PaymentStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
