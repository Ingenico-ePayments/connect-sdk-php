<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class ProxyConfiguration
 *
 * @package Ingenico\Connect\Sdk
 */
class ProxyConfiguration
{
    /**
     * @var string|null
     */
    protected $host = null;
    /**
     * @var string|int|null
     */
    protected $port = null;
    /**
     * @var string|null
     */
    protected $username = null;
    /**
     * @var string|null
     */
    protected $password = null;

    /**
     * @param string $host
     * @param string|int|null $port
     * @param string|null $username
     * @param string|null $password
     */
    public function __construct($host, $port = null, $username = null, $password = null)
    {
        if ($host) {
            $this->host = $host;
            $this->port = $port;
            $this->username = $username;
            $this->password = $password;
        }
    }

    /**
     * @return string
     */
    public function getCurlProxy()
    {
        if (!is_null($this->host)) {
            return $this->host . (is_null($this->port) ? '' : ':'. $this->port);
        }
        return '';
    }

    /**
     * @return string
     */
    public function getCurlProxyUserPwd()
    {
        if (!is_null($this->host)) {
            return ((string) $this->username) . (is_null($this->password) ? '' : ':'. $this->password);
        }
        return '';
    }
}
