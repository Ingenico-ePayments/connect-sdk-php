<?php
namespace GCS\Payment;

/**
 * Class CreatePaymentResponse
 *
 * @package GCS\Payment
 */
class CreatePaymentResponse extends Definitions\CreatePaymentResult
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
