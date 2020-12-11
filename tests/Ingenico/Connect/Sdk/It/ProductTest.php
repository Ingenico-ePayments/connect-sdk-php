<?php
namespace Ingenico\Connect\Sdk\It;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Product\Directory;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProductResponse;
use Ingenico\Connect\Sdk\Domain\Product\PaymentProducts;
use Ingenico\Connect\Sdk\Merchant\Products\DirectoryParams;
use Ingenico\Connect\Sdk\Merchant\Products\FindProductsParams;
use Ingenico\Connect\Sdk\Merchant\Products\GetProductsParams;

/**
 * @group integration
 *
 */
class ProductTest extends ClientTestCase
{
    /**
     * @throws ApiException
     * @return PaymentProducts
     */
    public function testRetrievePaymentProducts()
    {
        $client = $this->getClient();
        $merchantId = $this->getMerchantId();
        $findParams = new FindProductsParams();

        $findParams->currencyCode = "EUR";
        $findParams->countryCode = "NL";

        $paymentProducts =
            $client->merchant($merchantId)->products()->find($findParams);
        $this->assertTrue(count($paymentProducts->paymentProducts) > 0);
        return $paymentProducts;
    }

    /**
     * @throws ApiException
     * @return Directory
     */
    public function testRetrievePaymentProductDirectory()
    {
        $client = $this->getClient();
        $merchantId = $this->getMerchantId();
        $directoryParams = new DirectoryParams();

        $directoryParams->currencyCode = "EUR";
        $directoryParams->countryCode = "NL";

        $productDirectory =
            $client->merchant($merchantId)->products()->directory(809, $directoryParams);
        $this->assertTrue(count($productDirectory->entries) > 0);
        return $productDirectory;
    }
}
