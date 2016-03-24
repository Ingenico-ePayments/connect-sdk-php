<?php
namespace GCS\payment;

/**
 * Class PaymentResponse
 *
 * @package GCS\payment
 */
class PaymentResponse extends definitions\Payment
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
