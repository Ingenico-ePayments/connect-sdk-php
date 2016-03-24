<?php
namespace GCS;

/**
 * Class DeclinedPaymentException
 *
 * @package GCS
 */
class DeclinedPaymentException extends ResponseException
{
    /**
     * @return payment\definitions\CreatePaymentResult
     */
    public function getPaymentResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('paymentResult', $responseVariables)) {
            return new payment\definitions\CreatePaymentResult();
        }
        $paymentResult = $responseVariables['paymentResult'];
        if (!($paymentResult instanceof payment\definitions\CreatePaymentResult)) {
            return new payment\definitions\CreatePaymentResult();
        }
        return $paymentResult;
    }
}
