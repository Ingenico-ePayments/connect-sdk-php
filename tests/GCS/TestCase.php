<?php
namespace GCS;

/**
 * Class TestCase
 *
 * @package GCS
 */
abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string|null
     */
    protected $configFilePath = null;

    /**
     * @var JsonValuesStore|null
     */
    protected $jsonValuesStore = null;

    /**
     * @var CommunicatorConfiguration
     */
    protected $communicatorConfiguration;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->configFilePath = dirname(__FILE__) . '/../config.json';
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function getApiKey()
    {
        return $this->getJsonValuesStore()->getValue('api_key');
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function getApiSecret()
    {
        return $this->getJsonValuesStore()->getValue('api_secret');
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function getBaseUri()
    {
        return $this->getJsonValuesStore()->getValue('base_uri');
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function getProxyHost()
    {
        return $this->getJsonValuesStore()->getValue('proxy_host', false);
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function getProxyPort()
    {
        return $this->getJsonValuesStore()->getValue('proxy_port', false);
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function getProxyUsername()
    {
        return $this->getJsonValuesStore()->getValue('proxy_username', false);
    }

    /**
     * @return string
     *
     * @throws \Exception
     */
    protected function getProxyPassword()
    {
        return $this->getJsonValuesStore()->getValue('proxy_password', false);
    }

    /**
     * @return JsonValuesStore
     */
    protected function getJsonValuesStore()
    {
        if (is_null($this->jsonValuesStore)) {
            $this->jsonValuesStore = new JsonValuesStore($this->configFilePath);
        }
        return $this->jsonValuesStore;
    }

    /**
     * @return CommunicatorConfiguration
     */
    protected function getCommunicatorConfiguration()
    {
        if (is_null($this->communicatorConfiguration)) {
            $this->communicatorConfiguration = new CommunicatorConfiguration(
                $this->getApiKey(),
                $this->getApiSecret(),
                $this->getBaseUri()
            );
        }
        return $this->communicatorConfiguration;
    }
}
