<?php
/**
 * class CreatePaymentResponse
 */
class GCS_payment_CreatePaymentResponse extends GCS_payment_definitions_CreatePaymentResult
{
    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        return $this;
    }
}
