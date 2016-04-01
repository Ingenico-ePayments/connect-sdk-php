<?php
/**
 * @group exceptions
 */
class GCS_Client_ExceptionTest extends GCS_ClientTestCase
{

    public function testExceptionErrors()
    {
        try {
            $emptyBody = new GCS_services_BINLookupRequest();
            $this->getClient()->merchant("9991")->services()->getIINdetails($emptyBody);
        } catch (GCS_ResponseException $e) {
            $this->assertNotEmpty($e->getErrorId());
            $errors = $e->getErrors();
            $this->assertCount(1, $errors);
            $this->assertContainsOnlyInstancesOf('GCS_errors_definitions_APIError', $errors);
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testExceptionWithoutErrors()
    {
        $responseException = new GCS_ResponseException(0, new GCS_errors_ErrorResponse());
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
            "httpStatusCode": 400,
            "message": "PARAMETER_NOT_FOUND_IN_REQUEST",
            "propertyName": "bin",
            "requestId": ""
        }
    ]
}
EOD;
        $errorResponse = new GCS_errors_ErrorResponse();
        $errorResponse->fromJson($errorResponseJsonString);
        $responseException = new GCS_ResponseException($httpStatusCode, $errorResponse);
        $expectedResponseExceptionString = sprintf(
            "exception '%s' with message '%s'. in %s:%d\nHTTP status code: %s\nResponse:\n%s\nStack trace:\n%s",
            'GCS_ResponseException',
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
            $emptyBody = new GCS_services_BINLookupRequest();
            $this->getClient()->merchant("9991")->services()->getIINdetails($emptyBody);
        } catch (GCS_ValidationException $e) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testAuthorizationException()
    {
        try {
            $invalidMerchantId = "123";
            $response = $this->getClient()->merchant($invalidMerchantId)->services()->testconnection();
        } catch (GCS_AuthorizationException $e) {
            return;
        }
        $this->fail('An expected exception has not been raised.');
    }

