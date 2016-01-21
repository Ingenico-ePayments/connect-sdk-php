<?php
class GCS_fei_definitions_BankAccountIban extends GCS_fei_definitions_BankAccount
{
    /**
     * @var string
     */
    public $iban = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'iban')) {
            $this->iban = $object->iban;
        }
        return $this;
    }
}
