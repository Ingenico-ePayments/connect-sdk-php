<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Services;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Services
 */
class SettlementDetails extends DataObject
{
    /**
     * @var string
     */
    public $acquirerReferenceNumber = null;

    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var string
     */
    public $paymentId = null;

    /**
     * @var string
     */
    public $retrievalReferenceNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->acquirerReferenceNumber)) {
            $object->acquirerReferenceNumber = $this->acquirerReferenceNumber;
        }
        if (!is_null($this->amountOfMoney)) {
            $object->amountOfMoney = $this->amountOfMoney->toObject();
        }
        if (!is_null($this->paymentId)) {
            $object->paymentId = $this->paymentId;
        }
        if (!is_null($this->retrievalReferenceNumber)) {
            $object->retrievalReferenceNumber = $this->retrievalReferenceNumber;
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
        if (property_exists($object, 'acquirerReferenceNumber')) {
            $this->acquirerReferenceNumber = $object->acquirerReferenceNumber;
        }
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'paymentId')) {
            $this->paymentId = $object->paymentId;
        }
        if (property_exists($object, 'retrievalReferenceNumber')) {
            $this->retrievalReferenceNumber = $object->retrievalReferenceNumber;
        }
        return $this;
    }
}
