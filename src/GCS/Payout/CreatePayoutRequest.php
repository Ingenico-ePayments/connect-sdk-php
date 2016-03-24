<?php
namespace GCS\Payout;

use GCS\DataObject;
use GCS\Fei\Definitions\AmountOfMoney;
use GCS\Fei\Definitions\BankAccountBban;
use GCS\Fei\Definitions\BankAccountIban;

/**
 * Class CreatePayoutRequest
 *
 * @package GCS\Payout
 */
class CreatePayoutRequest extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var BankAccountBban
     */
    public $bankAccountBban = null;

    /**
     * @var BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var Definitions\PayoutCustomer
     */
    public $customer = null;

    /**
     * @var string
     */
    public $payoutDate = null;

    /**
     * @var string
     */
    public $payoutText = null;

    /**
     * @var Definitions\PayoutReferences
     */
    public $references = null;

    /**
     * @var string
     */
    public $swiftCode = null;

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
        if (property_exists($object, 'amountOfMoney')) {
            if (!is_object($object->amountOfMoney)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->amountOfMoney, true) . '\' is not an object'
                );
            }
            $value = new AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'bankAccountBban')) {
            if (!is_object($object->bankAccountBban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountBban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountBban();
            $this->bankAccountBban = $value->fromObject($object->bankAccountBban);
        }
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankAccountIban, true) . '\' is not an object'
                );
            }
            $value = new BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->customer, true) . '\' is not an object'
                );
            }
            $value = new Definitions\PayoutCustomer();
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
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->references, true) . '\' is not an object'
                );
            }
            $value = new Definitions\PayoutReferences();
            $this->references = $value->fromObject($object->references);
        }
        if (property_exists($object, 'swiftCode')) {
            $this->swiftCode = $object->swiftCode;
        }
        return $this;
    }
}
