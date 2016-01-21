<?php

class GCS_DeclinedRefundException extends GCS_ResponseException
{
    /**
    php * @return GCS_refund_definitions_RefundResult
     */
    public function getRefundResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('refundResult', $responseVariables)) {
            return new GCS_refund_definitions_RefundResult();
        }
        $refundResult = $responseVariables['refundResult'];
        if (!($refundResult instanceof GCS_refund_definitions_RefundResult)) {
            return new GCS_refund_definitions_RefundResult();
        }
        return $refundResult;
    }
}
