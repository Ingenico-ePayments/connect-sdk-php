<?php
class GCS_payment_definitions_NonSepaDirectDebitPaymentProduct705SpecificInput extends GCS_DataObject
{
    /**
     * @var string
     */
    public $authorisationId = null;

    /**
     * @var GCS_fei_definitions_BankAccountBban
     */
    public $bankAccountBban = null;

    /**
     * @var string
     */
    public $transactionType = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'authorisationId')) {
            $this->authorisationId = $object->authorisationId;
        }
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountBban, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'transactionType')) {
            $this->transactionType = $object->transactionType;
        }
        return $this;
    }
}
