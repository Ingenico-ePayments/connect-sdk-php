<?php

/**
 * GlobalCollect server-to-server (S2S) API
 */
class GCS_Client extends GCS_Resource
{
    /** @var GCS_Communicator */
    private $communicator;

    /** @var string */
    private $clientMetaInfo;

    /**
     * Construct a new GlobalCollect server-to-server API client.
     *
     * @param GCS_Communicator $communicator
     * @param string $clientMetaInfo
     *
     */
    public function __construct(GCS_Communicator $communicator, $clientMetaInfo = '')
    {
        parent::__construct();
        $this->communicator = $communicator;
        $this->setClientMetaInfo($clientMetaInfo);
    }

    /**
     * @return GCS_Communicator
     */
    protected function getCommunicator()
    {
        return $this->communicator;
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
     * @return GCS_Merchant
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function merchant($merchantId)
    {
        $newContext = $this->context;
        $newContext['merchantId'] = $merchantId;
        return new GCS_Merchant($this, $newContext);
    }
}
