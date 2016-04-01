<?php
/**
 * @group examples
 *
 */
class GCS_Client_PaymentTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "20000";

    const MERCHANT_ID_FOR_CHALLENGED_PAYMENT_TEST = "8731";

    /**
     * @return string
     */
    public function testCreatePayment()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $createPaymentRequest = new GCS_payment_CreatePaymentRequest();

        $order = new GCS_payment_definitions_Order();

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->amount = 2980;
        $amountOfMoney->currencyCode = "EUR";
        $order->amountOfMoney = $amountOfMoney;

        $customer = new GCS_payment_definitions_Customer();
        $customer->merchantCustomerId = "1234";
        $customer->locale = "en_GB";
        $customer->vatNumber = "1234AB5678CD";

        $personalInformation = new GCS_payment_definitions_PersonalInformation();

        $personalName = new GCS_payment_definitions_PersonalName();
        $personalName->title = "Mr.";
        $personalName->firstName = "Wile";
        $personalName->surnamePrefix = "E.";
        $personalName->surname = "Coyote";

        $personalInformation->name = $personalName;
        $personalInformation->gender = "male";
        $personalInformation->dateOfBirth = "19490917";
        $customer->personalInformation = $personalInformation;

        $companyInformation = new GCS_fei_definitions_CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $customer->companyInformation = $companyInformation;

        $billingAddress = new GCS_fei_definitions_Address();
        $billingAddress->street = "Desertroad";
        $billingAddress->houseNumber = "13";
        $billingAddress->additionalInfo = "b";
        $billingAddress->zip = "84536";
        $billingAddress->city = "Monument Valley";
        $billingAddress->state = "Utah";
        $billingAddress->countryCode = "US";
        $customer->billingAddress = $billingAddress;

        $shippingAddress = new GCS_payment_definitions_AddressPersonal();

        $shippingName = new GCS_payment_definitions_PersonalName();
        $shippingName->title = "Miss";
        $shippingName->firstName = "Road";
        $shippingName->surname = "Runner";
        $shippingAddress->name = $shippingName;

        $shippingAddress->street = "Desertroad";
        $shippingAddress->houseNumber = "1";
        $shippingAddress->additionalInfo = "Suite II";
        $shippingAddress->zip = "84536";
        $shippingAddress->city = "Monument Valley";
        $shippingAddress->state = "Utah";
        $shippingAddress->countryCode = "US";
        $customer->shippingAddress = $shippingAddress;


        $contactDetails = new GCS_payment_definitions_ContactDetails();
        $contactDetails->emailAddress = "wile.e.coyote@acmelabs.com";
        $contactDetails->emailMessageType = "html";
        $contactDetails->phoneNumber = "+1234567890";
        $contactDetails->faxNumber = "+1234567891";
        $customer->contactDetails = $contactDetails;

        $order->customer = $customer;

        $references = new GCS_payment_definitions_OrderReferences();
        $references->merchantOrderId = 123456;
        $references->merchantReference = "AcmeOrder0001";
        $references->descriptor = "Fast and Furry-ous";

        $invoiceData = new GCS_payment_definitions_OrderInvoiceData();
        $invoiceData->invoiceNumber = "000000123";
        $invoiceData->invoiceDate = "20140306191500";
        $references->invoiceData = $invoiceData;

        $order->references = $references;

        $lineItem1 = new GCS_payment_definitions_LineItem();

        $itemAmountOfMoney1 = new GCS_fei_definitions_AmountOfMoney();
        $itemAmountOfMoney1->amount = 2500;
        $itemAmountOfMoney1->currencyCode = "EUR";
        $lineItem1->amountOfMoney = $itemAmountOfMoney1;

        $lineItemInvoiceData1 = new GCS_payment_definitions_LineItemInvoiceData();
        $lineItemInvoiceData1->nrOfItems = "1";
        $lineItemInvoiceData1->description = "ACME Super Outfit";
        $lineItemInvoiceData1->pricePerItem = 2500;
        $lineItem1->invoiceData = $lineItemInvoiceData1;


        $lineItem2 = new GCS_payment_definitions_LineItem();

        $itemAmountOfMoney2 = new GCS_fei_definitions_AmountOfMoney();
        $itemAmountOfMoney2->currencyCode = "EUR";
        $itemAmountOfMoney2->amount = 480;
        $lineItem2->amountOfMoney = $itemAmountOfMoney2;

        $lineItemInvoiceData2 = new GCS_payment_definitions_LineItemInvoiceData();
        $lineItemInvoiceData2->nrOfItems = "12";
        $lineItemInvoiceData2->description = "Aspirin";
        $lineItemInvoiceData2->pricePerItem = 40;
        $lineItem2->invoiceData = $lineItemInvoiceData2;

        $order->items = array($lineItem1, $lineItem2);

        $createPaymentRequest->order = $order;

        $cardPaymentMethodSpecificInput = new GCS_payment_definitions_CardPaymentMethodSpecificInput();
        $cardPaymentMethodSpecificInput->paymentProductId = 1;
        $cardPaymentMethodSpecificInput->skipAuthentication = false;

        $card = new GCS_fei_definitions_Card();
        $card->cvv = "123";
        $card->cardNumber = "4567350000427977";
        $card->expiryDate = "1220";
        $card->cardholderName = "Wile E. Coyote";
        $cardPaymentMethodSpecificInput->card = $card;

        $createPaymentRequest->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;

        /** @var GCS_payment_CreatePaymentResponse $createPaymentResponse */
        $createPaymentResponse = $client->merchant($merchantId)->payments()->create($createPaymentRequest);
        return $createPaymentResponse->payment->id;
    }

    /**
     * @depends testCreatePayment
     * @param string $paymentId
     * @throws GCS_ApiException
     * @return string
     */
    public function testRetrievePayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var GCS_payment_PaymentResponse $paymentResponse */
        $paymentResponse = $client->merchant($merchantId)->payments()->get($paymentId);
        return $paymentResponse->id;
    }

    /**
     * @depends testRetrievePayment
     * @param string $paymentId
     * @throws GCS_ApiException
     * @return GCS_payment_PaymentApprovalResponse
     */
    public function testApprovePayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $approvePaymentRequest = new GCS_payment_ApprovePaymentRequest();

        $directDebitPaymentMethodSpecificInput =
            new GCS_payment_definitions_ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput();
        $directDebitPaymentMethodSpecificInput->dateCollect = "20150201";
        $directDebitPaymentMethodSpecificInput->token = "bfa8a7e4-4530-455a-858d-204ba2afb77e";
        $approvePaymentRequest->directDebitPaymentMethodSpecificInput = $directDebitPaymentMethodSpecificInput;

        $orderApprovePayment = new GCS_payment_definitions_OrderApprovePayment();
        $orderReferencesApprovePayment = new GCS_payment_definitions_OrderReferencesApprovePayment();
        $orderReferencesApprovePayment->merchantReference = "AcmeOrder0001";
        $orderApprovePayment->references = $orderReferencesApprovePayment;
        $approvePaymentRequest->order = $orderApprovePayment;

        $approvePaymentRequest->amount = 2980;

        /** @var GCS_payment_PaymentApprovalResponse $paymentApprovalResponse */
        $paymentApprovalResponse =
            $client->merchant($merchantId)->payments()->approve($paymentId, $approvePaymentRequest);
        return $paymentApprovalResponse->payment->id;
    }

    /**
     * @depends testApprovePayment
     * @param string $paymentId
     * @throws GCS_ApiException
     * @return GCS_payment_CancelApprovalPaymentResponse
     */
    public function testCancelApprovePayment($paymentId)
    {
        $client = $this->GetClient();
        $merchantId = self::MERCHANT_ID;
        /** @var GCS_payment_CancelApprovalPaymentResponse $cancelApprovalResponse */
        $cancelApprovalResponse = $client->merchant($merchantId)->payments()->cancelapproval($paymentId);
        return $cancelApprovalResponse->payment->id;
    }

    /**
     * @depends testApprovePayment
     * @param string $paymentId
     * @throws GCS_ApiException
     * @return string
     */
    public function testCreateTokenFromPayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $tokenizePaymentRequest = new GCS_payment_TokenizePaymentRequest();

        $tokenizePaymentRequest->alias = "Some alias";

        /** @var GCS_token_CreateTokenResponse $createTokenResponse */
        $createTokenResponse = $client->merchant($merchantId)->payments()->tokenize($paymentId, $tokenizePaymentRequest);
        return $createTokenResponse->token;
    }

    /**
     * @depends testCancelApprovePayment
     * @param string $paymentId
     * @throws GCS_ApiException
     * @return string
     */
    public function testCancelPayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var GCS_payment_CancelPaymentResponse $cancelPaymentResponse */
        $cancelPaymentResponse = $client->merchant($merchantId)->payments()->cancel($paymentId);
        return $cancelPaymentResponse->payment->id;
    }

    /**
     * @return string
     */
    public function testCreateMinimalPayment()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_CHALLENGED_PAYMENT_TEST;
        /** @var GCS_payment_CreatePaymentResponse $createPaymentResponse */
        $createPaymentResponse = $client->merchant($merchantId)->payments()->create(
            $this->getMinimalCreatePaymentRequest()
        );
        return $createPaymentResponse->payment->id;
    }

    /**
     * @return GCS_payment_CreatePaymentRequest
     */
    protected function getMinimalCreatePaymentRequest($correctCreditCardNumber = true)
    {
        $createPaymentRequest = new GCS_payment_CreatePaymentRequest();

        $order = new GCS_payment_definitions_Order();

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 16523;
        $order->amountOfMoney = $amountOfMoney;

        $customer = new GCS_payment_definitions_Customer();
        $customer->locale = "en";

        $billingAddress = new GCS_fei_definitions_Address();
        $billingAddress->countryCode = "NL";
        $customer->billingAddress = $billingAddress;

        $order->customer = $customer;

        $createPaymentRequest->order = $order;

        $cardPaymentMethodSpecificInput = new GCS_payment_definitions_CardPaymentMethodSpecificInput();
        $cardPaymentMethodSpecificInput->paymentProductId = 1;

        $card = new GCS_fei_definitions_Card();
        $card->cvv = "123";
        $card->cardNumber = $correctCreditCardNumber ? "4444333322211211" : "4444333322211212";
        $card->expiryDate = "1220";
        $cardPaymentMethodSpecificInput->card = $card;

        $createPaymentRequest->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;

        return $createPaymentRequest;
    }

    /**
     * @depends testCreateMinimalPayment
     * @param string $paymentId
     * @throws GCS_ApiException
     * @return string
     */
    public function testApproveChallengedPayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_CHALLENGED_PAYMENT_TEST;

        /** @var GCS_payment_PaymentResponse $paymentApprovalResponse */
        $paymentApprovalResponse = $client->merchant($merchantId)->payments()->processchallenged($paymentId);
        return $paymentApprovalResponse->id;
    }

    /**
     * @return string
     */
    public function testCreatePaymentWithIdempotenceKeySuccess()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_CHALLENGED_PAYMENT_TEST;
        $callContext = new GCS_CallContext();
        $dateTimeWitMicroseconds = DateTime::createFromFormat('U.u', microtime(true));
        $callContext->setIdempotenceKey(__FUNCTION__ . '::' . $dateTimeWitMicroseconds->format('Ymd-His-u'));
        $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());

        /** @var GCS_payment_CreatePaymentResponse $createPaymentResponse1 */
        $createPaymentResponse1 = $client->merchant($merchantId)->payments()->create(
            $this->getMinimalCreatePaymentRequest(),
            $callContext
        );
        $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());
        /** @var GCS_payment_CreatePaymentResponse $createPaymentResponse2 */
        $createPaymentResponse2 = $client->merchant($merchantId)->payments()->create(
            $this->getMinimalCreatePaymentRequest(),
            $callContext
        );
        $idempotenceRequestTimestamp = $callContext->getIdempotenceRequestTimestamp();
        $this->assertNotEmpty($idempotenceRequestTimestamp);
        $this->assertEquals($createPaymentResponse1->payment->id, $createPaymentResponse2->payment->id);
        /** @var GCS_payment_CreatePaymentResponse $createPaymentResponse3 */
        $createPaymentResponse3 = $client->merchant($merchantId)->payments()->create(
            $this->getMinimalCreatePaymentRequest(),
            $callContext
        );
        $this->assertEquals($createPaymentResponse1->payment->id, $createPaymentResponse3->payment->id);
        $this->assertEquals($idempotenceRequestTimestamp, $callContext->getIdempotenceRequestTimestamp());
        return $createPaymentResponse1->payment->id;
    }

    public function testCreatePaymentWithIdempotenceKeyFailure()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_CHALLENGED_PAYMENT_TEST;
        $callContext = new GCS_CallContext();
        $dateTimeWitMicroseconds = DateTime::createFromFormat('U.u', microtime(true));
        $callContext->setIdempotenceKey(__FUNCTION__ . '::' . $dateTimeWitMicroseconds->format('Ymd-His-u'));
        $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());

        try {
            $client->merchant($merchantId)->payments()->create(
                $this->getMinimalCreatePaymentRequest(false),
                $callContext
            );
            $this->fail('excepted exception');
        } catch (GCS_ValidationException $e) {
            $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());
        }
        try {
            $client->merchant($merchantId)->payments()->create(
                $this->getMinimalCreatePaymentRequest(false),
                $callContext
            );
            $this->fail('excepted exception');
        } catch (GCS_ValidationException $e) {
            $idempotenceRequestTimestamp = $callContext->getIdempotenceRequestTimestamp();
            $this->assertNotEmpty($idempotenceRequestTimestamp);
        }
        try {
            $client->merchant($merchantId)->payments()->create(
                $this->getMinimalCreatePaymentRequest(false),
                $callContext
            );
            $this->fail('excepted exception');
        } catch (GCS_ValidationException $e) {
            $this->assertEquals($idempotenceRequestTimestamp, $callContext->getIdempotenceRequestTimestamp());
        }
    }

}
