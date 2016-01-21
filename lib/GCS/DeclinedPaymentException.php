<?php

class GCS_DeclinedPaymentException extends GCS_ResponseException
{
    /**
     * @return GCS_payment_definitions_CreatePaymentResult
     */
    public function getPaymentResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('paymentResult', $responseVariables)) {
            return new GCS_payment_definitions_CreatePaymentResult();
        }
        $paymentResult = $responseVariables['paymentResult'];
        if (!($paymentResult instanceof GCS_payment_definitions_CreatePaymentResult)) {
            return new GCS_payment_definitions_CreatePaymentResult();
        }
        return $paymentResult;
    }
}
