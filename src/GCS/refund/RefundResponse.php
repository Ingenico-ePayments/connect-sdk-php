<?php
namespace GCS\refund;

/**
 * Class RefundResponse
 *
 * @package GCS\refund
 */
class RefundResponse extends definitions\RefundResult
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
