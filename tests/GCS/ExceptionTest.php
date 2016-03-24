<?php
namespace GCS\Client;

use GCS\AuthorizationException;
use GCS\ClientTestCase;
use GCS\DeclinedPaymentException;
use GCS\DeclinedPayoutException;
use GCS\DeclinedRefundException;
use GCS\errors\ErrorResponse;
use GCS\fei\definitions\Address;
use GCS\fei\definitions\AmountOfMoney;
use GCS\fei\definitions\BankAccountIban;
use GCS\fei\definitions\Card;
use GCS\GlobalCollectException;
use GCS\payment\CreatePaymentRequest;
use GCS\payment\definitions\CardPaymentMethodSpecificInput;
use GCS\payment\definitions\CreatePaymentResult;
use GCS\payment\definitions\Customer;
use GCS\payment\definitions\Order;
use GCS\payment\definitions\PersonalInformation;
use GCS\payment\definitions\PersonalName;
use GCS\payment\PaymentErrorResponse;
use GCS\payout\CreatePayoutRequest;
use GCS\payout\definitions\PayoutCustomer;
use GCS\payout\definitions\PayoutReferences;
use GCS\payout\definitions\PayoutResult;
use GCS\payout\PayoutErrorResponse;
use GCS\refund\definitions\RefundResult;
use GCS\refund\RefundErrorResponse;
use GCS\ResponseException;
use GCS\services\BINLookupRequest;
use GCS\ValidationException;

/**
 * Class ExceptionTest
 *
 * @package GCS\Client
 * @group   exceptions
 */
class ExceptionTest extends ClientTestCase
{

    public function testExceptionErrors()
    {
        try {
            $emptyBody = new BINLookupRequest();
            $this->getClient()->merchant("9991")->services()->getIINdetails($emptyBody);
        } catch (ResponseException $e) {
            $this->assertNotEmpty($e->getErrorId());
            $errors = $e->getErrors();
            $this->assertCount(1, $errors);
            $this->assertContainsOnlyInstancesOf('\GCS\errors\definitions\APIError', $errors);
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
            "code": "20000000",
            "message": "PARAMETER_NOT_FOUND_IN_REQUEST",
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
            '\GCS\ResponseException',
            $responseException->getMessage(),
            $responseException->getFile(),
            $responseException->getLine(),
            $httpStatusCode,
            $errorResponseJsonString,
            $responseException->getTraceAsString()
        );
        $this->assertEquals($expectedResponseExceptionString, (string) $responseException);
    }


    public function testValidationException()
    {
        try {
            $emptyBody = new BINLookupRequest();
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

        $card = new Card();
        $card->cvv = "123";
        $card->cardNumber = "542418027979173";
        $card->expiryDate = "1220";
        $cardPaymentMethodSpecificInput->card = $card;

        $createPaymentRequest->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;

        try {
            $this->getClient()->merchant($merchantId)->payments()->create($createPaymentRequest);
        } catch (DeclinedPaymentException $e) {
            $paymentResult = $e->getPaymentResult();
            $this->assertInstanceOf('\GCS\payment\definitions\CreatePaymentResult', $paymentResult);
            $payment = $paymentResult->payment;
            $this->assertInstanceOf('\GCS\payment\definitions\Payment', $payment);
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
            $this->assertInstanceOf('\GCS\payout\definitions\PayoutResult', $payoutResult);
            $this->assertNotEmpty($payoutResult->id);
            $this->assertEquals('REJECTED', $payoutResult->status);
            return;
        }
        $this->fail('An expected exception has not been raised');
    }

    public function testGlobalCollectionExceptionForPayoutWithPayoutResult()
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
            $this->assertInstanceOf('\GCS\errors\ErrorResponse', $e->getResponse());
            return;
        }
        $this->fail('An expected exception has not been raised');
    }

    public function testDeclinedPaymentException()
    {
        $paymentErrorResponse = new PaymentErrorResponse();
        $declinedPaymentException = new DeclinedPaymentException(0, $paymentErrorResponse);
        $this->assertInstanceOf(
            '\GCS\payment\definitions\CreatePaymentResult', $declinedPaymentException->getPaymentResult()
        );
        $paymentErrorResponse->paymentResult = new CreatePaymentResult();
        $this->assertInstanceOf(
            '\GCS\payment\definitions\CreatePaymentResult', $declinedPaymentException->getPaymentResult()
        );
    }

    public function testDeclinedPayoutException()
    {
        $payoutErrorResponse = new PayoutErrorResponse();
        $declinedPayoutException = new DeclinedPayoutException(0, $payoutErrorResponse);
        $this->assertInstanceOf('\GCS\payout\definitions\PayoutResult', $declinedPayoutException->getPayoutResult());
        $payoutErrorResponse->payoutResult = new PayoutResult();
        $this->assertInstanceOf('\GCS\payout\definitions\PayoutResult', $declinedPayoutException->getPayoutResult());
    }

    public function testDeclinedRefundException()
    {
        $refundErrorResponse = new RefundErrorResponse();
        $declinedRefundException = new DeclinedRefundException(0, $refundErrorResponse);
        $this->assertInstanceOf('\GCS\refund\definitions\RefundResult', $declinedRefundException->getRefundResult());
        $refundErrorResponse->refundResult = new RefundResult();
        $this->assertInstanceOf('\GCS\refund\definitions\RefundResult', $declinedRefundException->getRefundResult());
    }
}
