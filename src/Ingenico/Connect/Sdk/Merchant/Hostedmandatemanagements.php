<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\CreateHostedMandateManagementRequest;
use Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\CreateHostedMandateManagementResponse;
use Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\GetHostedMandateManagementResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Hosted Mandate Management client.
 */
class Hostedmandatemanagements extends Resource
{
    /**
     * Resource /{merchantId}/hostedmandatemanagements - Create hosted mandate management
     *
     * @param CreateHostedMandateManagementRequest $body
     * @param CallContext $callContext
     * @return CreateHostedMandateManagementResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/hostedmandatemanagements/create.html Create hosted mandate management
     */
    public function create(CreateHostedMandateManagementRequest $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\CreateHostedMandateManagementResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/hostedmandatemanagements'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/hostedmandatemanagements/{hostedMandateManagementId} - Get hosted mandate management status
     *
     * @param string $hostedMandateManagementId
     * @param CallContext $callContext
     * @return GetHostedMandateManagementResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/hostedmandatemanagements/get.html Get hosted mandate management status
     */
    public function get($hostedMandateManagementId, CallContext $callContext = null)
    {
        $this->context['hostedMandateManagementId'] = $hostedMandateManagementId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Hostedmandatemanagement\GetHostedMandateManagementResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/hostedmandatemanagements/{hostedMandateManagementId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }
}
