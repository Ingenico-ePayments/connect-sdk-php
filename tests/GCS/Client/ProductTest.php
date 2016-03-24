<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\Merchant\Products\FindParams;
use GCS\Merchant\Products\GetParams;
use GCS\Merchant\Products\PaymentProduct\DirectoryParams;
use GCS\Product\Directory;
use GCS\Product\PaymentProductResponse;
use GCS\Product\PaymentProducts;

/**
 * Class ProductTest
 *
 * @package GCS\Client
 * @group   examples
 */
class ProductTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * @return PaymentProducts
     */
    public function testRetrievePaymentProducts()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $findParams = new FindParams();

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
     * @return PaymentProductResponse
     *
     * @throws ApiException
     */
    public function testRetrievePaymentProductFields()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $getParams = new GetParams();

        $getParams->amount = 1000;
        $getParams->currencyCode = "USD";
        $getParams->locale = "en_US";
        $getParams->countryCode = "US";
        $getParams->isRecurring = true;

        $paymentProductResponse = $client->merchant($merchantId)->products()->get(1, $getParams);
        return $paymentProductResponse;
    }

    /**
     * @return Directory
     *
     * @throws ApiException
     */
    public function testRetrievePaymentProductDirectory()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $directoryParams = new DirectoryParams();

        $directoryParams->currencyCode = "EUR";
        $directoryParams->countryCode = "NL";

        $productDirectory = $client
            ->merchant($merchantId)
            ->products()
            ->paymentProduct(809)
            ->directory($directoryParams);

        return $productDirectory;
    }
}
