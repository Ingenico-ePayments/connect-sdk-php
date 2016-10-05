<?php
namespace Ingenico\Connect\Sdk;

use UnexpectedValueException;
use Ingenico\Connect\Sdk\Domain\MetaData\ShoppingCartExtension;

/**
 * Class CommunicatorConfiguration
 *
 * @package Ingenico\Connect\Sdk
 */
class CommunicatorConfiguration
{
    /**
     * @var string
     */
    private $apiKeyId;

    /**
     * @var string
     */
    private $apiSecret;

    /**
     * @var string
     */
    private $apiEndpoint;

    /**
     * @var ProxyConfiguration|null
     */
    private $proxyConfiguration = null;

    /**
     * @var string|null
     */
    private $integrator = null;

    /**
     * @var ShoppingCartExtension|null
     */
    private $shoppingCartExtension = null;

    /**
     * @param string $apiKeyId
     * @param string $apiSecret
     * @param string $apiEndpoint
     * @param string $integrator
     * @param ProxyConfiguration|null $proxyConfiguration
     */
    public function __construct($apiKeyId, $apiSecret, $apiEndpoint, $integrator, ProxyConfiguration $proxyConfiguration = null)
    {
        $this->validateApiEndpoint($apiEndpoint);
        $this->apiKeyId = $apiKeyId;
        $this->apiSecret = $apiSecret;
        $this->apiEndpoint = $apiEndpoint;
        $this->integrator = $integrator;
        $this->proxyConfiguration = $proxyConfiguration;
    }

    private function validateApiEndpoint($apiEndpoint) {
        $url = parse_url($apiEndpoint);
        if ($url === FALSE) {
            throw new UnexpectedValueException('apiEndpoint is not a valid URL');
        } else if (isset($url['path']) && $url['path'] !== '') {
            throw new UnexpectedValueException('apiEndpoint should not contain a path');
        } else if (isset($url['user']) || isset($url['query']) || isset($url['fragment'])) {
            throw new UnexpectedValueException('apiEndpoint should not contain user info, query or fragment');
        }
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
    public function getApiEndpoint()
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string $apiEndpoint
     */
    public function setApiEndpoint($apiEndpoint)
    {
        $this->validateApiEndpoint($apiEndpoint);
        $this->apiEndpoint = $apiEndpoint;
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

    /**
     * @return string|null
     */
    public function getIntegrator()
    {
        return $this->integrator;
    }

    /**
     * @param string|null $integrator
     */
    public function setIntegrator($integrator = null)
    {
        $this->integrator = $integrator;
    }

    /**
     * @return ShoppingCartExtension|null
     */
    public function getShoppingCartExtension()
    {
        return $this->shoppingCartExtension;
    }

    /**
     * @param ShoppingCartExtension|null $shoppingCartExtension
     */
    public function setShoppingCartExtension(ShoppingCartExtension $shoppingCartExtension = null)
    {
        $this->shoppingCartExtension = $shoppingCartExtension;
    }
}
