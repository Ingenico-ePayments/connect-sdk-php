<?php
namespace GCS;

/**
 * Class DeclinedPayoutException
 *
 * @package GCS
 */
class DeclinedPayoutException extends ResponseException
{
    /**
     * @return payout\definitions\PayoutResult
     */
    public function getPayoutResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('payoutResult', $responseVariables)) {
            return new payout\definitions\PayoutResult();
        }
        $payoutResult = $responseVariables['payoutResult'];
        if (!($payoutResult instanceof payout\definitions\PayoutResult)) {
            return new payout\definitions\PayoutResult();
        }
        return $payoutResult;
    }
}
