<?php

/**
 * @group examples
 *
 */
class GCS_Client_RiskAssessmentTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "9991";

    /**
     * RISK ASSESS CARD
     */

    /**
     * @return array|GCS_fei_definitions_ResultDoRiskAssessment[]
     * @throws GCS_ApiException
     */
    public function testRiskAssessCard()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $riskAssessmentCard = new GCS_riskassessments_RiskAssessmentCard();

        $riskAssessmentCard->paymentProductId = 1;

        $card = new GCS_fei_definitions_Card();
        $card->expiryDate = "0520";
        $card->cardNumber = "4063651370499176";
        $card->cvv = "123";
        $riskAssessmentCard->card = $card;

        $orderRiskAssessment = new GCS_riskassessments_definitions_OrderRiskAssessment();

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->amount = 0;
        $amountOfMoney->currencyCode = "USD";
        $orderRiskAssessment->amountOfMoney = $amountOfMoney;

        $customerRiskAssessment = new GCS_riskassessments_definitions_CustomerRiskAssessment();
        $customerRiskAssessment->locale = "en";
        $customerBillingAddress = new GCS_fei_definitions_Address();
        $customerBillingAddress->countryCode = 'US';
        $customerRiskAssessment->billingAddress = $customerBillingAddress;
        $orderRiskAssessment->customer = $customerRiskAssessment;

        $airlineData = new GCS_fei_definitions_AirlineData();
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

        $airlineFlightLeg1 = new GCS_fei_definitions_AirlineFlightLeg();
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

        $airlineFlightLeg2 = new GCS_fei_definitions_AirlineFlightLeg();
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

        $additionalInput = new GCS_fei_definitions_AdditionalOrderInputAirlineData();
        $additionalInput->airlineData = $airlineData;

        $orderRiskAssessment->additionalInput = $additionalInput;

        $riskAssessmentCard->order = $orderRiskAssessment;

        /** @var GCS_riskassessments_RiskAssessmentResponse $riskAssessmentResponse */
        $riskAssessmentResponse = $client->merchant($merchantId)->riskassessments()->cards($riskAssessmentCard);
        return $riskAssessmentResponse->results;
    }

    /**
     * @throws GCS_ApiException
     */
    public function testRiskAssessBankAccount()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $riskAssessmentBankAccount = new GCS_riskassessments_RiskAssessmentBankAccount();

        $bankAccountBban = new GCS_fei_definitions_BankAccountBban();
        $bankAccountBban->countryCode = "DE";
        $bankAccountBban->accountNumber = "0532013000";
        $bankAccountBban->bankCode = "37040044";
        $riskAssessmentBankAccount->bankAccountBban = $bankAccountBban;

        $riskAssessmentOrder = new GCS_riskassessments_definitions_OrderRiskAssessment();

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->amount = 100;
        $amountOfMoney->currencyCode = "EUR";
        $riskAssessmentOrder->amountOfMoney = $amountOfMoney;

        $customer = new GCS_riskassessments_definitions_CustomerRiskAssessment();
        $customer->locale = "en";
        $riskAssessmentOrder->customer = $customer;
        $customerBillingAddress = new GCS_fei_definitions_Address();
        $customerBillingAddress->countryCode = 'NL';
        $customer->billingAddress = $customerBillingAddress;
        $riskAssessmentOrder->customer = $customer;

        $riskAssessmentBankAccount->order = $riskAssessmentOrder;

        /** @var GCS_riskassessments_RiskAssessmentResponse $response */
        $response = $client->merchant($merchantId)->riskassessments()->bankaccounts($riskAssessmentBankAccount);

        return $response;
    }
}
