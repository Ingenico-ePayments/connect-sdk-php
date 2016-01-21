<?php

/**
 * Sessions client.
 * Create new Session for Client2Server API calls
 */
class GCS_Merchant_Sessions extends GCS_Resource
{
    /**
     * Resource /{merchantId}/sessions
     * Create Session
     *
     * @param GCS_sessions_SessionRequest $body
     * @return GCS_sessions_SessionResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_sessions_SessionResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/sessions'),
            $this->getClientMetaInfo(),
            $body
        );
    }
}
