<?php
namespace GCS\fei\definitions;

/**
 * Class BankAccountIban
 *
 * @package GCS\fei\definitions
 */
class BankAccountIban extends BankAccount
{
    /**
     * @var string
     */
    public $iban = null;

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
        if (property_exists($object, 'iban')) {
            $this->iban = $object->iban;
        }
        return $this;
    }
}
