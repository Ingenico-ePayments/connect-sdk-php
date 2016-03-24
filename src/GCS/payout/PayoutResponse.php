<?php
namespace GCS\payout;

/**
 * Class PayoutResponse
 *
 * @package GCS\payout
 */
class PayoutResponse extends definitions\PayoutResult
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
