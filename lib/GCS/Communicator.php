<?php

class GCS_Communicator
{

    /** @var GCS_Connection */
    protected $connection;

    /** @var GCS_CommunicatorConfiguration */
    protected $communicatorConfiguration;

    /** @var GCS_CommunicatorLogger|null */
    protected $communicatorLogger = null;

    /** @var GCS_UuidGenerator|null */
    protected $uuidGenerator = null;

    /** @var GCS_HttpObfuscator|null */
    protected $httpObfuscator = null;

    /** @var GCS_ResponseFactory|null */
    protected $responseFactory = null;

    /** @var GCS_ResponseExceptionFactory|null */
    protected $responseExceptionFactory = null;

    /**
     * @param GCS_Connection $connection
     * @param GCS_CommunicatorConfiguration $communicatorConfiguration
     */
    public function __construct(
        GCS_Connection $connection,
        GCS_CommunicatorConfiguration $communicatorConfiguration
    ) {
        $this->connection = $connection;
        $this->communicatorConfiguration = $communicatorConfiguration;
    }

    /** @param GCS_CommunicatorLogger $communicatorLogger */
    public function enableLogging(GCS_CommunicatorLogger $communicatorLogger)
    {
        $this->communicatorLogger = $communicatorLogger;
    }

    /** */
    public function disableLogging()
    {
        $this->communicatorLogger = null;
    }

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_RequestObject|null $requestParameters
     * @param GCS_CallContext $callContext
     * @return GCS_DataObject
     * @throws Exception
     */
    public function get(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_RequestObject $requestParameters = null,
        GCS_CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('GET', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);
        $this->logRequest('GET', $relativeUriPathWithRequestParameters, $requestHeaders);
        try {
            $connectionResponse = $this->getConnection()->get(
                $this->communicatorConfiguration->getBaseUri() . $relativeUriPathWithRequestParameters,
                $requestHeaders,
                $this->communicatorConfiguration->getProxyConfiguration()
            );
        } catch (Exception $exception) {
            $this->logException($exception);
            throw $exception;
        }
        $this->logResponse($connectionResponse);
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_RequestObject $requestParameters
     * @param GCS_CallContext $callContext
     * @return GCS_DataObject
     * @throws Exception
     */
    public function delete(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_RequestObject $requestParameters = null,
        GCS_CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('DELETE', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);
        $this->logRequest('DELETE', $relativeUriPathWithRequestParameters, $requestHeaders);
        try {
            $connectionResponse = $this->getConnection()->delete(
                $this->communicatorConfiguration->getBaseUri() . $relativeUriPathWithRequestParameters,
                $requestHeaders,
                $this->communicatorConfiguration->getProxyConfiguration()
            );
        } catch (Exception $exception) {
            $this->logException($exception);
            throw $exception;
        }
        $this->logResponse($connectionResponse);
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_DataObject|null $requestBodyObject
     * @param GCS_RequestObject|null $requestParameters
     * @param GCS_CallContext $callContext
     * @return GCS_DataObject
     * @throws Exception
     */
    public function post(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_DataObject $requestBodyObject = null,
        GCS_RequestObject $requestParameters = null,
        GCS_CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('POST', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);
        $requestBody = $requestBodyObject ? $requestBodyObject->toJson() : '';
        $this->logRequest('POST', $relativeUriPathWithRequestParameters, $requestHeaders, $requestBody);
        try {
            $connectionResponse = $this->getConnection()->post(
                $this->communicatorConfiguration->getBaseUri() . $relativeUriPathWithRequestParameters,
                $requestHeaders,
                $requestBody,
                $this->communicatorConfiguration->getProxyConfiguration()
            );
        } catch (Exception $exception) {
            $this->logException($exception);
            throw $exception;
        }
        $this->logResponse($connectionResponse);
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_DataObject|null $requestBodyObject
     * @param GCS_RequestObject|null $requestParameters
     * @param GCS_CallContext $callContext
     * @return GCS_DataObject
     * @throws Exception
     */
    public function put(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_DataObject $requestBodyObject = null,
        GCS_RequestObject $requestParameters = null,
        GCS_CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('PUT', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);
        $requestBody = $requestBodyObject ? $requestBodyObject->toJson() : '';
        $this->logRequest('PUT', $relativeUriPathWithRequestParameters, $requestHeaders, $requestBody);
        try {
            $connectionResponse = $this->getConnection()->put(
                $this->communicatorConfiguration->getBaseUri() . $relativeUriPathWithRequestParameters,
                $requestHeaders,
                $requestBody,
                $this->communicatorConfiguration->getProxyConfiguration()
            );
        } catch (Exception $exception) {
            $this->logException($exception);
            throw $exception;
        }
        $this->logResponse($connectionResponse);
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @return GCS_Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param GCS_Connection $connection
     */
    public function setConnection(GCS_Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return GCS_CommunicatorConfiguration
     */
    protected function getCommunicatorConfiguration()
    {
        return $this->communicatorConfiguration;
    }

    /**
     * @param GCS_CommunicatorConfiguration
     * @return GCS_Communicator
     */
    public function setCommunicatorConfiguration(GCS_CommunicatorConfiguration $communicatorConfiguration)
    {
        $this->communicatorConfiguration = $communicatorConfiguration;
        return $this;
    }

    /**
     * @param $relativeUriPath
     * @param GCS_RequestObject|null $requestParameters
     * @return string
     * @throws Exception
     */
    protected function getRequestUri($relativeUriPath, GCS_RequestObject $requestParameters = null)
    {
        return
            $this->communicatorConfiguration->getBaseUri() .
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
    }

    /**
     * @param string $httpMethod
     * @param string $relativeUriPathWithRequestParameters
     * @param string $clientMetaInfo
     * @param GCS_CallContext $callContext
     * @return string[]
     */
    protected function getRequestHeaders(
        $httpMethod,
        $relativeUriPathWithRequestParameters,
        $clientMetaInfo = '',
        GCS_CallContext $callContext = null
    ) {
        $requestHeaderGenerator = new GCS_RequestHeaderGenerator(
            $this->communicatorConfiguration,
            $httpMethod,
            $relativeUriPathWithRequestParameters,
            $clientMetaInfo,
            $callContext
        );
        return $requestHeaderGenerator->generateRequestHeaders();
    }

    /**
     * @param $relativeUriPath
     * @param GCS_RequestObject|null $requestParameters
     * @return string
     */
    protected function getRelativeUriPathWithRequestParameters(
        $relativeUriPath,
        GCS_RequestObject $requestParameters = null
    ) {
        if (is_null($requestParameters)) {
            return $relativeUriPath;
        }
        $requestParameterObjectVars = get_object_vars($requestParameters);
        if (count($requestParameterObjectVars) == 0) {
            return $relativeUriPath;
        }
        $httpQuery = http_build_query($requestParameterObjectVars);
        // remove [0], [1] etc that are added if properties are arrays
        $httpQuery = preg_replace('/%5B[0-9]+%5D/simU', '', $httpQuery);
        return $relativeUriPath . '?' . $httpQuery;
    }

    /**
     * @param string $requestMethod
     * @param string $relativeUriPathWithRequestParameters
     * @param array $requestHeaders
     * @param string $requestBody
     */
    protected function logRequest(
        $requestMethod,
        $relativeUriPathWithRequestParameters,
        array $requestHeaders,
        $requestBody = ''
    ) {
        if ($this->communicatorLogger) {
            $this->communicatorLogger->log(sprintf(
                "Outgoing request to %s (requestId='%s')\n%s",
                $this->getCommunicatorConfiguration()->getBaseUri(),
                $this->getUuidGenerator()->generatedUuid(),
                $this->getHttpObfuscator()->getRawObfuscatedRequest(
                    $requestMethod,
                    $relativeUriPathWithRequestParameters,
                    $requestHeaders,
                    $requestBody
                )
            ));
        }
    }

    /**
     * @param GCS_ConnectionResponse
     */
    protected function logResponse(GCS_ConnectionResponse $response)
    {
        if ($this->communicatorLogger) {
            $this->communicatorLogger->log(sprintf(
                "Incoming response from %s (requestId='%s')\n%s",
                $this->getCommunicatorConfiguration()->getBaseUri(),
                $this->getUuidGenerator()->getLastGeneratedUuid(),
                $this->getHttpObfuscator()->getRawObfuscatedResponse($response)
            ));
        }
    }

    /**
     * @param Exception $exception
     */
    protected function logException(Exception $exception)
    {
        if ($this->communicatorLogger) {
            $this->communicatorLogger->logException(sprintf(
                "Error occurred while executing request to %s (requestId='%s')",
                $this->getCommunicatorConfiguration()->getBaseUri(),
                $this->getUuidGenerator()->getLastGeneratedUuid()
            ), $exception);
        }
    }

    /** @return GCS_UuidGenerator|null */
    protected function getUuidGenerator()
    {
        if (is_null($this->uuidGenerator)) {
            $this->uuidGenerator = new GCS_UuidGenerator();
        }
        return $this->uuidGenerator;
    }

    /** @return GCS_HttpObfuscator */
    public function getHttpObfuscator()
    {
        if (is_null($this->httpObfuscator)) {
            $this->httpObfuscator = new GCS_HttpObfuscator();
        }
        return $this->httpObfuscator;
    }

    /** @return GCS_ResponseFactory */
    protected function getResponseFactory()
    {
        if (is_null($this->responseFactory)) {
            $this->responseFactory = new GCS_ResponseFactory();
        }
        return $this->responseFactory;
    }

    /** @return GCS_ResponseExceptionFactory */
    protected function getResponseExceptionFactory()
    {
        if (is_null($this->responseExceptionFactory)) {
            $this->responseExceptionFactory = new GCS_ResponseExceptionFactory();
        }
        return $this->responseExceptionFactory;
    }
}
