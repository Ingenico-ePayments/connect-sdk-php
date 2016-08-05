<?php

class GCS_ResponseExceptionFactory
{
    const IDEMPOTENCE_ERROR_CODE = '1409';

    /**
     * @param $httpStatusCode
     * @param GCS_DataObject $errorObject
     * @param GCS_CallContext $callContext
     * @return GCS_DeclinedPaymentException
     *       | GCS_DeclinedPayoutException
     *       | GCS_DeclinedRefundException
     *       | GCS_ValidationException
     *       | GCS_AuthorizationException
     *       | GCS_ReferenceException
     *       | GCS_GlobalCollectException
     *       | GCS_ApiException
     */
    public function createException(
        $httpStatusCode,
        GCS_DataObject $errorObject,
        GCS_CallContext $callContext = null
    ) {
        if ($errorObject instanceof GCS_payment_PaymentErrorResponse && !is_null($errorObject->paymentResult)) {
            return new GCS_DeclinedPaymentException($httpStatusCode, $errorObject);
        }
        if ($errorObject instanceof GCS_payout_PayoutErrorResponse && !is_null($errorObject->payoutResult)) {
            return new GCS_DeclinedPayoutException($httpStatusCode, $errorObject);
        }
        if ($errorObject instanceof GCS_refund_RefundErrorResponse && !is_null($errorObject->refundResult)) {
            return new GCS_DeclinedRefundException($httpStatusCode, $errorObject);
        }

        if ($httpStatusCode == 400) {
            return new GCS_ValidationException($httpStatusCode, $errorObject);
        }
        if ($httpStatusCode == 403) {
            return new GCS_AuthorizationException($httpStatusCode, $errorObject);
        }
        if ($httpStatusCode == 409 && $callContext && strlen($callContext->getIdempotenceKey()) > 0 &&
            $this->isIdempotenceError($errorObject)
        ) {
            return new GCS_IdempotenceException(
                $httpStatusCode,
                $errorObject,
                null,
                $callContext->getIdempotenceKey(),
                $callContext->getIdempotenceRequestTimestamp()
            );
        }

        $httpClassCode = floor($httpStatusCode / 100);
        // If a different HTTP status code was sent, then either the user made an error, or the server is in trouble.
        // If the user made an error, the server will give class 4 response. If the server made an error and realises
        // this, it will send an appropriate error message with a class 5 response. It should not be sending other
        // status codes; if it does, we raise an UnexpectedResponseException to signal this.
        switch ($httpClassCode) {
            case 4:
                return new GCS_ReferenceException($httpStatusCode, $errorObject);
            case 5:
                return new GCS_GlobalCollectException($httpStatusCode, $errorObject);
            default:
                return new GCS_ApiException($httpStatusCode, $errorObject);
        }
    }

    /**
     * @param GCS_DataObject $errorObject
     * @return bool
     */
    protected function isIdempotenceError(GCS_DataObject $errorObject)
    {
        $errorObjectVariables = get_object_vars($errorObject);
        if (!array_key_exists('errors', $errorObjectVariables)) {
            return false;
        }
        $errors = $errorObjectVariables['errors'];
        if (!is_array($errors)) {
            return false;
        }
        if (count($errors) != 1) {
            return false;
        }
        $error = $errors[0];
        if (!$error instanceof GCS_errors_definitions_APIError) {
            return false;
        }
        return $error->code == static::IDEMPOTENCE_ERROR_CODE;
    }
}
