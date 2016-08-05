<?php

/**
 * @group examples
 *
 */
class GCS_Client_ProductGroupTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * @return GCS_product_PaymentProductGroups
     */
    public function testRetrievePaymentProductGroups()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $findParams = new GCS_Merchant_Productgroups_FindParams();

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
     * @throws GCS_ApiException
     * @return GCS_product_PaymentProductGroupResponse
     */
    public function testRetrievePaymentProductGroup()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $getParams = new GCS_Merchant_Productgroups_GetParams();

        $getParams->amount = 1000;
        $getParams->currencyCode = "USD";
        $getParams->locale = "en_US";
        $getParams->countryCode = "US";
        $getParams->isRecurring = true;

        $paymentProductResponse = $client->merchant($merchantId)->productgroups()->get("cards", $getParams);
        return $paymentProductResponse;
    }
}
