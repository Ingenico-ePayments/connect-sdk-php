<?php
namespace Ingenico\Connect\Sdk\It;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroupResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroups;
use Ingenico\Connect\Sdk\Merchant\Productgroups\FindProductgroupsParams;
use Ingenico\Connect\Sdk\Merchant\Productgroups\GetProductgroupParams;

/**
 * @group integration
 *
 */
class ProductGroupTest extends ClientTestCase
{
    /**
     * @throws ApiException
     * @return PaymentProductGroupResponse
     */
    public function testRetrievePaymentProductGroup()
    {
        $client = $this->getClient();
        $merchantId = $this->getMerchantId();

        $getParams = new GetProductgroupParams();

        $getParams->amount = 1000;
        $getParams->currencyCode = "USD";
        $getParams->locale = "en_US";
        $getParams->countryCode = "US";
        $getParams->isRecurring = true;

        $paymentProductResponse = $client->merchant($merchantId)->productgroups()->get("cards", $getParams);
        $this->assertEquals("cards", $paymentProductResponse->id);
        return $paymentProductResponse;
    }
}
