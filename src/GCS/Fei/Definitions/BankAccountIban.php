<?php
namespace GCS\Fei\Definitions;

/**
 * Class BankAccountIban
 *
 * @package GCS\Fei\Definitions
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
