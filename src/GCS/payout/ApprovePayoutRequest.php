<?php
/**
 * class ApprovePayoutRequest
 */
class GCS_payout_ApprovePayoutRequest extends GCS_DataObject
{
    /**
     * @var string
     */
    public $datePayout = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'datePayout')) {
            $this->datePayout = $object->datePayout;
        }
        return $this;
    }
}
