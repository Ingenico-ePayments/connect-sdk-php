<?php

class GCS_ResponseFactory
{
    const MIME_APPLICATION_JSON = 'application/json';

    /**
     * @param GCS_ConnectionResponse $response
     * @param GCS_ResponseClassMap $responseClassMap
     * @param GCS_CallContext $callContext
     * @return GCS_DataObject|null
     */
    public function createResponse(
        GCS_ConnectionResponse $response,
        GCS_ResponseClassMap $responseClassMap,
        GCS_CallContext $callContext = null
    ) {
        try {
            if ($callContext) {
                $this->updateCallContext($response, $callContext);
            }
            $responseObject = $this->getResponseObject($response, $responseClassMap);
        } catch (UnexpectedValueException $e) {
            throw new GCS_InvalidResponseException($response, $e->getMessage());
        }
        if ($response->getHttpStatusCode() >= 400) {
            throw $this->createException($response->getHttpStatusCode(), $responseObject, $callContext);
        }
        return $responseObject;
    }

    /**
     * @param GCS_ConnectionResponse $response
     * @param GCS_CallContext $callContext
     */
    protected function updateCallContext(GCS_ConnectionResponse $response, GCS_CallContext $callContext)
    {
        $callContext->setIdempotenceRequestTimestamp(
            $response->getHeaderValue('X-GCS-Idempotence-Request-Timestamp')
        );
    }

    /**
     * @param GCS_ConnectionResponse $response
     * @param GCS_ResponseClassMap $responseClassMap
     * @return GCS_DataObject
     */
    protected function getResponseObject(
        GCS_ConnectionResponse $response,
        GCS_ResponseClassMap $responseClassMap
    ) {
        $contentType = $response->getHeaderValue('Content-Type');
        if (!$contentType) {
            throw new UnexpectedValueException('Content type is missing or empty');
        }
        if ($contentType != self::MIME_APPLICATION_JSON) {
            throw new UnexpectedValueException(
                "Invalid content type; got '$contentType', expected '" . self::MIME_APPLICATION_JSON . "'"
            );
        }
        $httpStatusCode = $response->getHttpStatusCode();
        if (!$httpStatusCode) {
            throw new UnexpectedValueException('HTTP status code is missing');
        }
        $responseClassName = $responseClassMap->getResponseClassName($httpStatusCode);
        if (empty($responseClassName)) {
            if ($httpStatusCode < 400) {
                return null;
            }
            $responseClassName = 'GCS_errors_ErrorResponse';
        }
        if (!class_exists($responseClassName)) {
            throw new UnexpectedValueException("class '$responseClassName' does not exist");
        }
        $responseObject = new $responseClassName();
        if (!$responseObject instanceof GCS_DataObject) {
            throw new UnexpectedValueException("class '$responseClassName' is not a 'GCS_DataObject'");
        }
        /** @var GCS_DataObject $responseObject */
        $responseObject->fromJson($response->getBody());
        return $responseObject;
    }

    /**
     * @param $httpStatusCode
     * @param GCS_DataObject $errorObject
     * @param GCS_CallContext $callContext
     * @return GCS_DeclinedPaymentException|GCS_DeclinedPayoutException|GCS_DeclinedRefundException|GCS_ValidationException|GCS_AuthorizationException|GCS_ReferenceException|GCS_GlobalCollectException|GCS_ApiException
     */
    protected function createException(
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
        return $error->code == '1409';
    }
}
