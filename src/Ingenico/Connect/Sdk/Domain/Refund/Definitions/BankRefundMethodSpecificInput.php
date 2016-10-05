<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\BankAccountBbanRefund;
use UnexpectedValueException;

/**
 * Class BankRefundMethodSpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Refund\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_BankRefundMethodSpecificInput BankRefundMethodSpecificInput
 */
class BankRefundMethodSpecificInput extends DataObject
{
    /**
     * @var BankAccountBbanRefund
     */
    public $bankAccountBban = null;

    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var string
     */
    public $countryCode = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountBban, true) . '\' is not an object');
            }
            $value = new BankAccountBbanRefund();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
        }
        return $this;
    }
}
