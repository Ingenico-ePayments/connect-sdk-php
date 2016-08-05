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
}
