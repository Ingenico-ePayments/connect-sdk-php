<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Mandates\CreateMandateRequest;
use Ingenico\Connect\Sdk\Domain\Mandates\CreateMandateResponse;
use Ingenico\Connect\Sdk\Domain\Mandates\GetMandateResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Mandates client.
 */
class Mandates extends Resource
{
    /**
     * Resource /{merchantId}/mandates - Create mandate
     *
     * @param CreateMandateRequest $body
     * @param CallContext $callContext
     * @return CreateMandateResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/mandates/create.html Create mandate
     */
    public function create(CreateMandateRequest $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Mandates\CreateMandateResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/mandates'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/mandates/{uniqueMandateReference} - Create mandate with mandatereference
     *
     * @param string $uniqueMandateReference
     * @param CreateMandateRequest $body
     * @param CallContext $callContext
     * @return CreateMandateResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/mandates/createWithMandateReference.html Create mandate with mandatereference
     */
    public function createWithMandateReference($uniqueMandateReference, CreateMandateRequest $body, CallContext $callContext = null)
    {
        $this->context['uniqueMandateReference'] = $uniqueMandateReference;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Mandates\CreateMandateResponse';
        return $this->getCommunicator()->put(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/mandates/{uniqueMandateReference}'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/mandates/{uniqueMandateReference} - Get mandate
     *
     * @param string $uniqueMandateReference
     * @param CallContext $callContext
     * @return GetMandateResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/mandates/get.html Get mandate
     */
    public function get($uniqueMandateReference, CallContext $callContext = null)
    {
        $this->context['uniqueMandateReference'] = $uniqueMandateReference;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Mandates\GetMandateResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/mandates/{uniqueMandateReference}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/mandates/{uniqueMandateReference}/block - Block mandate
     *
     * @param string $uniqueMandateReference
     * @param CallContext $callContext
     * @return GetMandateResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/mandates/block.html Block mandate
     */
    public function block($uniqueMandateReference, CallContext $callContext = null)
    {
        $this->context['uniqueMandateReference'] = $uniqueMandateReference;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Mandates\GetMandateResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/mandates/{uniqueMandateReference}/block'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/mandates/{uniqueMandateReference}/unblock - Unblock mandate
     *
     * @param string $uniqueMandateReference
     * @param CallContext $callContext
     * @return GetMandateResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/mandates/unblock.html Unblock mandate
     */
    public function unblock($uniqueMandateReference, CallContext $callContext = null)
    {
        $this->context['uniqueMandateReference'] = $uniqueMandateReference;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Mandates\GetMandateResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/mandates/{uniqueMandateReference}/unblock'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/mandates/{uniqueMandateReference}/revoke - Revoke mandate
     *
     * @param string $uniqueMandateReference
     * @param CallContext $callContext
     * @return GetMandateResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/mandates/revoke.html Revoke mandate
     */
    public function revoke($uniqueMandateReference, CallContext $callContext = null)
    {
        $this->context['uniqueMandateReference'] = $uniqueMandateReference;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Mandates\GetMandateResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/mandates/{uniqueMandateReference}/revoke'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }
}
