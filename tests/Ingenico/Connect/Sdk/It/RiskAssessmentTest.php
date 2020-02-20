<?php
namespace Ingenico\Connect\Sdk\It;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\AdditionalOrderInputAirlineData;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\AirlineData;
use Ingenico\Connect\Sdk\Domain\Definitions\AirlineFlightLeg;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use Ingenico\Connect\Sdk\Domain\Definitions\Card;
use Ingenico\Connect\Sdk\Domain\Definitions\ResultDoRiskAssessment;
use Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions\CustomerRiskAssessment;
use Ingenico\Connect\Sdk\Domain\Riskassessments\Definitions\OrderRiskAssessment;
use Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentBankAccount;
use Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentCard;
use Ingenico\Connect\Sdk\Domain\Riskassessments\RiskAssessmentResponse;

/**
 * @group integration
 *
 */
class RiskAssessmentTest extends ClientTestCase
{
    /**
     * @throws ApiException
     */
    public function testRiskAssessBankAccount()
    {
        $client = $this->getClient();
        $merchantId = $this->getMerchantId();

        $riskAssessmentBankAccount = new RiskAssessmentBankAccount();

        $bankAccountBban = new BankAccountBban();
        $bankAccountBban->countryCode = "DE";
        $bankAccountBban->accountNumber = "0532013000";
        $bankAccountBban->bankCode = "37040044";
        $riskAssessmentBankAccount->bankAccountBban = $bankAccountBban;

        $riskAssessmentOrder = new OrderRiskAssessment();

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->amount = 100;
        $amountOfMoney->currencyCode = "EUR";
        $riskAssessmentOrder->amountOfMoney = $amountOfMoney;

        $customer = new CustomerRiskAssessment();
        $customer->locale = "en";
        $riskAssessmentOrder->customer = $customer;
        $customerBillingAddress = new Address();
        $customerBillingAddress->countryCode = 'NL';
        $customer->billingAddress = $customerBillingAddress;
        $riskAssessmentOrder->customer = $customer;

        $riskAssessmentBankAccount->order = $riskAssessmentOrder;

        /** @var RiskAssessmentResponse $response */
        $response = $client->merchant($merchantId)->riskassessments()->bankaccounts($riskAssessmentBankAccount);
        $this->assertTrue(count($response->results) > 0);

        return $response;
    }
}
