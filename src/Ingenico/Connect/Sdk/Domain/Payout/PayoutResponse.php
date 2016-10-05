<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payout;

use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult;
use UnexpectedValueException;

/**
 * Class PayoutResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Payout
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PayoutResponse PayoutResponse
 */
class PayoutResponse extends PayoutResult
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
