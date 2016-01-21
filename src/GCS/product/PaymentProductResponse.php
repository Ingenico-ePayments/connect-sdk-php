<?php
/**
 * class PaymentProductResponse
 */
class GCS_product_PaymentProductResponse extends GCS_product_definitions_PaymentProduct
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
