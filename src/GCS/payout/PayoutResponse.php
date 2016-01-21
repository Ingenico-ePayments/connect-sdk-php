<?php
/**
 * class PayoutResponse
 */
class GCS_payout_PayoutResponse extends GCS_payout_definitions_PayoutResult
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
