<?php
namespace GCS\Refund;

/**
 * Class RefundResponse
 *
 * @package GCS\Refund
 */
class RefundResponse extends Definitions\RefundResult
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
