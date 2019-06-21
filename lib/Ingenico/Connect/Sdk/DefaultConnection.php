<?php
namespace Ingenico\Connect\Sdk;

use Exception;
use ErrorException;
use UnexpectedValueException;
use Robtimus\Multipart\MultipartFormData;

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
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function get($requestUri, $requestHeaders, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null)
    {
        $requestId = UuidGenerator::generatedUuid();
        $this->logRequest($requestId, 'GET', $requestUri, $requestHeaders, '');
        try {
            $response = $this->executeRequest('GET', $requestUri, $requestHeaders, '', $responseHandler, $proxyConfiguration);
            if ($response) {
                $this->logResponse($requestId, $requestUri, $response);
            }
        } catch (Exception $exception) {
            $this->logException($requestId, $requestUri, $exception);
            throw $exception;
        }
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function delete($requestUri, $requestHeaders, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null)
    {
        $requestId = UuidGenerator::generatedUuid();
        $this->logRequest($requestId, 'DELETE', $requestUri, $requestHeaders, '');
        try {
            $response = $this->executeRequest('DELETE', $requestUri, $requestHeaders, '', $responseHandler, $proxyConfiguration);
            if ($response) {
                $this->logResponse($requestId, $requestUri, $response);
            }
        } catch (Exception $exception) {
            $this->logException($requestId, $requestUri, $exception);
            throw $exception;
        }
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string|MultipartFormDataObject $body
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function post($requestUri, $requestHeaders, $body, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null)
    {
        $requestId = UuidGenerator::generatedUuid();
        $bodyToLog = is_string($body) ? $body : '<binary content>';
        $this->logRequest($requestId, 'POST', $requestUri, $requestHeaders, $bodyToLog);
        try {
            $response = $this->executeRequest('POST', $requestUri, $requestHeaders, $body, $responseHandler, $proxyConfiguration);
            if ($response) {
                $this->logResponse($requestId, $requestUri, $response);
            }
        } catch (Exception $exception) {
            $this->logException($requestId, $requestUri, $exception);
            throw $exception;
        }
    }

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function put($requestUri, $requestHeaders, $body, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null)
    {
        $requestId = UuidGenerator::generatedUuid();
        $bodyToLog = is_string($body) ? $body : '<binary content>';
        $this->logRequest($requestId, 'PUT', $requestUri, $requestHeaders, $bodyToLog);
        try {
            $response = $this->executeRequest('PUT', $requestUri, $requestHeaders, $body, $responseHandler, $proxyConfiguration);
            if ($response) {
                $this->logResponse($requestId, $requestUri, $response);
            }
        } catch (Exception $exception) {
            $this->logException($requestId, $requestUri, $exception);
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
     * @param string|MultipartFormDataObject $body
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     * @throws ErrorException
     */
    protected function executeRequest(
        $httpMethod,
        $requestUri,
        $requestHeaders,
        $body,
        callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null
    ) {
        if (!in_array($httpMethod, array('GET', 'DELETE', 'POST', 'PUT'))) {
            throw new UnexpectedValueException(sprintf('Http method \'%s\' is not supported', $httpMethod));
        }
        $curlHandle = $this->getCurlHandle();
        $this->setCurlOptions($curlHandle, $httpMethod, $requestUri, $requestHeaders, $body, $proxyConfiguration);
        return $this->executeCurlHandle($curlHandle, $responseHandler);
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
     * @param resource $multiHandle
     * @param resource $curlHandle
     * @throws Exception
     */
    private function executeCurlHandleShared($multiHandle, $curlHandle) {
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
    }

    /**
     * @param resource $curlHandle
     * @param callable $responseHandler
     * @return DefaultConnectionResponse|null
     * @throws Exception
     */
    private function executeCurlHandle($curlHandle, callable $responseHandler)
    {
        $multiHandle = $this->getCurlMultiHandle();
        curl_multi_add_handle($multiHandle, $curlHandle);

        $headerBuilder = new ResponseHeaderBuilder();
        $headerFunction = function ($ch, $data) use ($headerBuilder) {
            $headerBuilder->append($data);
            return strlen($data);
        };

        $responseBuilder = $this->communicatorLogger ? new ResponseBuilder() : null;
        $writeFunction = function ($ch, $data) use ($headerBuilder, $responseBuilder, $responseHandler) {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $headers = $headerBuilder->getHeaders();
            call_user_func($responseHandler, $httpStatusCode, $data, $headers);
            if ($responseBuilder) {
                $responseBuilder->setHttpStatusCode($httpStatusCode);
                $responseBuilder->setHeaders($headers);
                if ($this->isBinaryResponse($headerBuilder)) {
                    $responseBuilder->setBody('<binary content>');
                } else {
                    $responseBuilder->appendBody($data);
                }
            }
            return strlen($data);
        };

        curl_setopt($curlHandle, CURLOPT_HEADERFUNCTION, $headerFunction);
        curl_setopt($curlHandle, CURLOPT_WRITEFUNCTION, $writeFunction);

        try {
            $this->executeCurlHandleShared($multiHandle, $curlHandle);

            // always emit an empty chunk, to make sure that the status code and headers are sent,
            // even if there is no response body
            call_user_func($writeFunction, $curlHandle, '');

            curl_multi_remove_handle($multiHandle, $curlHandle);

            return $responseBuilder ? $responseBuilder->getResponse() : null;
        } catch (Exception $e) {
            curl_multi_remove_handle($multiHandle, $curlHandle);

            throw $e;
        }
    }

    /**
     * @param resource $curlHandle
     * @param string $httpMethod
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string|MultipartFormDataObject $body
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
        curl_setopt($curlHandle, CURLOPT_HEADER, false);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, $httpMethod);
        curl_setopt($curlHandle, CURLOPT_URL, $requestUri);
        if (in_array($httpMethod, array('PUT', 'POST')) && $body) {
            if (is_string($body)) {
                curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $body);
            } else if ($body instanceof MultipartFormDataObject) {
                $multipart = new MultipartFormData($body->getBoundary());
                foreach ($body->getValues() as $name => $value) {
                    $multipart->addValue($name, $value);
                }
                foreach ($body->getFiles() as $name => $file) {
                    $multipart->addFile($name, $file->getFileName(), $file->getContent(), $file->getContentType(), $file->getContentLength());
                }
                $multipart->finish();

                $contentLength = $multipart->getContentLength();
                if ($contentLength >= 0) {
                    $requestHeaders[] = 'Content-Length: ' . $contentLength;
                }
                curl_setopt($curlHandle, CURLOPT_READFUNCTION, array($multipart, 'curl_read'));
                curl_setopt($curlHandle, CURLOPT_UPLOAD, true);
            } else {
                $type = is_object($body) ? get_class($body) : gettype($body);
                throw new UnexpectedValueException('Unsupported body type: ' . $type);
            }
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
     * @return bool
     */
    private function isBinaryResponse($headerBuilder) {
        $contentType = $headerBuilder->getContentType();
        return $contentType
            // does not starts with text/
            && strrpos($contentType, 'text/', -strlen($contentType)) === false
            // does not contain json
            && strrpos($contentType, 'json') === false
            // does not contain xml
            && strrpos($contentType, 'xml') === false;
    }

    /**
     * @param string $requestId
     * @param string $requestMethod
     * @param string $requestUri
     * @param array $requestHeaders
     * @param string $requestBody
     */
    protected function logRequest($requestId, $requestMethod, $requestUri, array $requestHeaders, $requestBody = '')
    {
        if ($this->communicatorLogger) {
            $this->getCommunicatorLoggerHelper()->logRequest(
                $this->communicatorLogger,
                $requestId,
                $requestMethod,
                $requestUri,
                $requestHeaders,
                $requestBody
            );
        }
    }

    /**
     * @param string $requestId
     * @param string $requestUri
     * @param ConnectionResponse $response
     */
    protected function logResponse($requestId, $requestUri, ConnectionResponse $response)
    {
        if ($this->communicatorLogger) {
            $this->getCommunicatorLoggerHelper()->logResponse(
                $this->communicatorLogger,
                $requestId,
                $requestUri,
                $response
            );
        }
    }

    /**
     * @param string $requestId
     * @param string $requestUri
     * @param Exception $exception
     */
    protected function logException($requestId, $requestUri, Exception $exception)
    {
        if ($this->communicatorLogger) {
            $this->getCommunicatorLoggerHelper()->logException(
                $this->communicatorLogger,
                $requestId,
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
