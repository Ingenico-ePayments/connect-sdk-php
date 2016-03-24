<?php
namespace GCS\payment;

use GCS\DataObject;

/**
 * Class ApprovePaymentRequest
 *
 * @package GCS\payment
 */
class ApprovePaymentRequest extends DataObject
{
    /**
     * @var int
     */
    public $amount = null;

    /**
     * @var definitions\ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput
     */
    public $directDebitPaymentMethodSpecificInput = null;

    /**
     * @var definitions\OrderApprovePayment
     */
    public $order = null;

    /**
     * @var definitions\ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput
     */
    public $sepaDirectDebitPaymentMethodSpecificInput = null;

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
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->directDebitPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new definitions\ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput();
            $this->directDebitPaymentMethodSpecificInput = $value->fromObject(
                $object->directDebitPaymentMethodSpecificInput
            );
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->order, true) . '\' is not an object'
                );
            }
            $value = new definitions\OrderApprovePayment();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new definitions\ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput();
            $this->sepaDirectDebitPaymentMethodSpecificInput = $value->fromObject(
                $object->sepaDirectDebitPaymentMethodSpecificInput
            );
        }
        return $this;
    }
}
