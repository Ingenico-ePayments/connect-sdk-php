<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Token\ApproveTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse;
use Ingenico\Connect\Sdk\Domain\Token\TokenResponse;
use Ingenico\Connect\Sdk\Domain\Token\UpdateTokenRequest;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\Merchant\Tokens\DeleteTokenParams;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Tokens client.
 */
class Tokens extends Resource
{
    /**
     * Resource /{merchantId}/tokens - Create token
     *
     * @param CreateTokenRequest $body
     * @param CallContext $callContext
     * @return CreateTokenResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/tokens/create.html Create token
     */
    public function create($body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId} - Get token
     *
     * @param string $tokenId
     * @param CallContext $callContext
     * @return TokenResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/tokens/get.html Get token
     */
    public function get($tokenId, CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Token\TokenResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId} - Update token
     *
     * @param string $tokenId
     * @param UpdateTokenRequest $body
     * @param CallContext $callContext
     * @return null
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/tokens/update.html Update token
     */
    public function update($tokenId, $body, CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->put(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId} - Delete token
     *
     * @param string $tokenId
     * @param DeleteTokenParams $query
     * @param CallContext $callContext
     * @return null
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/tokens/delete.html Delete token
     */
    public function delete($tokenId, $query, CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->delete(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId}/approvesepadirectdebit - Approve SEPA DD mandate
     *
     * @param string $tokenId
     * @param ApproveTokenRequest $body
     * @param CallContext $callContext
     * @return null
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/tokens/approvesepadirectdebit.html Approve SEPA DD mandate
     */
    public function approvesepadirectdebit($tokenId, $body, CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens/{tokenId}/approvesepadirectdebit'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
