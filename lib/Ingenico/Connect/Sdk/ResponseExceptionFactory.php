<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payout\PayoutErrorResponse;
use Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse;

/**
 * Class ResponseExceptionFactory
 *
 * @package Ingenico\Connect\Sdk
 */
class ResponseExceptionFactory
{
    const IDEMPOTENCE_ERROR_CODE = '1409';

    /**
     * @param $httpStatusCode
     * @param DataObject $errorObject
     * @param CallContext $callContext
     * @return DeclinedPaymentException
     *       | DeclinedPayoutException
     *       | DeclinedRefundException
     *       | ValidationException
     *       | AuthorizationException
     *       | ReferenceException
     *       | GlobalCollectException
     *       | ApiException
     */
    public function createException(
        $httpStatusCode,
        DataObject $errorObject,
        CallContext $callContext = null
    ) {
        if ($errorObject instanceof PaymentErrorResponse && !is_null($errorObject->paymentResult)) {
            return new DeclinedPaymentException($httpStatusCode, $errorObject);
        }
        if ($errorObject instanceof PayoutErrorResponse && !is_null($errorObject->payoutResult)) {
            return new DeclinedPayoutException($httpStatusCode, $errorObject);
        }
        if ($errorObject instanceof RefundErrorResponse && !is_null($errorObject->refundResult)) {
            return new DeclinedRefundException($httpStatusCode, $errorObject);
        }

        if ($httpStatusCode == 400) {
            return new ValidationException($httpStatusCode, $errorObject);
        }
        if ($httpStatusCode == 403) {
            return new AuthorizationException($httpStatusCode, $errorObject);
        }
        if ($httpStatusCode == 409 && $callContext && strlen($callContext->getIdempotenceKey()) > 0 &&
            $this->isIdempotenceError($errorObject)
        ) {
            return new IdempotenceException(
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
                return new ReferenceException($httpStatusCode, $errorObject);
            case 5:
                return new GlobalCollectException($httpStatusCode, $errorObject);
            default:
                return new ApiException($httpStatusCode, $errorObject);
        }
    }

    /**
     * @param DataObject $errorObject
     * @return bool
     */
    protected function isIdempotenceError(DataObject $errorObject)
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
        if (!$error instanceof APIError) {
            return false;
        }
        return $error->code == static::IDEMPOTENCE_ERROR_CODE;
    }
}
