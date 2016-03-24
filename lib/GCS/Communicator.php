<?php
namespace GCS;

/**
 * Class Communicator
 *
 * @package GCS
 */
class Communicator
{

    const VERSION_PREFIX = '/v1';

    /**
     * @var CommunicatorConfiguration
     */
    protected $communicatorConfiguration;

    /** @var ResponseFactory|null */
    protected $responseFactory = null;

    /**
     * @var Connection
     */
    protected $connection;

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
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param RequestObject|null $requestParameters
     *
     * @return DataObject
     *
     * @throws InvalidResponseException
     * @throws ResponseException
     */
    public function get(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        RequestObject $requestParameters = null
    ) {
        $response = $this->getConnection()->get(
            $this->getRequestUri($relativeUriPath, $requestParameters),
            $this->getRequestHeaders('GET', $relativeUriPath, $requestParameters, $clientMetaInfo),
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        return $this->getResponseFactory()->createResponse($response, $responseClassMap);
    }

    /**
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param RequestObject $requestParameters
     *
     * @return DataObject
     *
     * @throws InvalidResponseException
     * @throws ResponseException
     */
    public function delete(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        RequestObject $requestParameters = null
    ) {
        $response = $this->getConnection()->delete(
            $this->getRequestUri($relativeUriPath, $requestParameters),
            $this->getRequestHeaders('DELETE', $relativeUriPath, $requestParameters, $clientMetaInfo),
            $this->communicatorConfiguration->getProxyConfiguration()
        );
        return $this->getResponseFactory()->createResponse($response, $responseClassMap);
    }

    /**
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param DataObject|null $body
     * @param RequestObject|null $requestParameters
     *
     * @return DataObject
     *
     * @throws InvalidResponseException
     * @throws ResponseException
     */
    public function post(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        DataObject $body = null,
        RequestObject $requestParameters = null
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
     * @param ResponseClassMap $responseClassMap
     * @param string $relativeUriPath
     * @param string $clientMetaInfo
     * @param DataObject|null $body
     * @param RequestObject|null $requestParameters
     *
     * @return DataObject
     *
     * @throws InvalidResponseException
     * @throws ResponseException
     */
    public function put(
        ResponseClassMap $responseClassMap,
        $relativeUriPath,
        $clientMetaInfo = '',
        DataObject $body = null,
        RequestObject $requestParameters = null
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
     * @return ResponseFactory
     */
    protected function getResponseFactory()
    {
        if (is_null($this->responseFactory)) {
            $this->responseFactory = new ResponseFactory();
        }
        return $this->responseFactory;
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
     *
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
     *
     * @return string
     *
     * @throws \Exception
     */
    protected function getRequestUri($relativeUriPath, RequestObject $requestParameters = null)
    {
        return
            $this->communicatorConfiguration->getBaseUri() .
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters);
    }

    /**
     * @param string $httpMethod
     * @param string $relativeUriPath
     * @param RequestObject|null $requestParameters
     * @param string $clientMetaInfo
     * @return string[]
     */
    protected function getRequestHeaders(
        $httpMethod,
        $relativeUriPath,
        RequestObject $requestParameters = null,
        $clientMetaInfo = ''
    ) {
        $requestHeaderGenerator = new RequestHeaderGenerator(
            $this->communicatorConfiguration,
            $httpMethod,
            $this->getRelativeUriPathWithRequestParameters($relativeUriPath, $requestParameters),
            $clientMetaInfo
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
            return self::VERSION_PREFIX . $relativeUriPath;
        }
        $requestParameterObjectVars = get_object_vars($requestParameters);

        if (count($requestParameterObjectVars) == 0) {
            return self::VERSION_PREFIX . $relativeUriPath;
        }

        return self::VERSION_PREFIX . $relativeUriPath . '?' . http_build_query($requestParameterObjectVars);
    }
}
