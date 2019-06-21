<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class Connection
 *
 * @package Ingenico\Connect\Sdk
 */
interface Connection
{
    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function get($requestUri, $requestHeaders, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function delete($requestUri, $requestHeaders, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string|MultipartFormDataObject $body
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function post($requestUri, $requestHeaders, $body, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string|MultipartFormDataObject $body
     * @param callable $responseHandler Callable accepting the response status code, a response body chunk and the response headers
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function put($requestUri, $requestHeaders, $body, callable $responseHandler,
        ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param CommunicatorLogger $communicatorLogger
     */
    public function enableLogging(CommunicatorLogger $communicatorLogger);

    /**
     *
     */
    public function disableLogging();
}
