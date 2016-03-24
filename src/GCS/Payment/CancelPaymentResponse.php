<?php
namespace GCS\Payment;

use GCS\DataObject;

/**
 * Class CancelPaymentResponse
 *
 * @package GCS\Payment
 */
class CancelPaymentResponse extends DataObject
{
    /**
     * @var Definitions\CancelPaymentCardPaymentMethodSpecificOutput
     */
    public $cardPaymentMethodSpecificOutput = null;

    /**
     * @var Definitions\Payment
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
            $value = new Definitions\CancelPaymentCardPaymentMethodSpecificOutput();
            $this->cardPaymentMethodSpecificOutput = $value->fromObject($object->cardPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->payment, true) . '\' is not an object'
                );
            }
            $value = new Definitions\Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        return $this;
    }
}
