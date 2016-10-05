<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\BankAccount;
use UnexpectedValueException;

/**
 * Class BankAccountIban
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_BankAccountIban BankAccountIban
 */
class BankAccountIban extends BankAccount
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
