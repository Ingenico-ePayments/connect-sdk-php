<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Dispute;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Dispute
 */
class CreateDisputeRequest extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var string
     */
    public $contactPerson = null;

    /**
     * @var string
     */
    public $emailAddress = null;

    /**
     * @var string
     */
    public $replyTo = null;

    /**
     * @var string
     */
    public $requestMessage = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amountOfMoney)) {
            $object->amountOfMoney = $this->amountOfMoney->toObject();
        }
        if (!is_null($this->contactPerson)) {
            $object->contactPerson = $this->contactPerson;
        }
        if (!is_null($this->emailAddress)) {
            $object->emailAddress = $this->emailAddress;
        }
        if (!is_null($this->replyTo)) {
            $object->replyTo = $this->replyTo;
        }
        if (!is_null($this->requestMessage)) {
            $object->requestMessage = $this->requestMessage;
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
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'contactPerson')) {
            $this->contactPerson = $object->contactPerson;
        }
        if (property_exists($object, 'emailAddress')) {
            $this->emailAddress = $object->emailAddress;
        }
        if (property_exists($object, 'replyTo')) {
            $this->replyTo = $object->replyTo;
        }
        if (property_exists($object, 'requestMessage')) {
            $this->requestMessage = $object->requestMessage;
        }
        return $this;
    }
}
