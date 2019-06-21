<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Dispute\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\File\Definitions\HostedFile;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Dispute\Definitions
 */
class DisputeOutput extends DataObject
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
     * @var DisputeCreationDetail
     */
    public $creationDetails = null;

    /**
     * @var string
     */
    public $emailAddress = null;

    /**
     * @var HostedFile[]
     */
    public $files = null;

    /**
     * @var DisputeReference
     */
    public $reference = null;

    /**
     * @var string
     */
    public $replyTo = null;

    /**
     * @var string
     */
    public $requestMessage = null;

    /**
     * @var string
     */
    public $responseMessage = null;

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
        if (!is_null($this->creationDetails)) {
            $object->creationDetails = $this->creationDetails->toObject();
        }
        if (!is_null($this->emailAddress)) {
            $object->emailAddress = $this->emailAddress;
        }
        if (!is_null($this->files)) {
            $object->files = [];
            foreach ($this->files as $element) {
                if (!is_null($element)) {
                    $object->files[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->reference)) {
            $object->reference = $this->reference->toObject();
        }
        if (!is_null($this->replyTo)) {
            $object->replyTo = $this->replyTo;
        }
        if (!is_null($this->requestMessage)) {
            $object->requestMessage = $this->requestMessage;
        }
        if (!is_null($this->responseMessage)) {
            $object->responseMessage = $this->responseMessage;
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
        if (property_exists($object, 'creationDetails')) {
            if (!is_object($object->creationDetails)) {
                throw new UnexpectedValueException('value \'' . print_r($object->creationDetails, true) . '\' is not an object');
            }
            $value = new DisputeCreationDetail();
            $this->creationDetails = $value->fromObject($object->creationDetails);
        }
        if (property_exists($object, 'emailAddress')) {
            $this->emailAddress = $object->emailAddress;
        }
        if (property_exists($object, 'files')) {
            if (!is_array($object->files) && !is_object($object->files)) {
                throw new UnexpectedValueException('value \'' . print_r($object->files, true) . '\' is not an array or object');
            }
            $this->files = [];
            foreach ($object->files as $element) {
                $value = new HostedFile();
                $this->files[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'reference')) {
            if (!is_object($object->reference)) {
                throw new UnexpectedValueException('value \'' . print_r($object->reference, true) . '\' is not an object');
            }
            $value = new DisputeReference();
            $this->reference = $value->fromObject($object->reference);
        }
        if (property_exists($object, 'replyTo')) {
            $this->replyTo = $object->replyTo;
        }
        if (property_exists($object, 'requestMessage')) {
            $this->requestMessage = $object->requestMessage;
        }
        if (property_exists($object, 'responseMessage')) {
            $this->responseMessage = $object->responseMessage;
        }
        return $this;
    }
}
