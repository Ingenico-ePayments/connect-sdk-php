<?php

/**
 * Product Groups client.
 * Get information about payment product groups
 */
class GCS_Merchant_Productgroups extends GCS_Resource
{
    /**
     * Resource /{merchantId}/productgroups
     * Get payment product groups
     *
     * @param GCS_Merchant_Productgroups_FindParams $query
     * @param GCS_CallContext $callContext
     * @return GCS_product_PaymentProductGroups
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function find($query, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_product_PaymentProductGroups');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/productgroups'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/productgroups/{paymentProductGroupId}
     * Get payment product group
     *
     * @param string $paymentProductGroupId
     * @param GCS_Merchant_Productgroups_GetParams $query
     * @param GCS_CallContext $callContext
     * @return GCS_product_PaymentProductGroupResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($paymentProductGroupId, $query, GCS_CallContext $callContext = null)
    {
        $this->context['paymentProductGroupId'] = $paymentProductGroupId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_product_PaymentProductGroupResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/productgroups/{paymentProductGroupId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
