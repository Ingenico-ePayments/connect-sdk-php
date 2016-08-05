<?php

/**
 * @group examples
 *
 */
class GCS_Client_ServicesTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "20000";

    public function testTestConnection()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $response = $client->merchant($merchantId)->services()->testconnection();
        return $response;
    }

    /**
     * @throws GCS_ApiException
     */
    public function testRetrieveIINDetails()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $body = new GCS_services_GetIINDetailsRequest();

        $body->bin = "4567350000427977";

        $response = $client->merchant($merchantId)->services()->getIINdetails($body);
        return $response;
    }

    /**
     * @throws GCS_ApiException
     */
    public function testConvertBankaccount()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $bankDetailsRequest = new GCS_services_BankDetailsRequest();

        $bankAccountBban = new GCS_fei_definitions_BankAccountBban();
        $bankAccountBban->countryCode = "DE";
        $bankAccountBban->accountNumber = "0532013000";
        $bankAccountBban->bankCode = "37040044";
        $bankDetailsRequest->bankAccountBban = $bankAccountBban;

        $response = $client->merchant($merchantId)->services()->bankaccount($bankDetailsRequest);
        return $response;
    }

    /**
     * @return GCS_services_ConvertAmount
     * @throws GCS_ApiException
     */
    public function testConvertAmount()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $convertAmountParams = new GCS_Merchant_Services_ConvertAmountParams();

        $convertAmountParams->amount = 1000;
        $convertAmountParams->source = "USD";
        $convertAmountParams->target = "EUR";

        $response = $client->merchant($merchantId)->services()->convertAmount($convertAmountParams);
        return $response;
    }
}
