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
     * @param GCS_CallContext $callContext
     * @return GCS_hostedcheckout_CreateHostedCheckoutResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function create($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(201, 'GCS_hostedcheckout_CreateHostedCheckoutResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/hostedcheckouts'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/hostedcheckouts/{hostedCheckoutId}
     * Get hosted checkout status
     *
     * @param string $hostedCheckoutId
     * @param GCS_CallContext $callContext
     * @return GCS_hostedcheckout_GetHostedCheckoutResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($hostedCheckoutId, GCS_CallContext $callContext = null)
    {
        $this->context['hostedCheckoutId'] = $hostedCheckoutId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_hostedcheckout_GetHostedCheckoutResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/hostedcheckouts/{hostedCheckoutId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }
}
