<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult;

/**
 * Class DeclinedPayoutException
 *
 * @package Ingenico\Connect\Sdk
 */
class DeclinedPayoutException extends ResponseException
{
    /**
     * @return PayoutResult
     */
    public function getPayoutResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('payoutResult', $responseVariables)) {
            return new PayoutResult();
        }
        $payoutResult = $responseVariables['payoutResult'];
        if (!($payoutResult instanceof PayoutResult)) {
            return new PayoutResult();
        }
        return $payoutResult;
    }
}
