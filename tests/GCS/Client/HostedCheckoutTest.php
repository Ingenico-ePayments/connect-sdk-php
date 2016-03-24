<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\fei\definitions\Address;
use GCS\fei\definitions\AmountOfMoney;
use GCS\hostedcheckout\CreateHostedCheckoutRequest;
use GCS\hostedcheckout\CreateHostedCheckoutResponse;
use GCS\hostedcheckout\definitions\HostedCheckoutSpecificInput;
use GCS\hostedcheckout\GetHostedCheckoutResponse;
use GCS\payment\definitions\Customer;
use GCS\payment\definitions\Order;

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
