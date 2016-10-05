<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use UnexpectedValueException;

/**
 * Class TokenNonSepaDirectDebitPaymentProduct707SpecificData
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_TokenNonSepaDirectDebitPaymentProduct707SpecificData TokenNonSepaDirectDebitPaymentProduct707SpecificData
 */
class TokenNonSepaDirectDebitPaymentProduct707SpecificData extends DataObject
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
        return $this;
    }
}
