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
     * @return GCS_services_BankDetailsResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function bankaccount($body)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_BankDetailsResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/services/convert/bankaccount'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/services/testconnection
     * Test connection
     *
     * @return GCS_services_TestConnection
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function testconnection()
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_TestConnection');
        $responseClassMap->addResponseClassName(403, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/services/testconnection'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/services/getIINdetails
     * Retrieve IIN details
     *
     * @param GCS_services_BINLookupRequest $body
     * @return GCS_services_BINLookupResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function getIINdetails($body)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_BINLookupResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/services/getIINdetails'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/services/convert/amount
     * Convert amount
     *
     * @param GCS_Merchant_Services_ConvertAmountParams $query
     * @return GCS_services_ConvertAmount
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function convertAmount($query)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_services_ConvertAmount');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/services/convert/amount'),
            $this->getClientMetaInfo(),
            $query
        );
    }
}
