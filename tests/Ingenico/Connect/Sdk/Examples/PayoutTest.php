<?php
namespace Ingenico\Connect\Sdk\Examples;

use DateInterval;
use DateTime;
use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Definitions\CompanyInformation;
use Ingenico\Connect\Sdk\Domain\Definitions\ContactDetailsBase;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalName;
use Ingenico\Connect\Sdk\Domain\Payout\ApprovePayoutRequest;
use Ingenico\Connect\Sdk\Domain\Payout\CreatePayoutRequest;
use Ingenico\Connect\Sdk\Domain\Payout\PayoutResponse;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutCustomer;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutReferences;

/**
 * @group examples
 *
 */
class PayoutTest extends ClientTestCase
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
     * @return string
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
     * @throws ApiException
     * @return string
     */
    public function testApprovePayout($payoutId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $body = new ApprovePayoutRequest();
        $payoutDate = new DateTime();
        $payoutDate->add(new DateInterval("P7D"));
        $body->datePayout = $payoutDate->format('Ymd');

        /** @var PayoutResponse $payoutResponse */
        $payoutResponse = $client->merchant($merchantId)->payouts()->approve($payoutId, $body);

        return $payoutResponse->id;
    }

    /**
     * @depends testApprovePayout
     * @param string $payoutId
     * @return string
     * @throws ApiException, ErrorResponse
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
