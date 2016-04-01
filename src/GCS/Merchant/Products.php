<?php

/**
 * Products client.
 * Get information about payment products
 */
class GCS_Merchant_Products extends GCS_Resource
{
    /**
     * Resource /{merchantId}/products/{paymentProductId}
     *
     * @param int $paymentProductId
     * @return GCS_Merchant_Products_PaymentProduct
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function paymentProduct($paymentProductId)
    {
        $newContext = $this->context;
        $newContext['paymentProductId'] = $paymentProductId;
        return new GCS_Merchant_Products_PaymentProduct($this, $newContext);
    }

    /**
     * Resource /{merchantId}/products
     * Retrieve payment products
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
            $this->instantiateUri('/{merchantId}/products'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/products/{paymentProductId}
     * Retrieve payment product fields
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
            $this->instantiateUri('/{merchantId}/products/{paymentProductId}'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
