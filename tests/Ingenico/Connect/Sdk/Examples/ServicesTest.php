<?php
namespace Ingenico\Connect\Sdk\Examples;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use Ingenico\Connect\Sdk\Domain\Services\BankDetailsRequest;
use Ingenico\Connect\Sdk\Domain\Services\ConvertAmount;
use Ingenico\Connect\Sdk\Domain\Services\GetIINDetailsRequest;
use Ingenico\Connect\Sdk\Merchant\Services\ConvertAmountParams;

/**
 * @group examples
 *
 */
class ServicesTest extends ClientTestCase
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
     * @throws ApiException
     */
    public function testRetrieveIINDetails()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $body = new GetIINDetailsRequest();

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
