<?php
class GCS_payment_definitions_CashPaymentMethodSpecificOutput extends GCS_payment_definitions_AbstractPaymentMethodSpecificOutput
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
