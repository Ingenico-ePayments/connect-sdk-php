<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions\CreatedPaymentOutput;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout
 */
class GetHostedCheckoutResponse extends DataObject
{
    /**
     * @var CreatedPaymentOutput
     */
    public $createdPaymentOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->createdPaymentOutput)) {
            $object->createdPaymentOutput = $this->createdPaymentOutput->toObject();
        }
        if (!is_null($this->status)) {
            $object->status = $this->status;
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
        if (property_exists($object, 'createdPaymentOutput')) {
            if (!is_object($object->createdPaymentOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->createdPaymentOutput, true) . '\' is not an object');
            }
            $value = new CreatedPaymentOutput();
            $this->createdPaymentOutput = $value->fromObject($object->createdPaymentOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        return $this;
    }
}
