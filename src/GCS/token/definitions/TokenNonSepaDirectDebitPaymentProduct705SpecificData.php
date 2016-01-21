<?php
class GCS_token_definitions_TokenNonSepaDirectDebitPaymentProduct705SpecificData extends GCS_DataObject
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
        return $this;
    }
}
