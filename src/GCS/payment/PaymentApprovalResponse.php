<?php
namespace GCS\payment;

use GCS\DataObject;

/**
 * Class PaymentApprovalResponse
 *
 * @package GCS\payment
 */
class PaymentApprovalResponse extends DataObject
{
    /**
     * @var definitions\Payment
     */
    public $payment = null;

    /**
     * @var definitions\ApprovePaymentCardPaymentMethodSpecificOutput
     */
    public $paymentMethodSpecificOutput = null;

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
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->payment, true) . '\' is not an object'
                );
            }
            $value = new definitions\Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        if (property_exists($object, 'paymentMethodSpecificOutput')) {
            if (!is_object($object->paymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new definitions\ApprovePaymentCardPaymentMethodSpecificOutput();
            $this->paymentMethodSpecificOutput = $value->fromObject($object->paymentMethodSpecificOutput);
        }
        return $this;
    }
}
