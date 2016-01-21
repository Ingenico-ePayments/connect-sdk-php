<?php
class GCS_payment_definitions_RedirectPaymentProduct816SpecificInput extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_BankAccountIban
     */
    public $bankAccountIban = null;

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
        return $this;
    }
}
