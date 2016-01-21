<?php

class GCS_ResponseFactory
{
    const MIME_APPLICATION_JSON = 'application/json';

    /**
     * @param GCS_ConnectionResponse $response
     * @param GCS_ResponseClassMap $responseClassMap
     * @throws GCS_ReferenceException
     * @throws GCS_InvalidResponseException
     * @throws GCS_GlobalCollectException
     * @throws GCS_ApiException
     * @return GCS_DataObject|null
     */
    public function createResponse(GCS_ConnectionResponse $response, GCS_ResponseClassMap $responseClassMap)
    {
        try {
            $responseObject = $this->getResponseObject($response, $responseClassMap);
        } catch (UnexpectedValueException $e) {
            throw new GCS_InvalidResponseException($response, $e->getMessage());
        }
        if ($response->getHttpStatusCode() >= 400) {
            throw $this->createException($response->getHttpStatusCode(), $responseObject);
        }
        return $responseObject;
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
        $contentType = $response->getContentType();
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
        $responseObject->fromJson($response->getContent());
        return $responseObject;
    }

    /**
     * @param $httpStatusCode
     * @param GCS_DataObject $errorObject
     * @return GCS_DeclinedPaymentException|GCS_DeclinedPayoutException|GCS_DeclinedRefundException|GCS_ValidationException|GCS_AuthorizationException|GCS_ReferenceException|GCS_GlobalCollectException|GCS_ApiException
     */
    protected function createException($httpStatusCode, GCS_DataObject $errorObject)
    {
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
}
