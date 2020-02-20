<?php
namespace Ingenico\Connect\Sdk\It;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use Ingenico\Connect\Sdk\Domain\Services\BankDetailsRequest;
use Ingenico\Connect\Sdk\Domain\Services\ConvertAmount;
use Ingenico\Connect\Sdk\Domain\Services\GetIINDetailsRequest;
use Ingenico\Connect\Sdk\Merchant\Services\ConvertAmountParams;

/**
 * @group integration
 *
 */
class ProxyTest extends ClientTestCase
{
    /**
     * @return ConvertAmount
     * @throws ApiException
     */
    public function testConvertAmount()
    {
        $client = $this->getProxyClient();
        $merchantId = $this->getMerchantId();
        $convertAmountParams = new ConvertAmountParams();

        $convertAmountParams->amount = 1000;
        $convertAmountParams->source = "USD";
        $convertAmountParams->target = "EUR";

        $response = $client->merchant($merchantId)->services()->convertAmount($convertAmountParams);
        $this->assertNotNull($response->convertedAmount);

        return $response;
    }
}
