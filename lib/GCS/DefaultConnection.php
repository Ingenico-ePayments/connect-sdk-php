<?php

/**
 * Class GCS_Connection
 */
class GCS_DefaultConnection implements GCS_Connection
{
    /** @var null|resource */
    protected $multiHandle = null;

    /**
     *
     */
    public function __destruct()
    {
        if (!is_null($this->multiHandle)) {
            curl_multi_close($this->multiHandle);
            $this->multiHandle = null;
        }
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_DefaultConnectionResponse
     */
    public function get($requestUri, $requestHeaders, GCS_ProxyConfiguration $proxyConfiguration = null)
    {
        return $this->executeRequest('GET', $requestUri, $requestHeaders, '', $proxyConfiguration);
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_DefaultConnectionResponse
     */
    public function delete($requestUri, $requestHeaders, GCS_ProxyConfiguration $proxyConfiguration = null)
    {
        return $this->executeRequest('DELETE', $requestUri, $requestHeaders, '', $proxyConfiguration);
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_DefaultConnectionResponse
     */
    public function post($requestUri, $requestHeaders, $body, GCS_ProxyConfiguration $proxyConfiguration = null)
    {
        return $this->executeRequest('POST', $requestUri, $requestHeaders, $body, $proxyConfiguration);
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_DefaultConnectionResponse
     */
    public function put($requestUri, $requestHeaders, $body, GCS_ProxyConfiguration $proxyConfiguration = null)
    {
        return $this->executeRequest('PUT', $requestUri, $requestHeaders, $body, $proxyConfiguration);
    }

    /**
     * @param string $httpMethod
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_DefaultConnectionResponse
     * @throws ErrorException
     */
    protected function executeRequest(
        $httpMethod,
        $requestUri,
        $requestHeaders,
        $body,
        GCS_ProxyConfiguration $proxyConfiguration = null
    ) {
        if (!in_array($httpMethod, array('GET', 'DELETE', 'POST', 'PUT'))) {
            throw new UnexpectedValueException(sprintf('Http method \'%s\' is not supported', $httpMethod));
        }
        $curlHandle = $this->getCurlHandle();
        $this->setCurlOptions($curlHandle, $httpMethod, $requestUri, $requestHeaders, $body, $proxyConfiguration);
        return $this->executeCurlHandle($curlHandle);
    }

    /**
     * @return resource
     * @throws ErrorException
     */
    protected function getCurlHandle()
    {
        if (!$curlHandle = curl_init()) {
            throw new ErrorException(sprintf('Cannot initialize cUrl curlHandle'));
        }
        return $curlHandle;
    }

    /**
     * @param resource $curlHandle
     * @return GCS_DefaultConnectionResponse
     * @throws Exception
     */
    private function executeCurlHandle($curlHandle)
    {
        $multiHandle = $this->getCurlMultiHandle();
        curl_multi_add_handle($multiHandle, $curlHandle);
        $running = null;
        do {
            curl_multi_exec($multiHandle, $running);
            curl_multi_select($multiHandle);
        } while ($running > 0);

        $content = curl_multi_getcontent($curlHandle);
        $contentInfo = curl_getinfo($curlHandle);
        curl_multi_remove_handle($multiHandle, $curlHandle);
        return new GCS_DefaultConnectionResponse($content, $contentInfo);
    }

    /**
     * @param resource $curlHandle
     * @param string $httpMethod
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     */
    protected function setCurlOptions(
        $curlHandle,
        $httpMethod,
        $requestUri,
        $requestHeaders,
        $body,
        GCS_ProxyConfiguration $proxyConfiguration = null
    ) {
        if (!is_array($requestHeaders)) {
            throw new UnexpectedValueException('Invalid request headers; expected array');
        }
        curl_setopt($curlHandle, CURLOPT_HEADER, false);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $httpMethod);
        curl_setopt($curlHandle, CURLOPT_URL, $requestUri);
        if (in_array($httpMethod, array('PUT', 'POST')) && $body) {
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $body);
        }
        if (count($requestHeaders) > 0) {
            curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $requestHeaders);
        }
        if (!is_null($proxyConfiguration)) {
            $curlProxy = $proxyConfiguration->getCurlProxy();
            if (!empty($curlProxy)) {
                curl_setopt($curlHandle, CURLOPT_PROXY, $curlProxy);
            }
            $curlProxyUserPwd = $proxyConfiguration->getCurlProxyUserPwd();
            if (!empty($curlProxyUserPwd)) {
                curl_setopt($curlHandle, CURLOPT_PROXYUSERPWD, $curlProxyUserPwd);
            }
        }
    }

    /**
     * @return resource
     * @throws Exception
     */
    private function getCurlMultiHandle()
    {
        if (is_null($this->multiHandle)) {
            $multiHandle = curl_multi_init();
            if ($multiHandle === false) {
                throw new Exception('Failed to initialize cURL multi curlHandle');
            };
            $this->multiHandle = $multiHandle;
        }
        return $this->multiHandle;
    }
}
