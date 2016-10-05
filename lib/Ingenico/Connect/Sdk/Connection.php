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
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return ConnectionResponse
     */
    public function get($requestUri, $requestHeaders, ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return ConnectionResponse
     */
    public function delete($requestUri, $requestHeaders, ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return ConnectionResponse
     */
    public function post($requestUri, $requestHeaders, $body, ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     * @return ConnectionResponse
     */
    public function put($requestUri, $requestHeaders, $body, ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param CommunicatorLogger $communicatorLogger
     */
    public function enableLogging(CommunicatorLogger $communicatorLogger);

    /**
     *
     */
    public function disableLogging();
}
