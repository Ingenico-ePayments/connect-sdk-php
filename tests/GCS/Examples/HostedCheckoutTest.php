<?php

/**
 * @group examples
 *
 */
class GCS_Client_HostedCheckoutTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "20000";

    /**
     * HOSTED CHECKOUT
     */

    /**
     * @throws GCS_ApiException
     * @return string
     */
    public function testCreateHostedCheckout()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $createHostedCheckoutRequest = new GCS_hostedcheckout_CreateHostedCheckoutRequest();
        $order = new GCS_payment_definitions_Order();

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->currencyCode = "USD";
        $amountOfMoney->amount = 2345;
        $order->amountOfMoney = $amountOfMoney;

        $customer = new GCS_payment_definitions_Customer();

        $billingAddress = new GCS_fei_definitions_Address();
        $billingAddress->countryCode = "US";
        $customer->billingAddress = $billingAddress;

        $order->customer = $customer;

        $createHostedCheckoutRequest->order = $order;

        $hostedCheckoutSpecificInput = new GCS_hostedcheckout_definitions_HostedCheckoutSpecificInput();
        $hostedCheckoutSpecificInput->locale = "en_GB";
        $hostedCheckoutSpecificInput->variant = "testVariant";
        $createHostedCheckoutRequest->hostedCheckoutSpecificInput = $hostedCheckoutSpecificInput;

        /** @var GCS_hostedcheckout_CreateHostedCheckoutResponse $createHostedCheckoutResponse */
        $createHostedCheckoutResponse =
            $client->merchant($merchantId)->hostedcheckouts()->create($createHostedCheckoutRequest);
        return $createHostedCheckoutResponse->hostedCheckoutId;
    }

    /**
     * @depends testCreateHostedCheckout
     * @param string $hostedCheckoutId
     * @throws GCS_ApiException
     * @return string
     */
    public function testGetHostedCheckoutStatus($hostedCheckoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var GCS_hostedcheckout_GetHostedCheckoutResponse $getHostedCheckoutResponse */
        $getHostedCheckoutResponse = $client->merchant($merchantId)->hostedcheckouts()->get($hostedCheckoutId);
        return $getHostedCheckoutResponse->status;
    }
}
