<?php
namespace GCS;

/**
 * Class ResponseFactory
 *
 * @package GCS
 */
class ResponseFactory
{
    const MIME_APPLICATION_JSON = 'application/json';

    /**
     * @param ConnectionResponse $response
     * @param ResponseClassMap $responseClassMap
     * @throws ReferenceException
     * @throws InvalidResponseException
     * @throws GlobalCollectException
     * @throws ApiException
     * @return DataObject|null
     */
    public function createResponse(ConnectionResponse $response, ResponseClassMap $responseClassMap)
    {
        try {
            $responseObject = $this->getResponseObject($response, $responseClassMap);
        } catch (\UnexpectedValueException $e) {
            throw new InvalidResponseException($response, $e->getMessage());
        }
        if ($response->getHttpStatusCode() >= 400) {
            throw $this->createException($response->getHttpStatusCode(), $responseObject);
        }
        return $responseObject;
    }

    /**
     * @param ConnectionResponse $response
     * @param ResponseClassMap $responseClassMap
     * @return DataObject
     */
    protected function getResponseObject(
        ConnectionResponse $response,
        ResponseClassMap $responseClassMap
    ) {
        $contentType = $response->getContentType();
        if (!$contentType) {
            throw new \UnexpectedValueException('Content type is missing or empty');
        }
        if ($contentType != self::MIME_APPLICATION_JSON) {
            throw new \UnexpectedValueException(
                "Invalid content type; got '$contentType', expected '" . self::MIME_APPLICATION_JSON . "'"
            );
        }
        $httpStatusCode = $response->getHttpStatusCode();
        if (!$httpStatusCode) {
            throw new \UnexpectedValueException('HTTP status code is missing');
        }
        $responseClassName = $responseClassMap->getResponseClassName($httpStatusCode);
        if (empty($responseClassName)) {
            if ($httpStatusCode < 400) {
                return null;
            }
            $responseClassName = '\GCS\errors\ErrorResponse';
        }
        if (!class_exists($responseClassName)) {
            throw new \UnexpectedValueException("class '$responseClassName' does not exist");
        }
        $responseObject = new $responseClassName();
        if (!$responseObject instanceof DataObject) {
            throw new \UnexpectedValueException("class '$responseClassName' is not a 'DataObject'");
        }
        /** @var DataObject $responseObject */
        $responseObject->fromJson($response->getContent());
        return $responseObject;
    }

    /**
     * @param $httpStatusCode
     * @param DataObject $errorObject
     * @return DeclinedPaymentException|DeclinedPayoutException|DeclinedRefundException|ValidationException|AuthorizationException|ReferenceException|GlobalCollectException|ApiException
     */
    protected function createException($httpStatusCode, DataObject $errorObject)
    {
        if ($errorObject instanceof payment\PaymentErrorResponse && !is_null($errorObject->paymentResult)) {
            return new DeclinedPaymentException($httpStatusCode, $errorObject);
        }
        if ($errorObject instanceof payout\PayoutErrorResponse && !is_null($errorObject->payoutResult)) {
            return new DeclinedPayoutException($httpStatusCode, $errorObject);
        }
        if ($errorObject instanceof refund\RefundErrorResponse && !is_null($errorObject->refundResult)) {
            return new DeclinedRefundException($httpStatusCode, $errorObject);
        }

        if ($httpStatusCode == 400) {
            return new ValidationException($httpStatusCode, $errorObject);
        }
        if ($httpStatusCode == 403) {
            return new AuthorizationException($httpStatusCode, $errorObject);
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
}
