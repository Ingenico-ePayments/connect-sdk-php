<?php
namespace GCS\Merchant;

use GCS\Errors\ErrorResponse;
use GCS\Resource;
use GCS\ResponseClassMap;
use GCS\Services\BankDetailsRequest;
use GCS\Services\BankDetailsResponse;
use GCS\Services\BINLookupRequest;
use GCS\Services\BINLookupResponse;
use GCS\Services\ConvertAmount;
use GCS\Services\TestConnection;

/**
 * Class Services
 *
 * Services client.
 * Several services to help you
 *
 * @package GCS\Merchant
 */
class Services extends Resource
{
    /**
     * Resource /{merchantId}/services/convert/bankaccount
     * Convert Bankaccount
     *
     * @param BankDetailsRequest $body
     *
     * @return BankDetailsResponse
     *
     * @throws ErrorResponse
     */
    public function bankaccount($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Services\BankDetailsResponse');
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
     * @return TestConnection
     *
     * @throws ErrorResponse
     */
    public function testconnection()
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Services\TestConnection');
        $responseClassMap->addResponseClassName(403, '\GCS\Errors\ErrorResponse');
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
     * @param BINLookupRequest $body
     *
     * @return BINLookupResponse
     *
     * @throws ErrorResponse
     */
    public function getIINdetails($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Services\BINLookupResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\Errors\ErrorResponse');
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
     * @param Services\ConvertAmountParams $query
     *
     * @return ConvertAmount
     *
     * @throws ErrorResponse
     */
    public function convertAmount($query)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Services\ConvertAmount');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/services/convert/amount'),
            $this->getClientMetaInfo(),
            $query
        );
    }
}
