<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use UnexpectedValueException;

/**
 * Class TokenNonSepaDirectDebitPaymentProduct705SpecificData
 *
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_TokenNonSepaDirectDebitPaymentProduct705SpecificData TokenNonSepaDirectDebitPaymentProduct705SpecificData
 */
class TokenNonSepaDirectDebitPaymentProduct705SpecificData extends DataObject
{
    /**
     * @var string
     */
    public $authorisationId = null;

    /**
     * @var BankAccountBban
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
            $value = new BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        return $this;
    }
}
