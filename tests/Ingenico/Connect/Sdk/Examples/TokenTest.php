<?php
namespace Ingenico\Connect\Sdk\Examples;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountBban;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Definitions\CompanyInformation;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalInformation;
use Ingenico\Connect\Sdk\Domain\Token\ApproveTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse;
use Ingenico\Connect\Sdk\Domain\Token\UpdateTokenRequest;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\ContactDetailsToken;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\CustomerToken;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\CustomerTokenWithContactDetails;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\Debtor;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\MandateNonSepaDirectDebit;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\MandateSepaDirectDebit;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\PersonalInformationToken;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\PersonalNameToken;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenNonSepaDirectDebit;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenNonSepaDirectDebitPaymentProduct705SpecificData;
use Ingenico\Connect\Sdk\Domain\Token\Definitions\TokenSepaDirectDebitWithoutCreditor;
use Ingenico\Connect\Sdk\Merchant\Tokens\DeleteTokenParams;

/**
 * @group examples
 *
 */
class TokenTest extends ClientTestCase
{
    const MERCHANT_ID = "20000";

    const MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST = "9991";

    /**
     * @return string
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
     * @return string
     * @throws ApiException
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
     * @throws ApiException
     * @depends testRetrieveToken
     */
    public function testUpdateToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $updateTokenRequest = new UpdateTokenRequest();

        $updateTokenRequest->paymentProductId = 705;

        $nonSepaDirectDebit = new TokenNonSepaDirectDebit();

        $mandateNonSepaDirectDebit = new MandateNonSepaDirectDebit();

        $paymentProduct705SpecificData = new TokenNonSepaDirectDebitPaymentProduct705SpecificData();
        $paymentProduct705SpecificData->authorisationId = "123456";

        $bankAccountBban = new BankAccountBban();
        $bankAccountBban->accountNumber = "000000654321";
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
     * @depends testUpdateToken
     * @param string $token
     * @throws ApiException
     */
    public function testDeleteToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $deleteParams = new DeleteTokenParams();
        $deleteParams->mandateCancelDate = "20150102";
        $client->merchant($merchantId)->tokens()->delete($token, $deleteParams);
    }

    /**
     * @return string
     * @throws ApiException
     * @return CreateTokenResponse
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
     * @depends testCreateSepaDirectDebitToken
     * @param CreateTokenResponse $createTokenResponse
     * @throws ApiException
     * @return string
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
     * @depends testApproveSepaDirectDebitToken
     * @param string $token
     * @throws ApiException
     */
    public function testDeleteSepaDirectDebitToken($token)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_SEPA_DIRECT_DEBIT_TOKEN_TEST;

        $deleteParams = new DeleteTokenParams();
        $deleteParams->mandateCancelDate = "20150102";

        $client->merchant($merchantId)->tokens()->delete($token, $deleteParams);
    }
}
