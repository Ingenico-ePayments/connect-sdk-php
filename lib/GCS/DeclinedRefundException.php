<?php
namespace GCS;

/**
 * Class DeclinedRefundException
 *
 * @package GCS
 */
class DeclinedRefundException extends ResponseException
{
    /**
     * @return refund\definitions\RefundResult
     */
    public function getRefundResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('refundResult', $responseVariables)) {
            return new refund\definitions\RefundResult();
        }
        $refundResult = $responseVariables['refundResult'];
        if (!($refundResult instanceof refund\definitions\RefundResult)) {
            return new refund\definitions\RefundResult();
        }
        return $refundResult;
    }
}
