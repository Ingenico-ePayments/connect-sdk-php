<?php
namespace GCS;

/**
 * Interface Connection
 *
 * @package GCS
 */
interface Connection
{
    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param ProxyConfiguration|null $proxyConfiguration
     *
     * @return ConnectionResponse
     */
    public function get($requestUri, $requestHeaders, ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param ProxyConfiguration|null $proxyConfiguration
     *
     * @return ConnectionResponse
     */
    public function delete($requestUri, $requestHeaders, ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     *
     * @return ConnectionResponse
     */
    public function post($requestUri, $requestHeaders, $body, ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param ProxyConfiguration|null $proxyConfiguration
     *
     * @return ConnectionResponse
     */
    public function put($requestUri, $requestHeaders, $body, ProxyConfiguration $proxyConfiguration = null);
}
