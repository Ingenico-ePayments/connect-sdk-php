<?php

/**
 * Services client.
 * Several services to help you
 */
class GCS_Merchant_Services extends GCS_Resource
{
    /**
     * Resource /{merchantId}/services/convert/bankaccount
     * Convert Bankaccount
     *
     * @param GCS_services_BankDetailsRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_services_BankDetailsResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function bankaccount($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_BankDetailsResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/services/convert/bankaccount'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/services/testconnection
     * Test connection
     *
     * @param GCS_CallContext $callContext
     * @return GCS_services_TestConnection
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function testconnection(GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_TestConnection');
        $responseClassMap->addResponseClassName(403, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/services/testconnection'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/services/getIINdetails
     * Get IIN details
     *
     * @param GCS_services_GetIINDetailsRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_services_GetIINDetailsResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function getIINdetails($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_GetIINDetailsResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/services/getIINdetails'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/services/convert/amount
     * Convert amount
     *
     * @param GCS_Merchant_Services_ConvertAmountParams $query
     * @param GCS_CallContext $callContext
     * @return GCS_services_ConvertAmount
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function convertAmount($query, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_ConvertAmount');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/services/convert/amount'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }
}
