<?php
namespace GCS\Product;

/**
 * Class PaymentProductResponse
 *
 * @package GCS\Product
 */
class PaymentProductResponse extends Definitions\PaymentProduct
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
