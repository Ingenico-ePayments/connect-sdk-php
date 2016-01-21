<?php

interface GCS_Connection
{
    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_ConnectionResponse
     */
    public function get($requestUri, $requestHeaders, GCS_ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_ConnectionResponse
     */
    public function delete($requestUri, $requestHeaders, GCS_ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_ConnectionResponse
     */
    public function post($requestUri, $requestHeaders, $body, GCS_ProxyConfiguration $proxyConfiguration = null);

    /**
     * @param string $requestUri
     * @param string[] $requestHeaders
     * @param string $body
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     * @return GCS_ConnectionResponse
     */
    public function put($requestUri, $requestHeaders, $body, GCS_ProxyConfiguration $proxyConfiguration = null);
}
