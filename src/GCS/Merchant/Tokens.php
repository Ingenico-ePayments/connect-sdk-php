<?php
namespace GCS\Merchant;

use GCS\errors\ErrorResponse;
use GCS\Resource;
use GCS\ResponseClassMap;
use GCS\token\ApproveTokenRequest;
use GCS\token\CreateTokenRequest;
use GCS\token\CreateTokenResponse;
use GCS\token\TokenResponse;
use GCS\token\UpdateTokenRequest;

/**
 * Class Tokens
 *
 * Tokens client.
 * Create, delete and update tokens
 *
 * @package GCS\Merchant
 */
class Tokens extends Resource
{
    /**
     * Resource /{merchantId}/tokens
     * Create token
     *
     * @param CreateTokenRequest $body
     *
     * @return CreateTokenResponse
     *
     * @throws ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\token\CreateTokenResponse');
        $responseClassMap->addResponseClassName(403, '\GCS\errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/tokens'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId}/approvesepadirectdebit
     * Approve SEPA DD mandate
     *
     * @param string $tokenId
     * @param ApproveTokenRequest $body
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function approvesepadirectdebit($tokenId, $body)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/tokens/{tokenId}/approvesepadirectdebit'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId}
     * Update token
     *
     * @param string $tokenId
     * @param UpdateTokenRequest $body
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function update($tokenId, $body)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->put(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId}
     * Retrieve token
     *
     * @param string $tokenId
     *
     * @return TokenResponse
     *
     * @throws ErrorResponse
     */
    public function get($tokenId)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\token\TokenResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\errors\ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId}
     * Delete token
     *
     * @param string $tokenId
     * @param Tokens\DeleteParams $query
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function delete($tokenId, $query)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        $responseClassMap->addResponseClassName(404, '\GCS\errors\ErrorResponse');
        return $this->getCommunicator()->delete(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            $query
        );
    }
}
