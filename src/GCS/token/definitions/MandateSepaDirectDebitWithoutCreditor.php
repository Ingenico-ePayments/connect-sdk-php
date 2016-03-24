<?php
namespace GCS\token\definitions;

use GCS\DataObject;
use GCS\fei\definitions\BankAccountIban;

/**
 * Class MandateSepaDirectDebitWithoutCreditor
 *
 * @package GCS\token\definitions
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
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountIban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'customerContractIdentifier')) {
            $this->customerContractIdentifier = $object->customerContractIdentifier;
        }
        if (property_exists($object, 'debtor')) {
            if (!is_object($object->debtor)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->debtor, true) . '\' is not an object'
                );
            }
            $value = new Debtor();
            $this->debtor = $value->fromObject($object->debtor);
        }
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'mandateApproval')) {
            if (!is_object($object->mandateApproval)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->mandateApproval, true) . '\' is not an object'
                );
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
