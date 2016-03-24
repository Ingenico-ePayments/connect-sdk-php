<?php
namespace GCS\Payout;

/**
 * Class PayoutResponse
 *
 * @package GCS\Payout
 */
class PayoutResponse extends Definitions\PayoutResult
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
