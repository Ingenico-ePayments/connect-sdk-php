<?php

class GCS_DeclinedPayoutException extends GCS_ResponseException
{
    /**
     * @return GCS_payout_definitions_PayoutResult
     */
    public function getPayoutResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('payoutResult', $responseVariables)) {
            return new GCS_payout_definitions_PayoutResult();
        }
        $payoutResult = $responseVariables['payoutResult'];
        if (!($payoutResult instanceof GCS_payout_definitions_PayoutResult)) {
            return new GCS_payout_definitions_PayoutResult();
        }
        return $payoutResult;
    }
}
