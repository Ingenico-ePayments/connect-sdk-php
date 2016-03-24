<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\Fei\Definitions\Address;
use GCS\Fei\Definitions\AmountOfMoney;
use GCS\HostedCheckout\CreateHostedCheckoutRequest;
use GCS\HostedCheckout\CreateHostedCheckoutResponse;
use GCS\HostedCheckout\Definitions\HostedCheckoutSpecificInput;
use GCS\HostedCheckout\GetHostedCheckoutResponse;
use GCS\Payment\Definitions\Customer;
use GCS\Payment\Definitions\Order;

/**
 * Class HostedCheckoutTest
 *
 * @package GCS\Client
 * @group   examples
 */
class HostedCheckoutTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * HOSTED CHECKOUT
     */

    /**
     * @return string
     *
     * @throws ApiException
     */
    public function testCreateHostedCheckout()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $createHostedCheckoutRequest = new CreateHostedCheckoutRequest();
        $order = new Order();

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->currencyCode = "USD";
        $amountOfMoney->amount = 2345;
        $order->amountOfMoney = $amountOfMoney;

        $customer = new Customer();

        $billingAddress = new Address();
        $billingAddress->countryCode = "US";
        $customer->billingAddress = $billingAddress;

        $order->customer = $customer;

        $createHostedCheckoutRequest->order = $order;

        $hostedCheckoutSpecificInput = new HostedCheckoutSpecificInput();
        $hostedCheckoutSpecificInput->locale = "en_GB";
        $hostedCheckoutSpecificInput->variant = "testVariant";
        $createHostedCheckoutRequest->hostedCheckoutSpecificInput = $hostedCheckoutSpecificInput;

        /** @var CreateHostedCheckoutResponse $createHostedCheckoutResponse */
        $createHostedCheckoutResponse = $client
            ->merchant($merchantId)
            ->hostedcheckouts()
            ->create($createHostedCheckoutRequest);
        return $createHostedCheckoutResponse->hostedCheckoutId;
    }

    /**
     * @param string $hostedCheckoutId
     *
     * @return string
     *
     * @throws ApiException
     *
     * @depends testCreateHostedCheckout
     */
    public function testGetHostedCheckoutStatus($hostedCheckoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var GetHostedCheckoutResponse $getHostedCheckoutResponse */
        $getHostedCheckoutResponse = $client->merchant($merchantId)->hostedcheckouts()->get($hostedCheckoutId);
        return $getHostedCheckoutResponse->status;
    }
}
