<?php
/**
 * class CreatePayoutRequest
 */
class GCS_payout_CreatePayoutRequest extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var GCS_fei_definitions_BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var GCS_payout_definitions_PayoutCustomer
     */
    public $customer = null;

    /**
     * @var string
     */
    public $payoutDate = null;

    /**
     * @var string
     */
    public $payoutText = null;

    /**
     * @var GCS_payout_definitions_PayoutReferences
     */
    public $references = null;

    /**
     * @var string
     */
    public $swiftCode = null;

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
            $value = new GCS_fei_definitions_AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new GCS_payout_definitions_PayoutCustomer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'payoutDate')) {
            $this->payoutDate = $object->payoutDate;
        }
        if (property_exists($object, 'payoutText')) {
            $this->payoutText = $object->payoutText;
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new GCS_payout_definitions_PayoutReferences();
            $this->references = $value->fromObject($object->references);
        }
        if (property_exists($object, 'swiftCode')) {
            $this->swiftCode = $object->swiftCode;
        }
        return $this;
    }
}
