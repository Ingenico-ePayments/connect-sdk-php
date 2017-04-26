<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Communicator;
use Ingenico\Connect\Sdk\CommunicatorLogger;
use Ingenico\Connect\Sdk\Merchant;
use Ingenico\Connect\Sdk\Resource;

/**
 * GlobalCollect server-to-server (S2S) API
 */
class Client extends Resource
{
    const API_VERSION = 'v1';

    /** @var Communicator */
    private $communicator;

    /** @var string */
    private $clientMetaInfo;

    /**
     * Construct a new GlobalCollect platform server-to-server API client.
     *
     * @param Communicator $communicator
     * @param string $clientMetaInfo
     *
     */
    public function __construct(Communicator $communicator, $clientMetaInfo = '')
    {
        parent::__construct();
        $this->communicator = $communicator;
        $this->setClientMetaInfo($clientMetaInfo);
        $this->context = array('apiVersion' => static::API_VERSION);
    }

    /**
     * @return Communicator
     */
    protected function getCommunicator()
    {
        return $this->communicator;
    }

    /**
     * @param CommunicatorLogger $communicatorLogger
     */
    public function enableLogging(CommunicatorLogger $communicatorLogger)
    {
        $this->getCommunicator()->enableLogging($communicatorLogger);
    }

    /**
     *
     */
    public function disableLogging()
    {
        $this->getCommunicator()->disableLogging();
    }

    /**
     * @param string $clientMetaInfo
     * @return $this
     */
    public function setClientMetaInfo($clientMetaInfo)
    {
        $this->clientMetaInfo = $clientMetaInfo ? base64_encode($clientMetaInfo) : '';
        return $this;
    }

    /**
     * @return string
     */
    protected function getClientMetaInfo()
    {
        return $this->clientMetaInfo;
    }

    /**
     * Resource /{merchantId}
     *
     * @param string $merchantId
     * @return Merchant
     */
    public function merchant($merchantId)
    {
        $newContext = $this->context;
        $newContext['merchantId'] = $merchantId;
        return new Merchant($this, $newContext);
    }
}
