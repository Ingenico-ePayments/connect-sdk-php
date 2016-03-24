<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\errors\ErrorResponse;
use GCS\fei\definitions\Address;
use GCS\fei\definitions\AmountOfMoney;
use GCS\fei\definitions\BankAccountIban;
use GCS\fei\definitions\CompanyInformation;
use GCS\fei\definitions\ContactDetailsBase;
use GCS\payment\definitions\PersonalName;
use GCS\payout\ApprovePayoutRequest;
use GCS\payout\CreatePayoutRequest;
use GCS\payout\definitions\PayoutCustomer;
use GCS\payout\definitions\PayoutReferences;
use GCS\payout\PayoutResponse;

/**
 * Class PayoutTest
 *
 * @package GCS\Client
 * @group examples
 */
class PayoutTest extends ClientTestCase
{
    const MERCHANT_ID = "8897";

    /**
     * @return string
     *
     * @throws \Exception
     */
    public function testCreatePayout()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $createPayoutRequest = new CreatePayoutRequest();

        $createPayoutRequest->payoutText = "Payout Acme";
        $createPayoutRequest->payoutDate = "20150102";
        $createPayoutRequest->swiftCode = "swift";

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->amount = 2345;
        $amountOfMoney->currencyCode = "EUR";
        $createPayoutRequest->amountOfMoney = $amountOfMoney;

        $bankAccountIban = new BankAccountIban();
        $bankAccountIban->iban = "NL91ABNA0417164300";
        $bankAccountIban->accountHolderName = "J.Cruijff";
        $createPayoutRequest->bankAccountIban = $bankAccountIban;

        $payoutReferences = new PayoutReferences();
        $payoutReferences->merchantReference = "AcmeOrder0001";
        $createPayoutRequest->references = $payoutReferences;

        $payoutCustomer = new PayoutCustomer();

        $contactDetailsBase = new ContactDetailsBase();
        $contactDetailsBase->emailAddress = "wile.e.coyote@acmelabs.com";
        $payoutCustomer->contactDetails = $contactDetailsBase;

        $companyInformation = new CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $payoutCustomer->companyInformation = $companyInformation;

        $address = new Address();
        $address->countryCode = "FR";
        $address->street = "N Hollywood Way";
        $address->houseNumber = "411";
        $address->zip = "91505";
        $address->city = "Burbank";
        $address->state = "California";
        $payoutCustomer->address = $address;

        $personalName = new PersonalName();
        $personalName->title = "Mr.";
        $personalName->firstName = "Wile";
        $personalName->surnamePrefix = "E.";
        $personalName->surname = "Coyote";
        $payoutCustomer->name = $personalName;

        $createPayoutRequest->customer = $payoutCustomer;

        /** @var PayoutResponse $payoutResponse */
        $payoutResponse = $client->merchant($merchantId)->payouts()->create($createPayoutRequest);

        return $payoutResponse->id;

    }

    /**
     * @depends testCreatePayout
     * @param string $payoutId
     *
     * @return string
     *
     * @throws ApiException
     */
    public function testRetrievePayout($payoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        /** @var PayoutResponse $payoutResponse */
        $payoutResponse = $client->merchant($merchantId)->payouts()->get($payoutId);
        return $payoutResponse->id;
    }

    /**
     * @depends testRetrievePayout
     * @param string $payoutId
     *
     * @throws ApiException
     *
     * @return string
     */
    public function testApprovePayout($payoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $body = new ApprovePayoutRequest();
        $body->datePayout = "20150502";

        /** @var PayoutResponse $payoutResponse */
        $payoutResponse = $client->merchant($merchantId)->payouts()->approve($payoutId, $body);

        return $payoutResponse->id;
    }

    /**
     * @depends testApprovePayout
     *
     * @param string $payoutId
     *
     * @return string
     *
     * @throws ApiException
     * @throws ErrorResponse
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
     *
     * @return string
     *
     * @throws ApiException
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
