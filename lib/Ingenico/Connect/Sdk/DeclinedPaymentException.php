<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult;

/**
 * Class DeclinedPaymentException
 *
 * @package Ingenico\Connect\Sdk
 */
class DeclinedPaymentException extends ResponseException
{
    /**
     * @return CreatePaymentResult
     */
    public function getPaymentResult()
    {
        $responseVariables = get_object_vars($this->getResponse());
        if (!array_key_exists('paymentResult', $responseVariables)) {
            return new CreatePaymentResult();
        }
        $paymentResult = $responseVariables['paymentResult'];
        if (!($paymentResult instanceof CreatePaymentResult)) {
            return new CreatePaymentResult();
        }
        return $paymentResult;
    }
}
