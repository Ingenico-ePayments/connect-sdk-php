<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class MandateSepaDirectDebitWithoutCreditor extends DataObject
{
    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var string
     */
    public $customerContractIdentifier = null;

    /**
     * @var Debtor
     */
    public $debtor = null;

    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var MandateApproval
     */
    public $mandateApproval = null;

    /**
     * @var string
     */
    public $preNotification = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->bankAccountIban)) {
            $object->bankAccountIban = $this->bankAccountIban->toObject();
        }
        if (!is_null($this->customerContractIdentifier)) {
            $object->customerContractIdentifier = $this->customerContractIdentifier;
        }
        if (!is_null($this->debtor)) {
            $object->debtor = $this->debtor->toObject();
        }
        if (!is_null($this->isRecurring)) {
            $object->isRecurring = $this->isRecurring;
        }
        if (!is_null($this->mandateApproval)) {
            $object->mandateApproval = $this->mandateApproval->toObject();
        }
        if (!is_null($this->preNotification)) {
            $object->preNotification = $this->preNotification;
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
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'customerContractIdentifier')) {
            $this->customerContractIdentifier = $object->customerContractIdentifier;
        }
        if (property_exists($object, 'debtor')) {
            if (!is_object($object->debtor)) {
                throw new UnexpectedValueException('value \'' . print_r($object->debtor, true) . '\' is not an object');
            }
            $value = new Debtor();
            $this->debtor = $value->fromObject($object->debtor);
        }
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'mandateApproval')) {
            if (!is_object($object->mandateApproval)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mandateApproval, true) . '\' is not an object');
            }
            $value = new MandateApproval();
            $this->mandateApproval = $value->fromObject($object->mandateApproval);
        }
        if (property_exists($object, 'preNotification')) {
            $this->preNotification = $object->preNotification;
        }
        return $this;
    }
}
