<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class TrustlyBankAccount extends DataObject
{
    /**
     * @var string
     */
    public $accountLastDigits = null;

    /**
     * @var string
     */
    public $bankName = null;

    /**
     * @var string
     */
    public $clearinghouse = null;

    /**
     * @var string
     */
    public $personIdentificationNumber = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->accountLastDigits)) {
            $object->accountLastDigits = $this->accountLastDigits;
        }
        if (!is_null($this->bankName)) {
            $object->bankName = $this->bankName;
        }
        if (!is_null($this->clearinghouse)) {
            $object->clearinghouse = $this->clearinghouse;
        }
        if (!is_null($this->personIdentificationNumber)) {
            $object->personIdentificationNumber = $this->personIdentificationNumber;
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
        if (property_exists($object, 'accountLastDigits')) {
            $this->accountLastDigits = $object->accountLastDigits;
        }
        if (property_exists($object, 'bankName')) {
            $this->bankName = $object->bankName;
        }
        if (property_exists($object, 'clearinghouse')) {
            $this->clearinghouse = $object->clearinghouse;
        }
        if (property_exists($object, 'personIdentificationNumber')) {
            $this->personIdentificationNumber = $object->personIdentificationNumber;
        }
        return $this;
    }
}
