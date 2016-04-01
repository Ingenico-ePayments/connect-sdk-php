<?php

class GCS_ClientTestCase extends GCS_TestCase
{
    /**
     * @var GCS_Client|null
     */
    protected $client = null;

    /**
     * @var GCS_Client|null
     */
    protected $proxyClient = null;

    /**
     * @return GCS_Client
     */
    protected function getClient()
    {
        if (is_null($this->client)) {
            $connection = new GCS_DefaultConnection();
            $communicatorConfiguration = $this->getCommunicatorConfiguration();
            $communicator = new GCS_Communicator($connection, $communicatorConfiguration);
            $this->client = new GCS_Client($communicator);
        }
        return $this->client;
    }

    /**
     * @return GCS_Client
     */
    protected function getProxyClient()
    {
        if (is_null($this->proxyClient)) {
            $connection = new GCS_DefaultConnection();
            $communicatorConfiguration = $this->getCommunicatorConfiguration();
            $communicatorConfiguration->setProxyConfiguration(new GCS_ProxyConfiguration(
                $this->getProxyHost(),
                $this->getProxyPort(),
                $this->getProxyUsername(),
                $this->getProxyPassword()
            ));
            $communicator = new GCS_Communicator($connection, $communicatorConfiguration);
            $this->proxyClient = new GCS_Client($communicator);
        }
        return $this->proxyClient;
    }
}
