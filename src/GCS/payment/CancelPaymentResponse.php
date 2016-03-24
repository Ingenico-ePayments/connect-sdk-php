<?php
namespace GCS\payment;

use GCS\DataObject;

/**
 * Class CancelPaymentResponse
 *
 * @package GCS\payment
 */
class CancelPaymentResponse extends DataObject
{
    /**
     * @var definitions\CancelPaymentCardPaymentMethodSpecificOutput
     */
    public $cardPaymentMethodSpecificOutput = null;

    /**
     * @var definitions\Payment
     */
    public $payment = null;

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
        if (property_exists($object, 'cardPaymentMethodSpecificOutput')) {
            if (!is_object($object->cardPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->cardPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new definitions\CancelPaymentCardPaymentMethodSpecificOutput();
            $this->cardPaymentMethodSpecificOutput = $value->fromObject($object->cardPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->payment, true) . '\' is not an object'
                );
            }
            $value = new definitions\Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        return $this;
    }
}
