<?php
namespace Ingenico\Connect\Sdk\Examples;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\CreateHostedCheckoutRequest;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\CreateHostedCheckoutResponse;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\GetHostedCheckoutResponse;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions\HostedCheckoutSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Customer;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;

/**
 * @group examples
 *
 */
class HostedCheckoutTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * HOSTED CHECKOUT
     */

    /**
     * @throws ApiException
     * @return string
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
        $createHostedCheckoutResponse =
            $client->merchant($merchantId)->hostedcheckouts()->create($createHostedCheckoutRequest);
        return $createHostedCheckoutResponse->hostedCheckoutId;
    }

    /**
     * @depends testCreateHostedCheckout
     * @param string $hostedCheckoutId
     * @throws ApiException
     * @return string
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
