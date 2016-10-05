<?php
namespace Ingenico\Connect\Sdk;

use UnexpectedValueException;

/**
 * Class ResponseFactory
 *
 * @package Ingenico\Connect\Sdk
 */
class ResponseFactory
{
    const MIME_APPLICATION_JSON = 'application/json';

    /**
     * @param ConnectionResponse $response
     * @param ResponseClassMap $responseClassMap
     * @param CallContext $callContext
     * @return DataObject|null
     */
    public function createResponse(
        ConnectionResponse $response,
        ResponseClassMap $responseClassMap,
        CallContext $callContext = null
    ) {
        try {
            if ($callContext) {
                $this->updateCallContext($response, $callContext);
            }
            $responseObject = $this->getResponseObject($response, $responseClassMap);
        } catch (UnexpectedValueException $e) {
            throw new InvalidResponseException($response, $e->getMessage());
        }
        return $responseObject;
    }

    /**
     * @param ConnectionResponse $response
     * @param CallContext $callContext
     */
    protected function updateCallContext(ConnectionResponse $response, CallContext $callContext)
    {
        $callContext->setIdempotenceRequestTimestamp(
            $response->getHeaderValue('X-GCS-Idempotence-Request-Timestamp')
        );
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
        $contentType = $response->getHeaderValue('Content-Type');
        if (!$contentType) {
            throw new UnexpectedValueException('Content type is missing or empty');
        }
        if ($contentType != static::MIME_APPLICATION_JSON) {
            throw new UnexpectedValueException(
                "Invalid content type; got '$contentType', expected '" . static::MIME_APPLICATION_JSON . "'"
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
            $responseClassName = '\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse';
        }
        if (!class_exists($responseClassName)) {
            throw new UnexpectedValueException("class '$responseClassName' does not exist");
        }
        $responseObject = new $responseClassName();
        if (!$responseObject instanceof DataObject) {
            throw new UnexpectedValueException("class '$responseClassName' is not a 'DataObject'");
        }
        /** @var DataObject $responseObject */
        $responseObject->fromJson($response->getBody());
        return $responseObject;
    }
}
