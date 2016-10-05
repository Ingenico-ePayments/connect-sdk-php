<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use UnexpectedValueException;

/**
 * Class NonSepaDirectDebitPaymentProduct707SpecificInput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_NonSepaDirectDebitPaymentProduct707SpecificInput NonSepaDirectDebitPaymentProduct707SpecificInput
 */
class NonSepaDirectDebitPaymentProduct707SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $addressLine1 = null;

    /**
     * @var string
     */
    public $addressLine2 = null;

    /**
     * @var string
     */
    public $addressLine3 = null;

    /**
     * @var string
     */
    public $addressLine4 = null;

    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var string
     */
    public $customerBankCity = null;

    /**
     * @var string
     */
    public $customerBankNumber = null;

    /**
     * @var string
     */
    public $customerBankStreet = null;

    /**
     * @var string
     */
    public $customerBankZip = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'addressLine1')) {
            $this->addressLine1 = $object->addressLine1;
        }
        if (property_exists($object, 'addressLine2')) {
            $this->addressLine2 = $object->addressLine2;
        }
        if (property_exists($object, 'addressLine3')) {
            $this->addressLine3 = $object->addressLine3;
        }
        if (property_exists($object, 'addressLine4')) {
            $this->addressLine4 = $object->addressLine4;
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'customerBankCity')) {
            $this->customerBankCity = $object->customerBankCity;
        }
        if (property_exists($object, 'customerBankNumber')) {
            $this->customerBankNumber = $object->customerBankNumber;
        }
        if (property_exists($object, 'customerBankStreet')) {
            $this->customerBankStreet = $object->customerBankStreet;
        }
        if (property_exists($object, 'customerBankZip')) {
            $this->customerBankZip = $object->customerBankZip;
        }
        return $this;
    }
}
