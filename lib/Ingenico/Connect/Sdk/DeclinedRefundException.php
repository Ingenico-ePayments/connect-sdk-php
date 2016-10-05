<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult;

/**
 * Class DeclinedRefundException
 *
 * @package Ingenico\Connect\Sdk
 */
class DeclinedRefundException extends ResponseException
{
    /**
    php * @return RefundResult
     */
    public function getRefundResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('refundResult', $responseVariables)) {
            return new RefundResult();
        }
        $refundResult = $responseVariables['refundResult'];
        if (!($refundResult instanceof RefundResult)) {
            return new RefundResult();
        }
        return $refundResult;
    }
}
