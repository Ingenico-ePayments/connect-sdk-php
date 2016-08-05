<?php

/**
 * Tokens client.
 * Create, delete and update tokens
 */
class GCS_Merchant_Tokens extends GCS_Resource
{
    /**
     * Resource /{merchantId}/tokens
     * Create token
     *
     * @param GCS_token_CreateTokenRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_token_CreateTokenResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function create($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_token_CreateTokenResponse');
        $responseClassMap->addResponseClassName(201, 'GCS_token_CreateTokenResponse');
        $responseClassMap->addResponseClassName(403, 'GCS_errors_ErrorResponse');
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
     * Resource /{merchantId}/tokens/{tokenId}/approvesepadirectdebit
     * Approve SEPA DD mandate
     *
     * @param string $tokenId
     * @param GCS_token_ApproveTokenRequest $body
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function approvesepadirectdebit($tokenId, $body, GCS_CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens/{tokenId}/approvesepadirectdebit'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId}
     * Update token
     *
     * @param string $tokenId
     * @param GCS_token_UpdateTokenRequest $body
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function update($tokenId, $body, GCS_CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
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
     * Resource /{merchantId}/tokens/{tokenId}
     * Get token
     *
     * @param string $tokenId
     * @param GCS_CallContext $callContext
     * @return GCS_token_TokenResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($tokenId, GCS_CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_token_TokenResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/tokens/{tokenId}
     * Delete token
     *
     * @param string $tokenId
     * @param GCS_Merchant_Tokens_DeleteParams $query
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function delete($tokenId, $query, GCS_CallContext $callContext = null)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->delete(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
