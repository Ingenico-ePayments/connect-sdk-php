<?php
namespace GCS\Merchant;

use GCS\errors\ErrorResponse;
use GCS\Resource;
use GCS\ResponseClassMap;
use GCS\sessions\SessionRequest;
use GCS\sessions\SessionResponse;

/**
 * Class Sessions
 *
 * Sessions client.
 * Create new Session for Client2Server API calls
 *
 * @package GCS\Merchant
 */
class Sessions extends Resource
{
    /**
     * Resource /{merchantId}/sessions
     * Create Session
     *
     * @param SessionRequest $body
     *
     * @return SessionResponse
     *
     * @throws ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\sessions\SessionResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/sessions'),
            $this->getClientMetaInfo(),
            $body
        );
    }
}
