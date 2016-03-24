<?php
namespace GCS\Payment;

use GCS\DataObject;

/**
 * Class CancelApprovalPaymentResponse
 *
 * @package GCS\Payment
 */
class CancelApprovalPaymentResponse extends DataObject
{
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
