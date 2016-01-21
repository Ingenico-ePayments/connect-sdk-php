<?php
class GCS_payment_definitions_RefundCardMethodSpecificOutput extends GCS_payment_definitions_RefundMethodSpecificOutput
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
