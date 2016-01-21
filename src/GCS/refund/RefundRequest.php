<?php
/**
 * class RefundRequest
 */
class GCS_refund_RefundRequest extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_AmountOfMoney
     */
    public $amountOfMoney = null;

    /**
     * @var GCS_refund_definitions_BankRefundMethodSpecificInput
     */
    public $bankRefundMethodSpecificInput = null;

    /**
     * @var GCS_refund_definitions_RefundCustomer
     */
    public $customer = null;

    /**
     * @var string
     */
    public $refundDate = null;

    /**
     * @var GCS_refund_definitions_RefundReferences
     */
    public $refundReferences = null;

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
            $value = new GCS_fei_definitions_AmountOfMoney();
            $this->amountOfMoney = $value->fromObject($object->amountOfMoney);
        }
        if (property_exists($object, 'bankRefundMethodSpecificInput')) {
            if (!is_object($object->bankRefundMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankRefundMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_refund_definitions_BankRefundMethodSpecificInput();
            $this->bankRefundMethodSpecificInput = $value->fromObject($object->bankRefundMethodSpecificInput);
        }
        if (property_exists($object, 'customer')) {
            if (!is_object($object->customer)) {
                throw new UnexpectedValueException('value \'' . print_r($object->customer, true) . '\' is not an object');
            }
            $value = new GCS_refund_definitions_RefundCustomer();
            $this->customer = $value->fromObject($object->customer);
        }
        if (property_exists($object, 'refundDate')) {
            $this->refundDate = $object->refundDate;
        }
        if (property_exists($object, 'refundReferences')) {
            if (!is_object($object->refundReferences)) {
                throw new UnexpectedValueException('value \'' . print_r($object->refundReferences, true) . '\' is not an object');
            }
            $value = new GCS_refund_definitions_RefundReferences();
            $this->refundReferences = $value->fromObject($object->refundReferences);
        }
        return $this;
    }
}
