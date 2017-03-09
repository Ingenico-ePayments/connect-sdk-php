<?php
namespace Ingenico\Connect\Sdk;

use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Definitions\Card;
use Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payment\CreatePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CardPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Customer;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalInformation;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalName;
use Ingenico\Connect\Sdk\Domain\Payout\CreatePayoutRequest;
use Ingenico\Connect\Sdk\Domain\Payout\PayoutErrorResponse;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutCustomer;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutReferences;
use Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult;
use Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult;
use Ingenico\Connect\Sdk\Domain\Services\GetIINDetailsRequest;

/**
 * @group exceptions
 */
class Client_ExceptionTest extends ClientTestCase
{

    public function testExceptionErrors()
    {
        try {
            $emptyBody = new GetIINDetailsRequest();
            $this->getClient()->merchant("9991")->services()->getIINdetails($emptyBody);
        } catch (ResponseException $e) {
            $this->assertNotEmpty($e->getErrorId());
            $errors = $e->getErrors();
            $this->assertCount(1, $errors);
            $this->assertContainsOnlyInstancesOf('\Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError', $errors);
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testExceptionWithoutErrors()
    {
        $responseException = new ResponseException(0, new ErrorResponse());
        $this->assertEmpty($responseException->getErrorId());
        $this->assertCount(0, $responseException->getErrors());
    }

    public function testExceptionStringRepresentation()
    {
        $httpStatusCode = 400;
        $errorResponseJsonString = <<<'EOD'
{
    "errorId": "8a41a5dd-7366-4026-a41b-e98c56808edd",
    "errors": [
        {
            "category": "CONNECT_PLATFORM_ERROR",
            "code": "20000000",
            "httpStatusCode": 400,
            "id": "PARAMETER_NOT_FOUND_IN_REQUEST",
            "message": "The parameter shown above was not found in the request received by connect.",
            "propertyName": "bin",
            "requestId": ""
        }
    ]
}
EOD;
        $errorResponse = new ErrorResponse();
        $errorResponse->fromJson($errorResponseJsonString);
        $responseException = new ResponseException($httpStatusCode, $errorResponse);
        $expectedResponseExceptionString = sprintf(
            "exception '%s' with message '%s'. in %s:%d\nHTTP status code: %s\nResponse:\n%s\nStack trace:\n%s",
            'Ingenico\Connect\Sdk\ResponseException',
            $responseException->getMessage(),
            $responseException->getFile(),
            $responseException->getLine(),
            $httpStatusCode,
            $errorResponseJsonString,
            $responseException->getTraceAsString()
        );
        // replace Windows \r\n with Unix \n before comparing
        $this->assertEquals(str_replace("\r\n", "\n", $expectedResponseExceptionString), str_replace("\r\n", "\n", (string) $responseException));
    }


    public function testValidationException()
    {
        try {
            $emptyBody = new GetIINDetailsRequest();
            $this->getClient()->merchant("9991")->services()->getIINdetails($emptyBody);
        } catch (ValidationException $e) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testAuthorizationException()
    {
        try {
            $invalidMerchantId = "123";
            $response = $this->getClient()->merchant($invalidMerchantId)->services()->testconnection();
        } catch (AuthorizationException $e) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testDeclinedPaymentExceptionForPaymentCreate()
    {
        $merchantId = "8609";

        $createPaymentRequest = new CreatePaymentRequest();

        $order = new Order();

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->currencyCode = "USD";
        $amountOfMoney->amount = 2997;
        $order->amountOfMoney = $amountOfMoney;

        $customer = new Customer();
        $customer->locale = "nl";

        $personalInformation = new PersonalInformation();
        $personalName = new PersonalName();
        $personalName->firstName = "Johan";
        $personalName->surname = "Cruijff";
        $personalInformation->name = $personalName;

        $customer->personalInformation = $personalInformation;

        $billingAddress = new Address();
        $billingAddress->street = "Nou Camp";
        $billingAddress->houseNumber = "14";
        $billingAddress->zip = "1000 AA";
        $billingAddress->city = "Barcelona";
        $billingAddress->state = "Catalunia";
        $billingAddress->countryCode = "US";
        $customer->billingAddress = $billingAddress;

        $order->customer = $customer;
        $createPaymentRequest->order = $order;

        $cardPaymentMethodSpecificInput = new CardPaymentMethodSpecificInput();
        $cardPaymentMethodSpecificInput->paymentProductId = 3;

        $nonExistingCardNumber = "1234567890123452";
        $card = new Card();
        $card->cvv = "123";
        $card->cardNumber = $nonExistingCardNumber;
        $card->expiryDate = "1220";
        $cardPaymentMethodSpecificInput->card = $card;

        $createPaymentRequest->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;

        try {
            $this->getClient()->merchant($merchantId)->payments()->create($createPaymentRequest);
        } catch (DeclinedPaymentException $e) {
            $paymentResult = $e->getPaymentResult();
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult', $paymentResult);
            $payment = $paymentResult->payment;
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment', $payment);
            $this->assertNotEmpty($payment->id);
            $this->assertEquals('REJECTED', $payment->status);
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testDeclinedPayoutExceptionForPayout()
    {
        $client = $this->getClient();
        $merchantId = "8897";

        $createPayoutRequest = new CreatePayoutRequest();

        $createPayoutRequest->payoutText = "Payout Value Text";

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 2000;
        $createPayoutRequest->amountOfMoney = $amountOfMoney;

        $bankAccountIban = new BankAccountIban();
        $bankAccountIban->iban = "NL91ABNA0417164300";
        $createPayoutRequest->bankAccountIban = $bankAccountIban;

        $payoutReferences = new PayoutReferences();
        $payoutReferences->merchantReference = "2006101135";
        $createPayoutRequest->references = $payoutReferences;

        $payoutCustomer = new PayoutCustomer();

        $address = new Address();
        $address->countryCode = "FR";
        $address->street = "Camp Nou";
        $address->city = "Barcelona";
        $payoutCustomer->address = $address;

        $personalName = new PersonalName();
        $personalName->surname = "Cruijf";
        $payoutCustomer->name = $personalName;

        $createPayoutRequest->customer = $payoutCustomer;

        try {
            $client->merchant($merchantId)->payouts()->create($createPayoutRequest);
        } catch (DeclinedPayoutException $e) {
            $payoutResult = $e->getPayoutResult();
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult', $payoutResult);
            $this->assertNotEmpty($payoutResult->id);
            $this->assertEquals('REJECTED', $payoutResult->status);
            return;
        }
        $this->fail('An expected exception has not been raised');
    }

    public function testGlobalCollectExceptionForPayoutWithPayoutResult() {
        $client = $this->getClient();
        $merchantId = "8897";

        $createPayoutRequest = new CreatePayoutRequest();

        $createPayoutRequest->payoutText = "Payout Value Text";

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 2000;
        $createPayoutRequest->amountOfMoney = $amountOfMoney;

        $bankAccountIban = new BankAccountIban();
        $bankAccountIban->iban = "NL91ABNA0417164300";
        $bankAccountIban->accountHolderName = "J.Cruijff";
        $createPayoutRequest->bankAccountIban = $bankAccountIban;

        $payoutReferences = new PayoutReferences();
        $payoutReferences->merchantReference = "2006101135";
        $createPayoutRequest->references = $payoutReferences;

        $payoutCustomer = new PayoutCustomer();

        $address = new Address();
        $address->countryCode = "FR";
        $address->street = "Camp Nou";
        $payoutCustomer->address = $address;

        $personalName = new PersonalName();
        $personalName->surname = "Cruijf";
        $payoutCustomer->name = $personalName;

        $createPayoutRequest->customer = $payoutCustomer;

        try {
            $client->merchant($merchantId)->payouts()->create($createPayoutRequest);
        } catch (GlobalCollectException $e) {
            $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Errors\ErrorResponse', $e->getResponse());
            return;
        }
        $this->fail('An expected exception has not been raised');
    }

    public function testDeclinedPaymentException()
    {
        $paymentErrorResponse = new PaymentErrorResponse();
        $declinedPaymentException = new DeclinedPaymentException(0, $paymentErrorResponse);
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult', $declinedPaymentException->getPaymentResult());
        $paymentErrorResponse->paymentResult = new CreatePaymentResult();
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult', $declinedPaymentException->getPaymentResult());
    }

    public function testDeclinedPayoutException()
    {
        $payoutErrorResponse = new PayoutErrorResponse();
        $declinedPayoutException = new DeclinedPayoutException(0, $payoutErrorResponse);
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult', $declinedPayoutException->getPayoutResult());
        $payoutErrorResponse->payoutResult = new PayoutResult();
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Payout\Definitions\PayoutResult', $declinedPayoutException->getPayoutResult());
    }

    public function testDeclinedRefundException()
    {
        $refundErrorResponse = new RefundErrorResponse();
        $declinedRefundException = new DeclinedRefundException(0, $refundErrorResponse);
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult', $declinedRefundException->getRefundResult());
        $refundErrorResponse->refundResult = new RefundResult();
        $this->assertInstanceOf('\Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult', $declinedRefundException->getRefundResult());
    }
}
