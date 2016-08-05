<?php

/**
 * @group examples
 *
 */
class GCS_Client_TokenTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "20000";

    const MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST = "9991";

    /**
     * @return string
     * @throws GCS_ApiException
     */
    public function testCreateToken()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $createTokenRequest = new GCS_token_CreateTokenRequest();
        $createTokenRequest->paymentProductId = 705;

        $nonSepaDirectDebit = new GCS_token_definitions_TokenNonSepaDirectDebit();

        $mandateNonSepaDirectDebit = new GCS_token_definitions_MandateNonSepaDirectDebit();

        $paymentProduct705SpecificData =
            new GCS_token_definitions_TokenNonSepaDirectDebitPaymentProduct705SpecificData();
        $paymentProduct705SpecificData->authorisationId = "123456";

        $bankAccountBban = new GCS_fei_definitions_BankAccountBban();
        $bankAccountBban->accountNumber = "000000123456";
        $bankAccountBban->bankCode = "05428";
        $bankAccountBban->branchCode = "11101";
        $bankAccountBban->checkDigit = "X";
        $bankAccountBban->countryCode = "IT";
        $paymentProduct705SpecificData->bankAccountBban = $bankAccountBban;

        $mandateNonSepaDirectDebit->paymentProduct705SpecificData = $paymentProduct705SpecificData;

        $nonSepaDirectDebit->mandate = $mandateNonSepaDirectDebit;


        $customerToken = new GCS_token_definitions_CustomerToken();
        $customerToken->merchantCustomerId = "1234";

        $companyInformation = new GCS_fei_definitions_CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $customerToken->companyInformation = $companyInformation;

        $personalInformation = new GCS_payment_definitions_PersonalInformation();

        $personalNameToken = new GCS_token_definitions_PersonalNameToken();
        $personalNameToken->firstName = "Wile";
        $personalNameToken->surnamePrefix = "E.";
        $personalNameToken->surname = "Coyote";
        $personalInformation->name = $personalNameToken;

        $customerToken->personalInformation = $personalInformation;

        $billingAddress = new GCS_fei_definitions_Address();
        $billingAddress->city = "Monument Valley";
        $billingAddress->countryCode = "US";
        $billingAddress->houseNumber = "1";
        $billingAddress->additionalInfo = "Suite II";
        $billingAddress->state = "Utah";
        $billingAddress->street = "Desertroad";
        $billingAddress->zip = "84536";
        $customerToken->billingAddress = $billingAddress;

        $nonSepaDirectDebit->customer = $customerToken;

        $createTokenRequest->nonSepaDirectDebit = $nonSepaDirectDebit;

        $createTokenResponse = $client->merchant($merchantId)->tokens()->create($createTokenRequest);
        return $createTokenResponse->token;
    }

    /**
     * @param string $token
     * @return string
     * @throws GCS_ApiException
     * @depends testCreateToken
     */
    public function testRetrieveToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $client->merchant($merchantId)->tokens()->get($token);
        return $token;
    }

    /**
     * @param string $token
     * @return string
     * @throws GCS_ApiException
     * @depends testRetrieveToken
     */
    public function testUpdateToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $updateTokenRequest = new GCS_token_UpdateTokenRequest();

        $updateTokenRequest->paymentProductId = 705;

        $nonSepaDirectDebit = new GCS_token_definitions_TokenNonSepaDirectDebit();

        $mandateNonSepaDirectDebit = new GCS_token_definitions_MandateNonSepaDirectDebit();

        $paymentProduct705SpecificData =
            new GCS_token_definitions_TokenNonSepaDirectDebitPaymentProduct705SpecificData();
        $paymentProduct705SpecificData->authorisationId = "123456";

        $bankAccountBban = new GCS_fei_definitions_BankAccountBban();
        $bankAccountBban->accountNumber = "000000654321";
        $bankAccountBban->bankCode = "05428";
        $bankAccountBban->branchCode = "11101";
        $bankAccountBban->checkDigit = "X";
        $bankAccountBban->countryCode = "IT";
        $paymentProduct705SpecificData->bankAccountBban = $bankAccountBban;

        $mandateNonSepaDirectDebit->paymentProduct705SpecificData = $paymentProduct705SpecificData;

        $nonSepaDirectDebit->mandate = $mandateNonSepaDirectDebit;

        $customerToken = new GCS_token_definitions_CustomerToken();
        $customerToken->merchantCustomerId = "1234";

        $companyInformation = new GCS_fei_definitions_CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $customerToken->companyInformation = $companyInformation;

        $personalInformationToken = new GCS_token_definitions_PersonalInformationToken();

        $name = new GCS_token_definitions_PersonalNameToken();
        $name->firstName = "Wile";
        $name->surnamePrefix = "E.";
        $name->surname = "Coyote";
        $personalInformationToken->name = $name;

        $customerToken->personalInformation = $personalInformationToken;

        $billingAddress = new GCS_fei_definitions_Address();
        $billingAddress->city = "Monument Valley";
        $billingAddress->countryCode = "US";
        $billingAddress->houseNumber = "13";
        $billingAddress->additionalInfo = "b";
        $billingAddress->state = "Utah";
        $billingAddress->street = "Desertroad";
        $billingAddress->zip = "84536";
        $customerToken->billingAddress = $billingAddress;

        $nonSepaDirectDebit->customer = $customerToken;

        $updateTokenRequest->nonSepaDirectDebit = $nonSepaDirectDebit;

        $client->merchant($merchantId)->tokens()->update($token, $updateTokenRequest);

        return $token;
    }

    /**
     * @depends testUpdateToken
     * @param string $token
     * @throws GCS_ApiException
     */
    public function testDeleteToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $deleteParams = new GCS_Merchant_Tokens_DeleteParams();
        $deleteParams->mandateCancelDate = "20150102";
        $client->merchant($merchantId)->tokens()->delete($token, $deleteParams);
    }

    /**
     * @return string
     * @throws GCS_ApiException
     * @return GCS_token_CreateTokenResponse
     */
    public function testCreateSepaDirectDebitToken()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST;

        $createTokenRequest = new GCS_token_CreateTokenRequest();
        $createTokenRequest->paymentProductId = 701;

        $sepaDirectDebitToken = new GCS_token_definitions_TokenSepaDirectDebitWithoutCreditor();

        $sepaDirectDebitMandate = new GCS_token_definitions_MandateSepaDirectDebit();

        $bankAccountIban = new GCS_fei_definitions_BankAccountIban();
        $bankAccountIban->accountHolderName = "Paul";
        $bankAccountIban->iban = "IT60X0542811101000000123456";
        $sepaDirectDebitMandate->bankAccountIban = $bankAccountIban;

        $sepaDirectDebitMandate->customerContractIdentifier = "23424242323422322";

        $debtor = new GCS_token_definitions_Debtor();
        $debtor->firstName = "Paul";
        $debtor->surnamePrefix = "van de";
        $debtor->surname = "Loonseduinen";
        $debtor->street = "Dorpsstraat";
        $debtor->houseNumber = "1";
        $debtor->additionalAddressInfo = "A";
        $debtor->zip = "1009AA";
        $debtor->city = "Amsterdam";
        $debtor->state = "Noord-Holland";
        $debtor->stateCode = "NH";
        $debtor->countryCode = "NL";
        $sepaDirectDebitMandate->debtor = $debtor;

        $sepaDirectDebitMandate->isRecurring = true;

        $sepaDirectDebitToken->mandate = $sepaDirectDebitMandate;

        $customerToken = new GCS_token_definitions_CustomerTokenWithContactDetails();
        $customerToken->merchantCustomerId = "1234";

        $companyInformation = new GCS_fei_definitions_CompanyInformation();
        $companyInformation->name = "ISAAC";
        $customerToken->companyInformation = $companyInformation;

        $personalInformation = new GCS_payment_definitions_PersonalInformation();

        $personalNameToken = new GCS_token_definitions_PersonalNameToken();
        $personalNameToken->firstName = "Mies";
        $personalNameToken->surnamePrefix = "van der";
        $personalNameToken->surname = "Heijden";
        $personalInformation->name = $personalNameToken;
        $customerToken->personalInformation = $personalInformation;

        $contactDetailsToken = new GCS_token_definitions_ContactDetailsToken();
        $contactDetailsToken->emailAddress = "mies@isaac.nl";
        $contactDetailsToken->emailMessageType = "plain-text";
        $customerToken->contactDetails = $contactDetailsToken;

        $billingAddress = new GCS_fei_definitions_Address();
        $billingAddress->city = "Eindhoven";
        $billingAddress->countryCode = "NL";
        $billingAddress->houseNumber = "16";
        $billingAddress->additionalInfo = "a";
        $billingAddress->state = "Noord-Brabant";
        $billingAddress->stateCode = "NB";
        $billingAddress->street = "Marconilaan";
        $billingAddress->zip = "5555AA";
        $customerToken->billingAddress = $billingAddress;

        $sepaDirectDebitToken->customer = $customerToken;

        $createTokenRequest->sepaDirectDebit = $sepaDirectDebitToken;
        $createTokenRequest->paymentProductId = 770;

        /** @var GCS_token_CreateTokenResponse $createTokenResponse */
        $createTokenResponse = $client->merchant($merchantId)->tokens()->create($createTokenRequest);
        return $createTokenResponse;
    }

    /**
     * @depends testCreateSepaDirectDebitToken
     * @param GCS_token_CreateTokenResponse $createTokenResponse
     * @throws GCS_ApiException
     * @return string
     */
    public function testApproveSepaDirectDebitToken(GCS_token_CreateTokenResponse $createTokenResponse)
    {
        $token = $createTokenResponse->token;
        if ($createTokenResponse->isNewToken) {
            $client = $this->getClient();
            $merchantId = self::MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST;

            $approveTokenRequest = new GCS_token_ApproveTokenRequest();
            $approveTokenRequest->mandateSignaturePlace = "Eindhoven";
            $approveTokenRequest->mandateSignatureDate = "20131018";
            $approveTokenRequest->mandateSigned = true;

            $client->merchant($merchantId)->tokens()->approvesepadirectdebit($token, $approveTokenRequest);
        }
        return $token;
    }

    /**
     * @depends testApproveSepaDirectDebitToken
     * @param string $token
     * @throws GCS_ApiException
     */
    public function testDeleteSepaDirectDebitToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST;

        $deleteParams = new GCS_Merchant_Tokens_DeleteParams();
        $deleteParams->mandateCancelDate = "20150102";

        $client->merchant($merchantId)->tokens()->delete($token, $deleteParams);
    }
}
