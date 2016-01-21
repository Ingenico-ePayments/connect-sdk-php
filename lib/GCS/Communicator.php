<?php

class GCS_Communicator
{

    const VERSION_PREFIX = '/v1';

    /**
     * @var GCS_CommunicatorConfiguration
     */
    protected $communicatorConfiguration;

    /** @var GCS_ResponseFactory|null */
    protected $responseFactory = null;

    /**
     * @var GCS_Connection
     */
    protected $connection;

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

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_RequestObject|null $requestParameters
     * @return GCS_DataObject
     * @throws GCS_InvalidResponseException
     * @throws GCS_ResponseException
     */
    public function get(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_RequestObject $requestParameters = null
    ) {
        $response = $this->getConnection()->get(
            $this->getRequestUri($relativeUriPath, $requestParameters),
            $this->getRequestHeaders('GET', $relativeUriPath, $requestParameters, $clientMetaInfo),
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        return $this->getResponseFactory()->createResponse($response, $responseClassMap);
    }

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_RequestObject $requestParameters
     * @return GCS_DataObject
     * @throws GCS_InvalidResponseException
     * @throws GCS_ResponseException
     */
    public function delete(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_RequestObject $requestParameters = null
    ) {
        $response = $this->getConnection()->delete(
            $this->getRequestUri($relativeUriPath, $requestParameters),
            $this->getRequestHeaders('DELETE', $relativeUriPath, $requestParameters, $clientMetaInfo),
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        return $this->getResponseFactory()->createResponse($response, $responseClassMap);
    }

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_DataObject|null $body
     * @param GCS_RequestObject|null $requestParameters
     * @return GCS_DataObject
     * @throws GCS_InvalidResponseException
     * @throws GCS_ResponseException
     */
    public function post(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_DataObject $body = null,
        GCS_RequestObject $requestParameters = null
    ) {
        $response = $this->getConnection()->post(
            $this->getRequestUri($relativeUriPath, $requestParameters),
            $this->getRequestHeaders('POST', $relativeUriPath, $requestParameters, $clientMetaInfo),
            $body ? $body->toJson() : '',
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        return $this->getResponseFactory()->createResponse($response, $responseClassMap);
    }

    /**
     * @param GCS_ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param GCS_DataObject|null $body
     * @param GCS_RequestObject|null $requestParameters
     * @return GCS_DataObject
     * @throws GCS_InvalidResponseException
     * @throws GCS_ResponseException
     */
    public function put(
        GCS_ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        GCS_DataObject $body = null,
        GCS_RequestObject $requestParameters = null
    ) {
        $response = $this->getConnection()->put(
            $this->getRequestUri($relativeUriPath, $requestParameters),
            $this->getRequestHeaders('PUT', $relativeUriPath, $requestParameters, $clientMetaInfo),
            $body ? $body->toJson() : '',
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        return $this->getResponseFactory()->createResponse($response, $responseClassMap);
    }

    /**
     * @return GCS_ResponseFactory
     */
    protected function getResponseFactory()
    {
        if (is_null($this->responseFactory)) {
            $this->responseFactory = new GCS_ResponseFactory();
        }
        return $this->responseFactory;
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
     * @param string $relativeUriPath
     * @param GCS_RequestObject|null $requestParameters
     * @param string $clientMetaInfo
     * @return string[]
     */
    protected function getRequestHeaders(
        $httpMethod,
        $relativeUriPath,
        GCS_RequestObject $requestParameters = null,
        $clientMetaInfo = ''
    ) {
        $requestHeaderGenerator = new GCS_RequestHeaderGenerator(
            $this->communicatorConfiguration,
            $httpMethod,
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters),
            $clientMetaInfo
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
            return self::VERSION_PREFIX . $relativeUriPath;
        }
        $requestParameterObjectVars = get_object_vars($requestParameters);
        if (count($requestParameterObjectVars) == 0) {
            return self::VERSION_PREFIX . $relativeUriPath;
        }
        return self::VERSION_PREFIX . $relativeUriPath . '?' . http_build_query($requestParameterObjectVars);
    }
}
