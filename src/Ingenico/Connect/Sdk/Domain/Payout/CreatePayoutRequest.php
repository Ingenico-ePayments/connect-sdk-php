<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payout;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\BankTransferPayoutMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\CardPayoutMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutCustomer;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutReferences;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payout
 */
class CreatePayoutRequest extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var BankAccountBban
     * @deprecated Use bankTransferPayoutMethodSpecificInput.bankAccountBban instead
     */
    public $bankAccountBban = null;

    /**
     * @var BankAccountIban
     * @deprecated Use bankTransferPayoutMethodSpecificInput.bankAccountIban instead
     */
    public $bankAccountIban = null;

    /**
     * @var BankTransferPayoutMethodSpecificInput
     */
    public $bankTransferPayoutMethodSpecificInput = null;

    /**
     * @var CardPayoutMethodSpecificInput
     */
    public $cardPayoutMethodSpecificInput = null;

    /**
     * @var PayoutCustomer
     * @deprecated Use bankTransferPayoutMethodSpecificInput.customer instead
     */
    public $customer = null;

    /**
     * @var string
     * @deprecated Use bankTransferPayoutMethodSpecificInput.payoutDate instead
     */
    public $payoutDate = null;

    /**
     * @var string
     * @deprecated Use bankTransferPayoutMethodSpecificInput.payoutText instead
     */
    public $payoutText = null;

    /**
     * @var PayoutReferences
     */
    public $references = null;

    /**
     * @var string
     * @deprecated Use bankTransferPayoutMethodSpecificInput.swiftCode instead
     */
    public $swiftCode = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new UnexpectedValueException('value \'' . print_r($object->amountOfMoney, true) . '\' is not an object');
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountBban, true) . '\' is not an object');
            }
            $value = new BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'bankTransferPayoutMethodSpecificInput')) {
            if (!is_object($object->bankTransferPayoutMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankTransferPayoutMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new BankTransferPayoutMethodSpecificInput();
            $this->bankTransferPayoutMethodSpecificInput = $value->fromObject($object->bankTransferPayoutMethodSpecificInput);
        }
        if (property_exists($object, 'cardPayoutMethodSpecificInput')) {
            if (!is_object($object->cardPayoutMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPayoutMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new CardPayoutMethodSpecificInput();
            $this->cardPayoutMethodSpecificInput = $value->fromObject($object->cardPayoutMethodSpecificInput);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new PayoutCustomer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'payoutDate')) {
            $this->payoutDate = $object->payoutDate;
        }
        if (property_exists($object, 'payoutText')) {
            $this->payoutText = $object->payoutText;
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new PayoutReferences();
            $this->references = $value->fromObject($object->references);
        }
        if (property_exists($object, 'swiftCode')) {
            $this->swiftCode = $object->swiftCode;
        }
        return $this;
    }
}
