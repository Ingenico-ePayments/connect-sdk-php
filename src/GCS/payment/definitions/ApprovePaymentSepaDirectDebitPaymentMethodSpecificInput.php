<?php
class GCS_payment_definitions_ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput extends GCS_payment_definitions_ApprovePaymentPaymentMethodSpecificInput
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
