<?php
/**
 * class RefundResponse
 */
class GCS_refund_RefundResponse extends GCS_refund_definitions_RefundResult
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
