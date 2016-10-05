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
     * @var string
     */
    protected $host = null;
    /**
     * @var null|string|int
     */
    protected $port = null;
    /**
     * @var null|string
     */
    protected $username = null;
    /**
     * @var null|string
     */
    protected $password = null;

    /**
     * @param $host
     * @param null $port
     * @param null $username
     * @param null $password
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
            return $this->host . (is_null($this->port) ? '' : ':'. (string) $this->port);
        }
        return '';
    }

    /**
     * @return string
     */
    public function getCurlProxyUserPwd()
    {
        if (!is_null($this->host)) {
            return ((string) $this->username) . (is_null($this->password) ? '' : ':'. (string) $this->password);
        }
        return '';
    }
}
