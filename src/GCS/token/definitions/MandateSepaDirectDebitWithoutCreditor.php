<?php
class GCS_token_definitions_MandateSepaDirectDebitWithoutCreditor extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var string
     */
    public $customerContractIdentifier = null;

    /**
     * @var GCS_token_definitions_Debtor
     */
    public $debtor = null;

    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var GCS_token_definitions_MandateApproval
     */
    public $mandateApproval = null;

    /**
     * @var string
     */
    public $preNotification = null;

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
            $value = new GCS_fei_definitions_BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'customerContractIdentifier')) {
            $this->customerContractIdentifier = $object->customerContractIdentifier;
        }
        if (property_exists($object, 'debtor')) {
            if (!is_object($object->debtor)) {
                throw new UnexpectedValueException('value \'' . print_r($object->debtor, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_Debtor();
            $this->debtor = $value->fromObject($object->debtor);
        }
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'mandateApproval')) {
            if (!is_object($object->mandateApproval)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mandateApproval, true) . '\' is not an object');
            }
            $value = new GCS_token_definitions_MandateApproval();
            $this->mandateApproval = $value->fromObject($object->mandateApproval);
        }
        if (property_exists($object, 'preNotification')) {
            $this->preNotification = $object->preNotification;
        }
        return $this;
    }
}
