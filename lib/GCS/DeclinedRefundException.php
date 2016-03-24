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
     * @return Refund\Definitions\RefundResult
     */
    public function getRefundResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('refundResult', $responseVariables)) {
            return new Refund\Definitions\RefundResult();
        }
        $refundResult = $responseVariables['refundResult'];
        if (!($refundResult instanceof Refund\Definitions\RefundResult)) {
            return new Refund\Definitions\RefundResult();
        }
        return $refundResult;
    }
}