    public function testDeclinedPaymentExceptionForPaymentCreate()
    {
        $merchantId = "8609";

        $createPaymentRequest = new GCS_payment_CreatePaymentRequest();

        $order = new GCS_payment_definitions_Order();

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->currencyCode = "USD";
        $amountOfMoney->amount = 2997;
        $order->amountOfMoney = $amountOfMoney;

        $customer = new GCS_payment_definitions_Customer();
        $customer->locale = "nl";

        $personalInformation = new GCS_payment_definitions_PersonalInformation();
        $personalName = new GCS_payment_definitions_PersonalName();
        $personalName->firstName = "Johan";
        $personalName->surname = "Cruijff";
        $personalInformation->name = $personalName;

        $customer->personalInformation = $personalInformation;

        $billingAddress = new GCS_fei_definitions_Address();
        $billingAddress->street = "Nou Camp";
        $billingAddress->houseNumber = "14";
        $billingAddress->zip = "1000 AA";
        $billingAddress->city = "Barcelona";
        $billingAddress->state = "Catalunia";
        $billingAddress->countryCode = "US";
        $customer->billingAddress = $billingAddress;

        $order->customer = $customer;
        $createPaymentRequest->order = $order;

        $cardPaymentMethodSpecificInput = new GCS_payment_definitions_CardPaymentMethodSpecificInput();
        $cardPaymentMethodSpecificInput->paymentProductId = 3;

        $nonExistingCardNumber = "1234567890123452";
        $card = new GCS_fei_definitions_Card();
        $card->cvv = "123";
        $card->cardNumber = $nonExistingCardNumber;
        $card->expiryDate = "1220";
        $cardPaymentMethodSpecificInput->card = $card;

        $createPaymentRequest->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;

        try {
            $this->getClient()->merchant($merchantId)->payments()->create($createPaymentRequest);
        } catch (GCS_DeclinedPaymentException $e) {
            $paymentResult = $e->getPaymentResult();
            $this->assertInstanceOf('GCS_payment_definitions_CreatePaymentResult', $paymentResult);
            $payment = $paymentResult->payment;
            $this->assertInstanceOf('GCS_payment_definitions_Payment', $payment);
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

        $createPayoutRequest = new GCS_payout_CreatePayoutRequest();

        $createPayoutRequest->payoutText = "Payout Value Text";

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 2000;
        $createPayoutRequest->amountOfMoney = $amountOfMoney;

        $bankAccountIban = new GCS_fei_definitions_BankAccountIban();
        $bankAccountIban->iban = "NL91ABNA0417164300";
        $createPayoutRequest->bankAccountIban = $bankAccountIban;

        $payoutReferences = new GCS_payout_definitions_PayoutReferences();
        $payoutReferences->merchantReference = "2006101135";
        $createPayoutRequest->references = $payoutReferences;

        $payoutCustomer = new GCS_payout_definitions_PayoutCustomer();

        $address = new GCS_fei_definitions_Address();
        $address->countryCode = "FR";
        $address->street = "Camp Nou";
        $address->city = "Barcelona";
        $payoutCustomer->address = $address;

        $personalName = new GCS_payment_definitions_PersonalName();
        $personalName->surname = "Cruijf";
        $payoutCustomer->name = $personalName;

        $createPayoutRequest->customer = $payoutCustomer;

        try {
            $client->merchant($merchantId)->payouts()->create($createPayoutRequest);
        } catch (GCS_DeclinedPayoutException $e) {
            $payoutResult = $e->getPayoutResult();
            $this->assertInstanceOf('GCS_payout_definitions_PayoutResult', $payoutResult);
            $this->assertNotEmpty($payoutResult->id);
            $this->assertEquals('REJECTED', $payoutResult->status);
            return;
        }
        $this->fail('An expected exception has not been raised');
    }

    public function testGlobalCollectionExceptionForPayoutWithPayoutResult() {
        $client = $this->getClient();
        $merchantId = "8897";

        $createPayoutRequest = new GCS_payout_CreatePayoutRequest();

        $createPayoutRequest->payoutText = "Payout Value Text";

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 2000;
        $createPayoutRequest->amountOfMoney = $amountOfMoney;

        $bankAccountIban = new GCS_fei_definitions_BankAccountIban();
        $bankAccountIban->iban = "NL91ABNA0417164300";
        $bankAccountIban->accountHolderName = "J.Cruijff";
        $createPayoutRequest->bankAccountIban = $bankAccountIban;

        $payoutReferences = new GCS_payout_definitions_PayoutReferences();
        $payoutReferences->merchantReference = "2006101135";
        $createPayoutRequest->references = $payoutReferences;

        $payoutCustomer = new GCS_payout_definitions_PayoutCustomer();

        $address = new GCS_fei_definitions_Address();
        $address->countryCode = "FR";
        $address->street = "Camp Nou";
        $payoutCustomer->address = $address;

        $personalName = new GCS_payment_definitions_PersonalName();
        $personalName->surname = "Cruijf";
        $payoutCustomer->name = $personalName;

        $createPayoutRequest->customer = $payoutCustomer;

        try {
            $client->merchant($merchantId)->payouts()->create($createPayoutRequest);
        } catch (GCS_GlobalCollectException $e) {
            $this->assertInstanceOf('GCS_errors_ErrorResponse', $e->getResponse());
            return;
        }
        $this->fail('An expected exception has not been raised');
    }

    public function testDeclinedPaymentException()
    {
        $paymentErrorResponse = new GCS_payment_PaymentErrorResponse();
        $declinedPaymentException = new GCS_DeclinedPaymentException(0, $paymentErrorResponse);
        $this->assertInstanceOf('GCS_payment_definitions_CreatePaymentResult', $declinedPaymentException->getPaymentResult());
        $paymentErrorResponse->paymentResult = new GCS_payment_definitions_CreatePaymentResult();
        $this->assertInstanceOf('GCS_payment_definitions_CreatePaymentResult', $declinedPaymentException->getPaymentResult());
    }

    public function testDeclinedPayoutException()
    {
        $payoutErrorResponse = new GCS_payout_PayoutErrorResponse();
        $declinedPayoutException = new GCS_DeclinedPayoutException(0, $payoutErrorResponse);
        $this->assertInstanceOf('GCS_payout_definitions_PayoutResult', $declinedPayoutException->getPayoutResult());
        $payoutErrorResponse->payoutResult = new GCS_payout_definitions_PayoutResult();
        $this->assertInstanceOf('GCS_payout_definitions_PayoutResult', $declinedPayoutException->getPayoutResult());
    }

    public function testDeclinedRefundException()
    {
        $refundErrorResponse = new GCS_refund_RefundErrorResponse();
        $declinedRefundException = new GCS_DeclinedRefundException(0, $refundErrorResponse);
        $this->assertInstanceOf('GCS_refund_definitions_RefundResult', $declinedRefundException->getRefundResult());
        $refundErrorResponse->refundResult = new GCS_refund_definitions_RefundResult();
        $this->assertInstanceOf('GCS_refund_definitions_RefundResult', $declinedRefundException->getRefundResult());
    }
}
