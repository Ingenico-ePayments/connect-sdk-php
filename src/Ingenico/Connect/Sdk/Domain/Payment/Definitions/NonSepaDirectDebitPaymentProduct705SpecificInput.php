<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class NonSepaDirectDebitPaymentProduct705SpecificInput extends DataObject
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
     * @var string
     */
    public $transactionType = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->authorisationId)) {
            $object->authorisationId = $this->authorisationId;
        }
        if (!is_null($this->bankAccountBban)) {
            $object->bankAccountBban = $this->bankAccountBban->toObject();
        }
        if (!is_null($this->transactionType)) {
            $object->transactionType = $this->transactionType;
        }
        return $object;
    }

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
        if (property_exists($object, 'transactionType')) {
            $this->transactionType = $object->transactionType;
        }
        return $this;
    }
}
