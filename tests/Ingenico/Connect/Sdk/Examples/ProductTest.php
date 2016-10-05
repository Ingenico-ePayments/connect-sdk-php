<?php
namespace Ingenico\Connect\Sdk\Examples;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Product\Directory;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProducts;
use Ingenico\Connect\Sdk\Merchant\Products\DirectoryParams;
use Ingenico\Connect\Sdk\Merchant\Products\FindProductsParams;
use Ingenico\Connect\Sdk\Merchant\Products\GetProductParams;

/**
 * @group examples
 *
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

        $findParams = new FindProductsParams();

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
     * @return PaymentProducts
     */
    public function testRetrievePaymentProductsMultipleHide()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $findParams = new FindProductsParams();

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
     * @throws ApiException
     * @return PaymentProductResponse
     */
    public function testRetrievePaymentProductFields()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $getParams = new GetProductParams();

        $getParams->amount = 1000;
        $getParams->currencyCode = "USD";
        $getParams->locale = "en_US";
        $getParams->countryCode = "US";
        $getParams->isRecurring = true;

        $paymentProductResponse = $client->merchant($merchantId)->products()->get(1, $getParams);
        return $paymentProductResponse;
    }

    /**
     * @throws ApiException
     * @return Directory
     */
    public function testRetrievePaymentProductDirectory()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $directoryParams = new DirectoryParams();

        $directoryParams->currencyCode = "EUR";
        $directoryParams->countryCode = "NL";

        $productDirectory =
            $client->merchant($merchantId)->products()->directory(809, $directoryParams);
        return $productDirectory;
    }
}
