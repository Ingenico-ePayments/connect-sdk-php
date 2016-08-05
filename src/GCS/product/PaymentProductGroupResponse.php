<?php
/**
 * class PaymentProductGroupResponse
 */
class GCS_product_PaymentProductGroupResponse extends GCS_product_definitions_PaymentProductGroup
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
