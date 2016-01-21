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
     * @return GCS_token_CreateTokenResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_token_CreateTokenResponse');
        $responseClassMap->addResponseClassName(201, 'GCS_token_CreateTokenResponse');
        $responseClassMap->addResponseClassName(403, 'GCS_errors_ErrorResponse');
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
     * @param GCS_token_ApproveTokenRequest $body
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function approvesepadirectdebit($tokenId, $body)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
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
     * @param GCS_token_UpdateTokenRequest $body
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function update($tokenId, $body)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
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
     * @return GCS_token_TokenResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($tokenId)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_token_TokenResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
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
     * @param GCS_Merchant_Tokens_DeleteParams $query
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function delete($tokenId, $query)
    {
        $this->context['tokenId'] = $tokenId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->delete(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/tokens/{tokenId}'),
            $this->getClientMetaInfo(),
            $query
        );
    }
}
