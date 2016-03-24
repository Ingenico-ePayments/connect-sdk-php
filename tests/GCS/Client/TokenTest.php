<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\Fei\Definitions\Address;
use GCS\Fei\Definitions\BankAccountBban;
use GCS\Fei\Definitions\BankAccountIban;
use GCS\Fei\Definitions\CompanyInformation;
use GCS\Merchant\Tokens\DeleteParams;
use GCS\Payment\Definitions\PersonalInformation;
use GCS\Token\ApproveTokenRequest;
use GCS\Token\CreateTokenRequest;
use GCS\Token\CreateTokenResponse;
use GCS\Token\Definitions\ContactDetailsToken;
use GCS\Token\Definitions\CustomerToken;
use GCS\Token\Definitions\CustomerTokenWithContactDetails;
use GCS\Token\Definitions\Debtor;
use GCS\Token\Definitions\MandateNonSepaDirectDebit;
use GCS\Token\Definitions\MandateSepaDirectDebit;
use GCS\Token\Definitions\PersonalInformationToken;
use GCS\Token\Definitions\PersonalNameToken;
use GCS\Token\Definitions\TokenNonSepaDirectDebit;
use GCS\Token\Definitions\TokenNonSepaDirectDebitPaymentProduct705SpecificData;
use GCS\Token\Definitions\TokenSepaDirectDebitWithoutCreditor;
use GCS\Token\UpdateTokenRequest;

/**
 * Class TokenTest
 *
 * @package GCS\Client
 * @group   examples
 */
class TokenTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    const MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST = "9991";

    /**
     * @return string
     *
     * @throws ApiException
     */
    public function testCreateToken()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $createTokenRequest = new CreateTokenRequest();
        $createTokenRequest->paymentProductId = 705;

        $nonSepaDirectDebit = new TokenNonSepaDirectDebit();

        $mandateNonSepaDirectDebit = new MandateNonSepaDirectDebit();

		$paymentProduct705SpecificData = new TokenNonSepaDirectDebitPaymentProduct705SpecificData();
        $paymentProduct705SpecificData->authorisationId = "123456";

        $bankAccountBban = new BankAccountBban();
        $bankAccountBban->accountNumber = "000000123456";
        $bankAccountBban->bankCode = "05428";
        $bankAccountBban->branchCode = "11101";
        $bankAccountBban->checkDigit = "X";
        $bankAccountBban->countryCode = "IT";
		$paymentProduct705SpecificData->bankAccountBban = $bankAccountBban;

        $mandateNonSepaDirectDebit->paymentProduct705SpecificData = $paymentProduct705SpecificData;

        $nonSepaDirectDebit->mandate = $mandateNonSepaDirectDebit;


        $customerToken = new CustomerToken();
        $customerToken->merchantCustomerId = "1234";

        $companyInformation = new CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $customerToken->companyInformation = $companyInformation;

        $personalInformation = new PersonalInformation();

        $personalNameToken = new PersonalNameToken();
        $personalNameToken->firstName = "Wile";
        $personalNameToken->surnamePrefix = "E.";
        $personalNameToken->surname = "Coyote";
        $personalInformation->name = $personalNameToken;

        $customerToken->personalInformation = $personalInformation;

        $billingAddress = new Address();
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
     *
     * @return string
     *
     * @throws ApiException
     *
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
     *
     * @return string
     *
     * @throws ApiException
     *
     * @depends testRetrieveToken
     */
    public function testUpdateToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $updateTokenRequest = new UpdateTokenRequest();

        $updateTokenRequest->paymentProductId = 701;

        $nonSepaDirectDebit = new TokenNonSepaDirectDebit();

        $mandateNonSepaDirectDebit = new MandateNonSepaDirectDebit();
        $mandateNonSepaDirectDebit->authorisationId = "123456";
        $mandateNonSepaDirectDebit->addressLine1 = "Wile E. Coyote";
        $mandateNonSepaDirectDebit->addressLine2 = "N Hollywood Way";
        $mandateNonSepaDirectDebit->addressLine3 = "91505 Burbank";
        $mandateNonSepaDirectDebit->addressLine4 = "United States";

        $bankAccountBban = new BankAccountBban();
        $bankAccountBban->accountNumber = "000000654321";
        $bankAccountBban->bankCode = "05428";
        $bankAccountBban->branchCode = "11101";
        $bankAccountBban->checkDigit = "X";
        $bankAccountBban->countryCode = "IT";
        $mandateNonSepaDirectDebit->bankAccountBban = $bankAccountBban;

        $nonSepaDirectDebit->mandate = $mandateNonSepaDirectDebit;

        $customerToken = new CustomerToken();
        $customerToken->merchantCustomerId = "1234";

        $companyInformation = new CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $customerToken->companyInformation = $companyInformation;

        $personalInformationToken = new PersonalInformationToken();

        $name = new PersonalNameToken();
        $name->firstName = "Wile";
        $name->surnamePrefix = "E.";
        $name->surname = "Coyote";
        $personalInformationToken->name = $name;

        $customerToken->personalInformation = $personalInformationToken;

        $billingAddress = new Address();
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
     * @param string $token
     *
     * @throws ApiException
     *
     * @depends testUpdateToken
     */
    public function testDeleteToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $deleteParams = new DeleteParams();
        $deleteParams->mandateCancelDate = "20150102";
        $client->merchant($merchantId)->tokens()->delete($token, $deleteParams);
    }

    /**
     * @return string|CreateTokenResponse
     *
     * @throws ApiException
     */
    public function testCreateSepaDirectDebitToken()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST;

        $createTokenRequest = new CreateTokenRequest();
        $createTokenRequest->paymentProductId = 701;

        $sepaDirectDebitToken = new TokenSepaDirectDebitWithoutCreditor();

        $sepaDirectDebitMandate = new MandateSepaDirectDebit();

        $bankAccountIban = new BankAccountIban();
        $bankAccountIban->accountHolderName = "Paul";
        $bankAccountIban->iban = "IT60X0542811101000000123456";
        $sepaDirectDebitMandate->bankAccountIban = $bankAccountIban;

        $sepaDirectDebitMandate->customerContractIdentifier = "23424242323422322";

        $debtor = new Debtor();
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

        $customerToken = new CustomerTokenWithContactDetails();
        $customerToken->merchantCustomerId = "1234";

        $companyInformation = new CompanyInformation();
        $companyInformation->name = "ISAAC";
        $customerToken->companyInformation = $companyInformation;

        $personalInformation = new PersonalInformation();

        $personalNameToken = new PersonalNameToken();
        $personalNameToken->firstName = "Mies";
        $personalNameToken->surnamePrefix = "van der";
        $personalNameToken->surname = "Heijden";
        $personalInformation->name = $personalNameToken;
        $customerToken->personalInformation = $personalInformation;

        $contactDetailsToken = new ContactDetailsToken();
        $contactDetailsToken->emailAddress = "mies@isaac.nl";
        $contactDetailsToken->emailMessageType = "plain-text";
        $customerToken->contactDetails = $contactDetailsToken;

        $billingAddress = new Address();
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

        /** @var CreateTokenResponse $createTokenResponse */
        $createTokenResponse = $client->merchant($merchantId)->tokens()->create($createTokenRequest);
        return $createTokenResponse;
    }

    /**
     * @param CreateTokenResponse $createTokenResponse
     *
     * @return string
     *
     * @throws ApiException
     *
     * @depends testCreateSepaDirectDebitToken
     */
    public function testApproveSepaDirectDebitToken(CreateTokenResponse $createTokenResponse)
    {
        $token = $createTokenResponse->token;
        if ($createTokenResponse->isNewToken) {
            $client = $this->getClient();
            $merchantId = self::MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST;

            $approveTokenRequest = new ApproveTokenRequest();
            $approveTokenRequest->mandateSignaturePlace = "Eindhoven";
            $approveTokenRequest->mandateSignatureDate = "20131018";
            $approveTokenRequest->mandateSigned = true;

            $client->merchant($merchantId)->tokens()->approvesepadirectdebit($token, $approveTokenRequest);
        }
        return $token;
    }

    /**
     * @param string $token
     *
     * @throws ApiException
     *
     * @depends testApproveSepaDirectDebitToken
     */
    public function testDeleteSepaDirectDebitToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST;

        $deleteParams = new DeleteParams();
        $deleteParams->mandateCancelDate = "20150102";

        $client->merchant($merchantId)->tokens()->delete($token, $deleteParams);
    }
}
