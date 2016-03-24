<?php
namespace GCS\product;

/**
 * Class PaymentProductResponse
 *
 * @package GCS\product
 */
class PaymentProductResponse extends definitions\PaymentProduct
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
