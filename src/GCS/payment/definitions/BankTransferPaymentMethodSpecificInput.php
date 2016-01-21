<?php
class GCS_payment_definitions_BankTransferPaymentMethodSpecificInput extends GCS_payment_definitions_BankTransferPaymentMethodSpecificInputBase
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
