<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\fei\definitions\BankAccountBban;
use GCS\Merchant\Services\ConvertAmountParams;
use GCS\services\BankDetailsRequest;
use GCS\services\BINLookupRequest;
use GCS\services\ConvertAmount;
use GCS\services\TestConnection;

/**
 * Class ServicesTest
 *
 * @package GCS\Client
 * @group   examples
 */
class ServicesTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * @return TestConnection
     */
    public function testTestConnection()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $response = $client->merchant($merchantId)->services()->testconnection();
        return $response;
    }

    /**
     * @throws ApiException
     */
    public function testRetrieveIINDetails()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $body = new BINLookupRequest();

        $body->bin = "4567350000427977";

        $response = $client->merchant($merchantId)->services()->getIINdetails($body);
        return $response;
    }

    /**
     * @throws ApiException
     */
    public function testConvertBankaccount()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $bankDetailsRequest = new BankDetailsRequest();

        $bankAccountBban = new BankAccountBban();
        $bankAccountBban->countryCode = "DE";
        $bankAccountBban->accountNumber = "0532013000";
        $bankAccountBban->bankCode = "37040044";
        $bankDetailsRequest->bankAccountBban = $bankAccountBban;

        $response = $client->merchant($merchantId)->services()->bankaccount($bankDetailsRequest);
        return $response;
    }

    /**
     * @return ConvertAmount
     *
     * @throws ApiException
     */
    public function testConvertAmount()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $convertAmountParams = new ConvertAmountParams();

        $convertAmountParams->amount = 1000;
        $convertAmountParams->source = "USD";
        $convertAmountParams->target = "EUR";

        $response = $client->merchant($merchantId)->services()->convertAmount($convertAmountParams);
        return $response;
    }
}
