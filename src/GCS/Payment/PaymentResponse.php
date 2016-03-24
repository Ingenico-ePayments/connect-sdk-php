<?php
namespace GCS\Payment;

/**
 * Class PaymentResponse
 *
 * @package GCS\Payment
 */
class PaymentResponse extends Definitions\Payment
{
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
        return $this;
    }
}
