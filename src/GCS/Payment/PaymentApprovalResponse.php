<?php
namespace GCS\Payment;

use GCS\DataObject;

/**
 * Class PaymentApprovalResponse
 *
 * @package GCS\Payment
 */
class PaymentApprovalResponse extends DataObject
{
    /**
     * @var Definitions\Payment
     */
    public $payment = null;

    /**
     * @var Definitions\ApprovePaymentCardPaymentMethodSpecificOutput
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
            $value = new Definitions\Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        if (property_exists($object, 'paymentMethodSpecificOutput')) {
            if (!is_object($object->paymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\ApprovePaymentCardPaymentMethodSpecificOutput();
            $this->paymentMethodSpecificOutput = $value->fromObject($object->paymentMethodSpecificOutput);
        }
        return $this;
    }
}
