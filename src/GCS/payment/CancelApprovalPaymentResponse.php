<?php
namespace GCS\payment;

use GCS\DataObject;

/**
 * Class CancelApprovalPaymentResponse
 *
 * @package GCS\payment
 */
class CancelApprovalPaymentResponse extends DataObject
{
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
