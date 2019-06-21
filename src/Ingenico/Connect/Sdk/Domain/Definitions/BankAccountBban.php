<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class BankAccountBban extends BankAccount
{
    /**
     * @var string
     */
    public $accountNumber = null;

    /**
     * @var string
     */
    public $bankCode = null;

    /**
     * @var string
     */
    public $bankName = null;

    /**
     * @var string
     */
    public $branchCode = null;

    /**
     * @var string
     */
    public $checkDigit = null;

    /**
     * @var string
     */
    public $countryCode = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->accountNumber)) {
            $object->accountNumber = $this->accountNumber;
        }
        if (!is_null($this->bankCode)) {
            $object->bankCode = $this->bankCode;
        }
        if (!is_null($this->bankName)) {
            $object->bankName = $this->bankName;
        }
        if (!is_null($this->branchCode)) {
            $object->branchCode = $this->branchCode;
        }
        if (!is_null($this->checkDigit)) {
            $object->checkDigit = $this->checkDigit;
        }
        if (!is_null($this->countryCode)) {
            $object->countryCode = $this->countryCode;
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
        if (property_exists($object, 'accountNumber')) {
            $this->accountNumber = $object->accountNumber;
        }
        if (property_exists($object, 'bankCode')) {
            $this->bankCode = $object->bankCode;
        }
        if (property_exists($object, 'bankName')) {
            $this->bankName = $object->bankName;
        }
        if (property_exists($object, 'branchCode')) {
            $this->branchCode = $object->branchCode;
        }
        if (property_exists($object, 'checkDigit')) {
            $this->checkDigit = $object->checkDigit;
        }
        if (property_exists($object, 'countryCode')) {
            $this->countryCode = $object->countryCode;
        }
        return $this;
    }
}
