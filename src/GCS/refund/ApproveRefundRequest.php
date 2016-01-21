<?php
/**
 * class ApproveRefundRequest
 */
class GCS_refund_ApproveRefundRequest extends GCS_DataObject
{
    /**
     * @var int
     */
    public $amount = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        return $this;
    }
}
