<?php
namespace Ingenico\Connect\Sdk;

use Exception;

/**
 * Class Communicator
 *
 * @package Ingenico\Connect\Sdk
 */
class Communicator
{
    /** @var Connection */
    private $connection;

    /** @var CommunicatorConfiguration */
    private $communicatorConfiguration;

    /** @var ResponseFactory|null */
    private $responseFactory = null;

    /** @var ResponseExceptionFactory|null */
    private $responseExceptionFactory = null;

    /**
     * @param Connection $connection
     * @param CommunicatorConfiguration $communicatorConfiguration
     */
    public function __construct(
        Connection $connection,
        CommunicatorConfiguration $communicatorConfiguration
    ) {
        $this->connection = $connection;
        $this->communicatorConfiguration = $communicatorConfiguration;
    }

    /**
     * @param CommunicatorLogger $communicatorLogger
     */
    public function enableLogging(CommunicatorLogger $communicatorLogger)
    {
        $this->connection->enableLogging($communicatorLogger);
    }

    /**
     *
     */
    public function disableLogging()
    {
        $this->connection->disableLogging();
    }

    /**
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param RequestObject|null $requestParameters
     * @param CallContext $callContext
     * @return DataObject
     * @throws Exception
     */
    public function get(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        RequestObject $requestParameters = null,
        CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('GET', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);

        $connectionResponse = $this->getConnection()->get(
            $this->communicatorConfiguration->getApiEndpoint() . $relativeUriPathWithRequestParameters,
            $requestHeaders,
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param RequestObject $requestParameters
     * @param CallContext $callContext
     * @return DataObject
     * @throws Exception
     */
    public function delete(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        RequestObject $requestParameters = null,
        CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('DELETE', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);

        $connectionResponse = $this->getConnection()->delete(
            $this->communicatorConfiguration->getApiEndpoint() . $relativeUriPathWithRequestParameters,
            $requestHeaders,
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param DataObject|null $requestBodyObject
     * @param RequestObject|null $requestParameters
     * @param CallContext $callContext
     * @return DataObject
     * @throws Exception
     */
    public function post(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        DataObject $requestBodyObject = null,
        RequestObject $requestParameters = null,
        CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('POST', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);
        $requestBody = $requestBodyObject ? $requestBodyObject->toJson() : '';

        $connectionResponse = $this->getConnection()->post(
            $this->communicatorConfiguration->getApiEndpoint() . $relativeUriPathWithRequestParameters,
            $requestHeaders,
            $requestBody,
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param DataObject|null $requestBodyObject
     * @param RequestObject|null $requestParameters
     * @param CallContext $callContext
     * @return DataObject
     * @throws Exception
     */
    public function put(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        DataObject $requestBodyObject = null,
        RequestObject $requestParameters = null,
        CallContext $callContext = null
    ) {
        $relativeUriPathWithRequestParameters =
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
        $requestHeaders =
            $this->getRequestHeaders('PUT', $relativeUriPathWithRequestParameters, $clientMetaInfo, $callContext);
        $requestBody = $requestBodyObject ? $requestBodyObject->toJson() : '';

        $connectionResponse = $this->getConnection()->put(
            $this->communicatorConfiguration->getApiEndpoint() . $relativeUriPathWithRequestParameters,
            $requestHeaders,
            $requestBody,
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        $response =
            $this->getResponseFactory()->createResponse($connectionResponse, $responseClassMap, $callContext);
        $httpStatusCode = $connectionResponse->getHttpStatusCode();
        if ($httpStatusCode >= 400) {
            throw $this->getResponseExceptionFactory()->createException($httpStatusCode, $response, $callContext);
        }
        return $response;
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param Connection $connection
     */
    public function setConnection(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return CommunicatorConfiguration
     */
    protected function getCommunicatorConfiguration()
    {
        return $this->communicatorConfiguration;
    }

    /**
     * @param CommunicatorConfiguration
     * @return Communicator
     */
    public function setCommunicatorConfiguration(CommunicatorConfiguration $communicatorConfiguration)
    {
        $this->communicatorConfiguration = $communicatorConfiguration;
        return $this;
    }

    /**
     * @param $relativeUriPath
     * @param RequestObject|null $requestParameters
     * @return string
     * @throws Exception
     */
    protected function getRequestUri($relativeUriPath, RequestObject $requestParameters = null)
    {
        return
            $this->communicatorConfiguration->getApiEndpoint() .
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
    }

    /**
     * @param string $httpMethod
     * @param string $relativeUriPathWithRequestParameters
     * @param string $clientMetaInfo
     * @param CallContext $callContext
     * @return string[]
     */
    protected function getRequestHeaders(
        $httpMethod,
        $relativeUriPathWithRequestParameters,
        $clientMetaInfo = '',
        CallContext $callContext = null
    ) {
        $requestHeaderGenerator = new RequestHeaderGenerator(
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
     * @param RequestObject|null $requestParameters
     * @return string
     */
    protected function getRelativeUriPathWithRequestParameters(
        $relativeUriPath,
        RequestObject $requestParameters = null
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

    /** @return ResponseFactory */
    protected function getResponseFactory()
    {
        if (is_null($this->responseFactory)) {
            $this->responseFactory = new ResponseFactory();
        }
        return $this->responseFactory;
    }

    /** @return ResponseExceptionFactory */
    protected function getResponseExceptionFactory()
    {
        if (is_null($this->responseExceptionFactory)) {
            $this->responseExceptionFactory = new ResponseExceptionFactory();
        }
        return $this->responseExceptionFactory;
    }
}
