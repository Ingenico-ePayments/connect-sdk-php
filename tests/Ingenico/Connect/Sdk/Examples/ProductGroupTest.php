<?php
namespace Ingenico\Connect\Sdk\Examples;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroupResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductGroups;
use Ingenico\Connect\Sdk\Merchant\Productgroups\FindProductgroupsParams;
use Ingenico\Connect\Sdk\Merchant\Productgroups\GetProductgroupParams;

/**
 * @group examples
 *
 */
class ProductGroupTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * @return PaymentProductGroups
     */
    public function testRetrievePaymentProductGroups()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $findParams = new FindProductgroupsParams();

        $findParams->amount = 1000;
        $findParams->countryCode = "US";
        $findParams->currencyCode = "USD";
        $findParams->hide = "fields";
        $findParams->isRecurring = true;
        $findParams->locale = "en_US";

        $paymentProducts = $client->merchant($merchantId)->productgroups()->find($findParams);
        return $paymentProducts;
    }

    /**
     * @throws ApiException
     * @return PaymentProductGroupResponse
     */
    public function testRetrievePaymentProductGroup()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $getParams = new GetProductgroupParams();

        $getParams->amount = 1000;
        $getParams->currencyCode = "USD";
        $getParams->locale = "en_US";
        $getParams->countryCode = "US";
        $getParams->isRecurring = true;

        $paymentProductResponse = $client->merchant($merchantId)->productgroups()->get("cards", $getParams);
        return $paymentProductResponse;
    }
}
