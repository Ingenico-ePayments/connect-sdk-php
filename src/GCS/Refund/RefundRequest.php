<?php
namespace GCS\Refund;

use GCS\DataObject;
use GCS\Fei\Definitions\AmountOfMoney;

/**
 * Class RefundRequest
 *
 * @package GCS\Refund
 */
class RefundRequest extends DataObject
{
    /**
     * @var AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var Definitions\BankRefundMethodSpecificInput
     */
    public $bankRefundMethodSpecificInput = null;

    /**
     * @var Definitions\RefundCustomer
     */
    public $customer = null;

    /**
     * @var string
     */
    public $refundDate = null;

    /**
     * @var Definitions\RefundReferences
     */
    public $refundReferences = null;

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
        if (property_exists($object, 'bankRefundMethodSpecificInput')) {
            if (!is_object($object->bankRefundMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankRefundMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\BankRefundMethodSpecificInput();
            $this->bankRefundMethodSpecificInput = $value->fromObject($object->bankRefundMethodSpecificInput);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->customer, true) . '\' is not an object'
                );
            }
            $value = new Definitions\RefundCustomer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'refundDate')) {
            $this->refundDate = $object->refundDate;
        }
        if (property_exists($object, 'refundReferences')) {
            if (!is_object($object->refundReferences)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->refundReferences, true) . '\' is not an object'
                );
            }
            $value = new Definitions\RefundReferences();
            $this->refundReferences = $value->fromObject($object->refundReferences);
        }
        return $this;
    }
}
