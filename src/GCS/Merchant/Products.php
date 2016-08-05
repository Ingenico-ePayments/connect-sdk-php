<?php

/**
 * Products client.
 * Get information about payment products
 */
class GCS_Merchant_Products extends GCS_Resource
{
    /**
     * Resource /{merchantId}/products/{paymentProductId}/directory
     * Get payment product directory
     *
     * @param int $paymentProductId
     * @param GCS_Merchant_Products_DirectoryParams $query
     * @param GCS_CallContext $callContext
     * @return GCS_product_Directory
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function directory($paymentProductId, $query, GCS_CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_product_Directory');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/products/{paymentProductId}/directory'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products
     * Get payment products
     *
     * @param GCS_Merchant_Products_FindParams $query
     * @param GCS_CallContext $callContext
     * @return GCS_product_PaymentProducts
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function find($query, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_product_PaymentProducts');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/products'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}
     * Get payment product
     *
     * @param int $paymentProductId
     * @param GCS_Merchant_Products_GetParams $query
     * @param GCS_CallContext $callContext
     * @return GCS_product_PaymentProductResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($paymentProductId, $query, GCS_CallContext $callContext = null)
    {
        $this->context['paymentProductId'] = $paymentProductId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_product_PaymentProductResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/products/{paymentProductId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
