<?php
class GCS_payment_definitions_CashPaymentMethodSpecificInputBase extends GCS_fei_definitions_AbstractPaymentMethodSpecificInput
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
