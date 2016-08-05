<?php

/**
 * @group examples
 *
 */
class GCS_Client_ProductTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * @return GCS_product_PaymentProducts
     */
    public function testRetrievePaymentProducts()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $findParams = new GCS_Merchant_Products_FindParams();

        $findParams->amount = 1000;
        $findParams->countryCode = "US";
        $findParams->currencyCode = "USD";
        $findParams->hide = "fields";
        $findParams->isRecurring = true;
        $findParams->locale = "en_US";

        $paymentProducts = $client->merchant($merchantId)->products()->find($findParams);
        return $paymentProducts;
    }

    /**
     * @return GCS_product_PaymentProducts
     */
    public function testRetrievePaymentProductsMultipleHide()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $findParams = new GCS_Merchant_Products_FindParams();

        $findParams->amount = 1000;
        $findParams->countryCode = "US";
        $findParams->currencyCode = "USD";
        $findParams->hide = array("fields", "accountsOnFile");
        $findParams->isRecurring = true;
        $findParams->locale = "en_US";

        $paymentProducts = $client->merchant($merchantId)->products()->find($findParams);
        return $paymentProducts;
    }

    /**
     * @throws GCS_ApiException
     * @return GCS_product_PaymentProductResponse
     */
    public function testRetrievePaymentProductFields()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $getParams = new GCS_Merchant_Products_GetParams();

        $getParams->amount = 1000;
        $getParams->currencyCode = "USD";
        $getParams->locale = "en_US";
        $getParams->countryCode = "US";
        $getParams->isRecurring = true;

        $paymentProductResponse = $client->merchant($merchantId)->products()->get(1, $getParams);
        return $paymentProductResponse;
    }

    /**
     * @throws GCS_ApiException
     * @return GCS_product_Directory
     */
    public function testRetrievePaymentProductDirectory()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $directoryParams = new GCS_Merchant_Products_DirectoryParams();

        $directoryParams->currencyCode = "EUR";
        $directoryParams->countryCode = "NL";

        $productDirectory =
            $client->merchant($merchantId)->products()->directory(809, $directoryParams);
        return $productDirectory;
    }
}
