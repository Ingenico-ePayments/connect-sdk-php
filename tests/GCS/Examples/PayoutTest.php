<?php

/**
 * @group examples
 *
 */
class GCS_Client_PayoutTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "8897";

    /**
     * @return string
     * @throws Exception
     */
    public function testCreatePayout()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $createPayoutRequest = new GCS_payout_CreatePayoutRequest();

        $createPayoutRequest->payoutText = "Payout Acme";
        $createPayoutRequest->payoutDate = "20150102";
        $createPayoutRequest->swiftCode = "swift";

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->amount = 2345;
        $amountOfMoney->currencyCode = "EUR";
        $createPayoutRequest->amountOfMoney = $amountOfMoney;

        $bankAccountIban = new GCS_fei_definitions_BankAccountIban();
        $bankAccountIban->iban = "NL91ABNA0417164300";
        $bankAccountIban->accountHolderName = "J.Cruijff";
        $createPayoutRequest->bankAccountIban = $bankAccountIban;

        $payoutReferences = new GCS_payout_definitions_PayoutReferences();
        $payoutReferences->merchantReference = "AcmeOrder0001";
        $createPayoutRequest->references = $payoutReferences;

        $payoutCustomer = new GCS_payout_definitions_PayoutCustomer();

        $contactDetailsBase = new GCS_fei_definitions_ContactDetailsBase();
        $contactDetailsBase->emailAddress = "wile.e.coyote@acmelabs.com";
        $payoutCustomer->contactDetails = $contactDetailsBase;

        $companyInformation = new GCS_fei_definitions_CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $payoutCustomer->companyInformation = $companyInformation;

        $address = new GCS_fei_definitions_Address();
        $address->countryCode = "FR";
        $address->street = "N Hollywood Way";
        $address->houseNumber = "411";
        $address->zip = "91505";
        $address->city = "Burbank";
        $address->state = "California";
        $payoutCustomer->address = $address;

        $personalName = new GCS_payment_definitions_PersonalName();
        $personalName->title = "Mr.";
        $personalName->firstName = "Wile";
        $personalName->surnamePrefix = "E.";
        $personalName->surname = "Coyote";
        $payoutCustomer->name = $personalName;

        $createPayoutRequest->customer = $payoutCustomer;

        /** @var GCS_payout_PayoutResponse $payoutResponse */
        $payoutResponse = $client->merchant($merchantId)->payouts()->create($createPayoutRequest);

        return $payoutResponse->id;

    }

    /**
     * @depends testCreatePayout
     * @param string $payoutId
     * @return string
     * @throws GCS_ApiException
     */
    public function testRetrievePayout($payoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        /** @var GCS_payout_PayoutResponse $payoutResponse */
        $payoutResponse = $client->merchant($merchantId)->payouts()->get($payoutId);
        return $payoutResponse->id;
    }

    /**
     * @depends testRetrievePayout
     * @param string $payoutId
     * @throws GCS_ApiException
     * @return string
     */
    public function testApprovePayout($payoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $body = new GCS_payout_ApprovePayoutRequest();
        $body->datePayout = "20150502";

        /** @var GCS_payout_PayoutResponse $payoutResponse */
        $payoutResponse = $client->merchant($merchantId)->payouts()->approve($payoutId, $body);

        return $payoutResponse->id;
    }

    /**
     * @depends testApprovePayout
     * @param string $payoutId
     * @return string
     * @throws GCS_ApiException, GCS_errors_ErrorResponse
     */
    public function testCancelApprovePayout($payoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $client->merchant($merchantId)->payouts()->cancelapproval($payoutId);
        return $payoutId;
    }

    /**
     * @depends testCancelApprovePayout
     * @param string $payoutId
     * @return string
     * @throws GCS_ApiException
     */
    public function testCancelPayout($payoutId)
    {
        $this->testApprovePayout($payoutId);
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $client->merchant($merchantId)->payouts()->cancel($payoutId);
        return $payoutId;
    }
}
