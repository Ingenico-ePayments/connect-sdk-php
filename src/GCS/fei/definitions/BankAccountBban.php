<?php
namespace GCS\fei\definitions;

/**
 * Class BankAccountBban
 *
 * @package GCS\fei\definitions
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
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
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
