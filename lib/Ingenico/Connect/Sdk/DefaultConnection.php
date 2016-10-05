<?php
namespace Ingenico\Connect\Sdk;

use Exception;
use ErrorException;
use UnexpectedValueException;

/**
 * Class ApiException
 *
 * @package Ingenico\Connect\Sdk
 */
class DefaultConnection implements Connection
{
    /** @var null|resource */
    protected $multiHandle = null;

    /** @var CommunicatorLogger|null */
    protected $communicatorLogger = null;

    /** @var CommunicatorLoggerHelper|null */
    private $communicatorLoggerHelper = null;

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
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return DefaultConnectionResponse
     */
    public function get($requestUri, $requestHeaders, ProxyConfiguration $proxyConfiguration = null)
    {
        $this->logRequest('GET', $requestUri, $requestHeaders, '');
        try {
            $response = $this->executeRequest('GET', $requestUri, $requestHeaders, '', $proxyConfiguration);
            $this->logResponse($requestUri, $response);
            return $response;
        } catch (Exception $exception) {
            $this->logException($requestUri, $exception);
            throw $exception;
        }
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return DefaultConnectionResponse
     */
    public function delete($requestUri, $requestHeaders, ProxyConfiguration $proxyConfiguration = null)
    {
        $this->logRequest('DELETE', $requestUri, $requestHeaders, '');
        try {
            $response = $this->executeRequest('DELETE', $requestUri, $requestHeaders, '', $proxyConfiguration);
            $this->logResponse($requestUri, $response);
            return $response;
        } catch (Exception $exception) {
            $this->logException($requestUri, $exception);
            throw $exception;
        }
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return DefaultConnectionResponse
     */
    public function post($requestUri, $requestHeaders, $body, ProxyConfiguration $proxyConfiguration = null)
    {
        $this->logRequest('POST', $requestUri, $requestHeaders, $body);
        try {
            $response = $this->executeRequest('POST', $requestUri, $requestHeaders, $body, $proxyConfiguration);
            $this->logResponse($requestUri, $response);
            return $response;
        } catch (Exception $exception) {
            $this->logException($requestUri, $exception);
            throw $exception;
        }
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return DefaultConnectionResponse
     */
    public function put($requestUri, $requestHeaders, $body, ProxyConfiguration $proxyConfiguration = null)
    {
        $this->logRequest('PUT', $requestUri, $requestHeaders, $body);
        try {
            $response = $this->executeRequest('PUT', $requestUri, $requestHeaders, $body, $proxyConfiguration);
            $this->logResponse($requestUri, $response);
            return $response;
        } catch (Exception $exception) {
            $this->logException($requestUri, $exception);
            throw $exception;
        }
    }

    /**
     * @param CommunicatorLogger $communicatorLogger
     */
    public function enableLogging(CommunicatorLogger $communicatorLogger)
    {
        $this->communicatorLogger = $communicatorLogger;
    }

    /**
     *
     */
    public function disableLogging()
    {
        $this->communicatorLogger = null;
    }

    /**
     * @param string $httpMethod
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return DefaultConnectionResponse
     * @throws ErrorException
     */
    protected function executeRequest(
        $httpMethod,
        $requestUri,
        $requestHeaders,
        $body,
        ProxyConfiguration $proxyConfiguration = null
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
     * @return DefaultConnectionResponse
     * @throws Exception
     */
    private function executeCurlHandle($curlHandle)
    {
        $multiHandle = $this->getCurlMultiHandle();
        curl_multi_add_handle($multiHandle, $curlHandle);
        $running = null;
        do {
            $status = curl_multi_exec($multiHandle, $running);
            if ($status > CURLM_OK) {
                $errorMessage = 'cURL error ' . $status;
                if (function_exists('curl_multi_strerror')) {
                    $errorMessage .= ' (' . curl_multi_strerror($status) . ')';
                }
                throw new ErrorException($errorMessage);
            }
            $info = curl_multi_info_read($multiHandle);
            if ($info && isset($info['result']) && $info['result'] != CURLE_OK) {
                $errorMessage = 'cURL error ' . $info['result'];
                if (function_exists('curl_strerror')) {
                    $errorMessage .= ' (' . curl_strerror($info['result']) . ')';
                }
                throw new ErrorException($errorMessage);
            }
            curl_multi_select($multiHandle);
        } while ($running > 0);

        $content = curl_multi_getcontent($curlHandle);
        $headerSize = curl_getinfo($curlHandle, CURLINFO_HEADER_SIZE);
        $httpCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
        curl_multi_remove_handle($multiHandle, $curlHandle);
        $httpHeaderHelper = new HttpHeaderHelper();
        $headers = $httpHeaderHelper->parseRawHeaders(explode("\r\n", substr($content, 0, $headerSize)));
        $body = substr($content, $headerSize);
        return new DefaultConnectionResponse($httpCode, $headers, $body);
    }
    
    /**
     * @param resource $curlHandle
     * @param string $httpMethod
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    protected function setCurlOptions(
        $curlHandle,
        $httpMethod,
        $requestUri,
        $requestHeaders,
        $body,
        ProxyConfiguration $proxyConfiguration = null
    ) {
        if (!is_array($requestHeaders)) {
            throw new UnexpectedValueException('Invalid request headers; expected array');
        }
        curl_setopt($curlHandle, CURLOPT_HEADER, true);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $httpMethod);
        curl_setopt($curlHandle, CURLOPT_URL, $requestUri);
        if (in_array($httpMethod, array('PUT', 'POST')) && $body) {
            curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $body);
        }
        if (count($requestHeaders) > 0) {
            $httpHeaderHelper = new HttpHeaderHelper();
            curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $httpHeaderHelper->generateRawHeaders($requestHeaders));
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

    /**
     * @param string $requestMethod
     * @param string $requestUri
     * @param array $requestHeaders
     * @param string $requestBody
     */
    protected function logRequest($requestMethod, $requestUri, array $requestHeaders, $requestBody = '')
    {
        if ($this->communicatorLogger) {
            $this->getCommunicatorLoggerHelper()->logRequest(
                $this->communicatorLogger,
                $requestMethod,
                $requestUri,
                $requestHeaders,
                $requestBody
            );
        }
    }

    /**
     * @param string $requestUri
     * @param ConnectionResponse $response
     */
    protected function logResponse($requestUri, ConnectionResponse $response)
    {
        if ($this->communicatorLogger) {
            $this->getCommunicatorLoggerHelper()->logResponse(
                $this->communicatorLogger,
                $requestUri,
                $response
            );
        }
    }

    /**
     * @param string $requestUri
     * @param Exception $exception
     */
    protected function logException($requestUri, Exception $exception)
    {
        if ($this->communicatorLogger) {
            $this->getCommunicatorLoggerHelper()->logException(
                $this->communicatorLogger,
                $requestUri,
                $exception
            );
        }
    }

    /** @return CommunicatorLoggerHelper */
    protected function getCommunicatorLoggerHelper()
    {
        if (is_null($this->communicatorLoggerHelper)) {
            $this->communicatorLoggerHelper = new CommunicatorLoggerHelper;
        }
        return $this->communicatorLoggerHelper;
    }
}
