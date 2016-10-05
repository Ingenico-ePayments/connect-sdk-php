<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund;

use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult;
use UnexpectedValueException;

/**
 * Class RefundResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Refund
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RefundResponse RefundResponse
 */
class RefundResponse extends RefundResult
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
