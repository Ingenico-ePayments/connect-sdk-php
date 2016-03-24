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
     * @return Payout\Definitions\PayoutResult
     */
    public function getPayoutResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('payoutResult', $responseVariables)) {
            return new Payout\Definitions\PayoutResult();
        }
        $payoutResult = $responseVariables['payoutResult'];
        if (!($payoutResult instanceof Payout\Definitions\PayoutResult)) {
            return new Payout\Definitions\PayoutResult();
        }
        return $payoutResult;
    }
}
