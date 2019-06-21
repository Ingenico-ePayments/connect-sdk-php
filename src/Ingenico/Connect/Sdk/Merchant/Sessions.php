<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Sessions\SessionRequest;
use Ingenico\Connect\Sdk\Domain\Sessions\SessionResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Sessions client.
 */
class Sessions extends Resource
{
    /**
     * Resource /{merchantId}/sessions - Create session
     *
     * @param SessionRequest $body
     * @param CallContext $callContext
     * @return SessionResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/sessions/create.html Create session
     */
    public function create(SessionRequest $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Sessions\SessionResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/sessions'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
