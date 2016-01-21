<?php
/**
 * class PaymentResponse
 */
class GCS_payment_PaymentResponse extends GCS_payment_definitions_Payment
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
