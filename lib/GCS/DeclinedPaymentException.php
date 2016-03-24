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
     * @return Payment\Definitions\CreatePaymentResult
     */
    public function getPaymentResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('paymentResult', $responseVariables)) {
            return new Payment\Definitions\CreatePaymentResult();
        }
        $paymentResult = $responseVariables['paymentResult'];
        if (!($paymentResult instanceof Payment\Definitions\CreatePaymentResult)) {
            return new Payment\Definitions\CreatePaymentResult();
        }
        return $paymentResult;
    }
}
