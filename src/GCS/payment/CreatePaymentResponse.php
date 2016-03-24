<?php
namespace GCS\payment;

/**
 * Class CreatePaymentResponse
 *
 * @package GCS\payment
 */
class CreatePaymentResponse extends definitions\CreatePaymentResult
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
