<?php

/**
 */
class GCS_Merchant_Products_PaymentProduct extends GCS_Resource
{
    /**
     * Resource /{merchantId}/products/{paymentProductId}/directory
     * Retrieve payment product directory
     *
     * @param GCS_Merchant_Products_PaymentProduct_DirectoryParams $query
     * @param GCS_CallContext $callContext
     * @return GCS_product_Directory
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function directory($query, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_product_Directory');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/products/{paymentProductId}/directory'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
