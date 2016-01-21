<?php

/**
 * HostedCheckouts client.
 * Create new hosted checkout
 */
class GCS_Merchant_Hostedcheckouts extends GCS_Resource
{
    /**
     * Resource /{merchantId}/hostedcheckouts
     * Create hosted checkout
     *
     * @param GCS_hostedcheckout_CreateHostedCheckoutRequest $body
     * @return GCS_hostedcheckout_CreateHostedCheckoutResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(201, 'GCS_hostedcheckout_CreateHostedCheckoutResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/hostedcheckouts'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/hostedcheckouts/{hostedCheckoutId}
     * Get hosted checkout status
     *
     * @param string $hostedCheckoutId
     * @return GCS_hostedcheckout_GetHostedCheckoutResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($hostedCheckoutId)
    {
        $this->context['hostedCheckoutId'] = $hostedCheckoutId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_hostedcheckout_GetHostedCheckoutResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/hostedcheckouts/{hostedCheckoutId}'),
            $this->getClientMetaInfo()
        );
    }
}
