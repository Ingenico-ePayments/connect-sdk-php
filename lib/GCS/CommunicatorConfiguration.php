<?php
namespace GCS;

/**
 * Class CommunicatorConfiguration
 *
 * @package GCS
 */
class CommunicatorConfiguration
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
     * @var ProxyConfiguration|null
     */
    protected $proxyConfiguration = null;

    /**
     * @param string $apiKeyId
     * @param string $apiSecret
     * @param string $baseUri
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function __construct($apiKeyId, $apiSecret, $baseUri, ProxyConfiguration $proxyConfiguration = null)
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
     * @return ProxyConfiguration|null
     */
    public function getProxyConfiguration()
    {
        return $this->proxyConfiguration;
    }

    /**
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function setProxyConfiguration(ProxyConfiguration $proxyConfiguration = null)
    {
        $this->proxyConfiguration = $proxyConfiguration;
    }
}
