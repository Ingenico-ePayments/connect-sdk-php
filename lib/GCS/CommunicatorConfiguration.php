<?php

class GCS_CommunicatorConfiguration
{
    /**
     * @var string
     */
    protected $apiKeyId;

    /**
     * @var string
     */
    protected $apiSecret;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var GCS_ProxyConfiguration|null
     */
    protected $proxyConfiguration = null;

    /**
     * @param string $apiKeyId
     * @param string $apiSecret
     * @param string $baseUri
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     */
    public function __construct($apiKeyId, $apiSecret, $baseUri, GCS_ProxyConfiguration $proxyConfiguration = null)
    {
        $this->apiKeyId = $apiKeyId;
        $this->apiSecret = $apiSecret;
        $this->baseUri = $baseUri;
        $this->proxyConfiguration = $proxyConfiguration;
    }

    /**
     * @return string
     */
    public function getApiKeyId()
    {
        return $this->apiKeyId;
    }

    /**
     * @param string $apiKeyId
     */
    public function setApiKeyId($apiKeyId)
    {
        $this->apiKeyId = $apiKeyId;
    }

    /**
     * @return string
     */
    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    /**
     * @param string $apiSecret
     */
    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @return GCS_ProxyConfiguration|null
     */
    public function getProxyConfiguration()
    {
        return $this->proxyConfiguration;
    }

    /**
     * @param GCS_ProxyConfiguration|null $proxyConfiguration
     */
    public function setProxyConfiguration(GCS_ProxyConfiguration $proxyConfiguration = null)
    {
        $this->proxyConfiguration = $proxyConfiguration;
    }
}
