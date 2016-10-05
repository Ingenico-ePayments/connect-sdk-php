<?php
namespace Ingenico\Connect\Sdk\Examples;

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
 * @group examples
 *
 */
class RiskAssessmentTest extends ClientTestCase
{
    const MERCHANT_ID = "9991";

    /**
     * RISK ASSESS CARD
     */

    /**
     * @return array|ResultDoRiskAssessment[]
     * @throws ApiException
     */
    public function testRiskAssessCard()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $riskAssessmentCard = new RiskAssessmentCard();

        $riskAssessmentCard->paymentProductId = 1;

        $card = new Card();
        $card->expiryDate = "0520";
        $card->cardNumber = "4063651370499176";
        $card->cvv = "123";
        $riskAssessmentCard->card = $card;

        $orderRiskAssessment = new OrderRiskAssessment();

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->amount = 0;
        $amountOfMoney->currencyCode = "USD";
        $orderRiskAssessment->amountOfMoney = $amountOfMoney;

        $customerRiskAssessment = new CustomerRiskAssessment();
        $customerRiskAssessment->locale = "en";
        $customerBillingAddress = new Address();
        $customerBillingAddress->countryCode = 'US';
        $customerRiskAssessment->billingAddress = $customerBillingAddress;
        $orderRiskAssessment->customer = $customerRiskAssessment;

        $airlineData = new AirlineData();
        $airlineData->code = "123";
        $airlineData->name = "Air France KLM";
        $airlineData->invoiceNumber = "123456";
        $airlineData->agentNumericCode = "123321";
        $airlineData->ticketNumber = "KLM20050000";
        $airlineData->pnr = "4JTGKT";
        $airlineData->isETicket = true;
        $airlineData->ticketDeliveryMethod = "e-ticket";
        $airlineData->passengerName = "WECOYOTE";
        $airlineData->pointOfSale = "IATA point of sale name";
        $airlineData->placeOfIssue = "Utah";
        $airlineData->flightDate = "20150102";
        $airlineData->isThirdParty = true;
        $airlineData->isRegisteredCustomer = true;
        $airlineData->posCityCode = "AMS";
        $airlineData->merchantCustomerId = "14";
        $airlineData->issueDate = "20150101";
        $airlineData->isRestrictedTicket = true;

        $airlineFlightLeg1 = new AirlineFlightLeg();
        $airlineFlightLeg1->number = 1;
        $airlineFlightLeg1->date = "20150102";
        $airlineFlightLeg1->originAirport = "BCN";
        $airlineFlightLeg1->arrivalAirport = "AMS";
        $airlineFlightLeg1->stopoverCode = "non-permitted";
        $airlineFlightLeg1->airlineClass = "1";
        $airlineFlightLeg1->carrierCode = "14";
        $airlineFlightLeg1->fareBasis = "INTERNET";
        $airlineFlightLeg1->flightNumber = "KL791";
        $airlineFlightLeg1->departureTime = "17:59";
        $airlineFlightLeg1->fare = "fare";

        $airlineFlightLeg2 = new AirlineFlightLeg();
        $airlineFlightLeg2->number = 2;
        $airlineFlightLeg2->date = "20150102";
        $airlineFlightLeg2->originAirport = "AMS";
        $airlineFlightLeg2->arrivalAirport = "BCN";
        $airlineFlightLeg2->stopoverCode = "non-permitted";
        $airlineFlightLeg2->airlineClass = "1";
        $airlineFlightLeg2->carrierCode = "14";
        $airlineFlightLeg2->fareBasis = "INTERNET";
        $airlineFlightLeg2->flightNumber = "KL792";
        $airlineFlightLeg2->departureTime = "23:59";
        $airlineFlightLeg2->fare = "fare";

        $airlineData->flightLegs = array($airlineFlightLeg1, $airlineFlightLeg2);

        $additionalInput = new AdditionalOrderInputAirlineData();
        $additionalInput->airlineData = $airlineData;

        $orderRiskAssessment->additionalInput = $additionalInput;

        $riskAssessmentCard->order = $orderRiskAssessment;

        /** @var RiskAssessmentResponse $riskAssessmentResponse */
        $riskAssessmentResponse = $client->merchant($merchantId)->riskassessments()->cards($riskAssessmentCard);
        return $riskAssessmentResponse->results;
    }

    /**
     * @throws ApiException
     */
    public function testRiskAssessBankAccount()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

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

        return $response;
    }
}
