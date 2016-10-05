<?php
namespace Ingenico\Connect\Sdk\Examples;

use DateTime;
use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\ValidationException;
use Ingenico\Connect\Sdk\Domain\Definitions\Address;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\Card;
use Ingenico\Connect\Sdk\Domain\Definitions\CompanyInformation;
use Ingenico\Connect\Sdk\Domain\Payment\ApprovePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Payment\CancelApprovalPaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\CancelPaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\CreatePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Payment\CreatePaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentApprovalResponse;
use Ingenico\Connect\Sdk\Domain\Payment\PaymentResponse;
use Ingenico\Connect\Sdk\Domain\Payment\TokenizePaymentRequest;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AddressPersonal;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CardPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ContactDetails;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Customer;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\LineItem;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\LineItemInvoiceData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderApprovePayment;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderInvoiceData;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderReferences;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderReferencesApprovePayment;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalInformation;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalName;
use Ingenico\Connect\Sdk\Domain\Token\CreateTokenResponse;

/**
 * @group examples
 *
 */
class PaymentTest extends ClientTestCase
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
        $createPaymentRequest = new CreatePaymentRequest();

        $order = new Order();

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->amount = 2980;
        $amountOfMoney->currencyCode = "EUR";
        $order->amountOfMoney = $amountOfMoney;

        $customer = new Customer();
        $customer->merchantCustomerId = "1234";
        $customer->locale = "en_GB";
        $customer->vatNumber = "1234AB5678CD";

        $personalInformation = new PersonalInformation();

        $personalName = new PersonalName();
        $personalName->title = "Mr.";
        $personalName->firstName = "Wile";
        $personalName->surnamePrefix = "E.";
        $personalName->surname = "Coyote";

        $personalInformation->name = $personalName;
        $personalInformation->gender = "male";
        $personalInformation->dateOfBirth = "19490917";
        $customer->personalInformation = $personalInformation;

        $companyInformation = new CompanyInformation();
        $companyInformation->name = "Acme Labs";
        $customer->companyInformation = $companyInformation;

        $billingAddress = new Address();
        $billingAddress->street = "Desertroad";
        $billingAddress->houseNumber = "13";
        $billingAddress->additionalInfo = "b";
        $billingAddress->zip = "84536";
        $billingAddress->city = "Monument Valley";
        $billingAddress->state = "Utah";
        $billingAddress->countryCode = "US";
        $customer->billingAddress = $billingAddress;

        $shippingAddress = new AddressPersonal();

        $shippingName = new PersonalName();
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


        $contactDetails = new ContactDetails();
        $contactDetails->emailAddress = "wile.e.coyote@acmelabs.com";
        $contactDetails->emailMessageType = "html";
        $contactDetails->phoneNumber = "+1234567890";
        $contactDetails->faxNumber = "+1234567891";
        $customer->contactDetails = $contactDetails;

        $order->customer = $customer;

        $references = new OrderReferences();
        $references->merchantOrderId = 123456;
        $references->merchantReference = "AcmeOrder0001";
        $references->descriptor = "Fast and Furry-ous";

        $invoiceData = new OrderInvoiceData();
        $invoiceData->invoiceNumber = "000000123";
        $invoiceData->invoiceDate = "20140306191500";
        $references->invoiceData = $invoiceData;

        $order->references = $references;

        $lineItem1 = new LineItem();

        $itemAmountOfMoney1 = new AmountOfMoney();
        $itemAmountOfMoney1->amount = 2500;
        $itemAmountOfMoney1->currencyCode = "EUR";
        $lineItem1->amountOfMoney = $itemAmountOfMoney1;

        $lineItemInvoiceData1 = new LineItemInvoiceData();
        $lineItemInvoiceData1->nrOfItems = "1";
        $lineItemInvoiceData1->description = "ACME Super Outfit";
        $lineItemInvoiceData1->pricePerItem = 2500;
        $lineItem1->invoiceData = $lineItemInvoiceData1;


        $lineItem2 = new LineItem();

        $itemAmountOfMoney2 = new AmountOfMoney();
        $itemAmountOfMoney2->currencyCode = "EUR";
        $itemAmountOfMoney2->amount = 480;
        $lineItem2->amountOfMoney = $itemAmountOfMoney2;

        $lineItemInvoiceData2 = new LineItemInvoiceData();
        $lineItemInvoiceData2->nrOfItems = "12";
        $lineItemInvoiceData2->description = "Aspirin";
        $lineItemInvoiceData2->pricePerItem = 40;
        $lineItem2->invoiceData = $lineItemInvoiceData2;

        $order->items = array($lineItem1, $lineItem2);

        $createPaymentRequest->order = $order;

        $cardPaymentMethodSpecificInput = new CardPaymentMethodSpecificInput();
        $cardPaymentMethodSpecificInput->paymentProductId = 1;
        $cardPaymentMethodSpecificInput->skipAuthentication = false;

        $card = new Card();
        $card->cvv = "123";
        $card->cardNumber = "4567350000427977";
        $card->expiryDate = "1220";
        $card->cardholderName = "Wile E. Coyote";
        $cardPaymentMethodSpecificInput->card = $card;

        $createPaymentRequest->cardPaymentMethodSpecificInput = $cardPaymentMethodSpecificInput;

        /** @var CreatePaymentResponse $createPaymentResponse */
        $createPaymentResponse = $client->merchant($merchantId)->payments()->create($createPaymentRequest);
        return $createPaymentResponse->payment->id;
    }

    /**
     * @depends testCreatePayment
     * @param string $paymentId
     * @throws ApiException
     * @return string
     */
    public function testRetrievePayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var PaymentResponse $paymentResponse */
        $paymentResponse = $client->merchant($merchantId)->payments()->get($paymentId);
        return $paymentResponse->id;
    }

    /**
     * @depends testRetrievePayment
     * @param string $paymentId
     * @throws ApiException
     * @return PaymentApprovalResponse
     */
    public function testApprovePayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $approvePaymentRequest = new ApprovePaymentRequest();

        $directDebitPaymentMethodSpecificInput = new ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput();
        $directDebitPaymentMethodSpecificInput->dateCollect = "20150201";
        $directDebitPaymentMethodSpecificInput->token = "bfa8a7e4-4530-455a-858d-204ba2afb77e";
        $approvePaymentRequest->directDebitPaymentMethodSpecificInput = $directDebitPaymentMethodSpecificInput;

        $orderApprovePayment = new OrderApprovePayment();
        $orderReferencesApprovePayment = new OrderReferencesApprovePayment();
        $orderReferencesApprovePayment->merchantReference = "AcmeOrder0001";
        $orderApprovePayment->references = $orderReferencesApprovePayment;
        $approvePaymentRequest->order = $orderApprovePayment;

        $approvePaymentRequest->amount = 2980;

        /** @var PaymentApprovalResponse $paymentApprovalResponse */
        $paymentApprovalResponse =
            $client->merchant($merchantId)->payments()->approve($paymentId, $approvePaymentRequest);
        return $paymentApprovalResponse->payment->id;
    }

    /**
     * @depends testApprovePayment
     * @param string $paymentId
     * @throws ApiException
     * @return CancelApprovalPaymentResponse
     */
    public function testCancelApprovePayment($paymentId)
    {
        $client = $this->GetClient();
        $merchantId = self::MERCHANT_ID;
        /** @var CancelApprovalPaymentResponse $cancelApprovalResponse */
        $cancelApprovalResponse = $client->merchant($merchantId)->payments()->cancelapproval($paymentId);
        return $cancelApprovalResponse->payment->id;
    }

    /**
     * @depends testApprovePayment
     * @param string $paymentId
     * @throws ApiException
     * @return string
     */
    public function testCreateTokenFromPayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $tokenizePaymentRequest = new TokenizePaymentRequest();

        $tokenizePaymentRequest->alias = "Some alias";

        /** @var CreateTokenResponse $createTokenResponse */
        $createTokenResponse = $client->merchant($merchantId)->payments()->tokenize($paymentId, $tokenizePaymentRequest);
        return $createTokenResponse->token;
    }

    /**
     * @depends testCancelApprovePayment
     * @param string $paymentId
     * @throws ApiException
     * @return string
     */
    public function testCancelPayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var CancelPaymentResponse $cancelPaymentResponse */
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
        /** @var CreatePaymentResponse $createPaymentResponse */
        $createPaymentResponse = $client->merchant($merchantId)->payments()->create(
            $this->getMinimalCreatePaymentRequest()
        );
        return $createPaymentResponse->payment->id;
    }

    /**
     * @return CreatePaymentRequest
     */
    protected function getMinimalCreatePaymentRequest($correctCreditCardNumber = true)
    {
        $createPaymentRequest = new CreatePaymentRequest();

        $order = new Order();

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 16523;
        $order->amountOfMoney = $amountOfMoney;

        $customer = new Customer();
        $customer->locale = "en";

        $billingAddress = new Address();
        $billingAddress->countryCode = "NL";
        $customer->billingAddress = $billingAddress;

        $order->customer = $customer;

        $createPaymentRequest->order = $order;

        $cardPaymentMethodSpecificInput = new CardPaymentMethodSpecificInput();
        $cardPaymentMethodSpecificInput->paymentProductId = 1;

        $card = new Card();
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
     * @throws ApiException
     * @return string
     */
    public function testApproveChallengedPayment($paymentId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID_FOR_CHALLENGED_PAYMENT_TEST;

        /** @var PaymentResponse $paymentApprovalResponse */
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
        $callContext = new CallContext();
        $dateTimeWitMicroseconds = DateTime::createFromFormat('U.u', microtime(true));
        $callContext->setIdempotenceKey(__FUNCTION__ . '::' . $dateTimeWitMicroseconds->format('Ymd-His-u'));
        $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());

        /** @var CreatePaymentResponse $createPaymentResponse1 */
        $createPaymentResponse1 = $client->merchant($merchantId)->payments()->create(
            $this->getMinimalCreatePaymentRequest(),
            $callContext
        );
        $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());
        /** @var CreatePaymentResponse $createPaymentResponse2 */
        $createPaymentResponse2 = $client->merchant($merchantId)->payments()->create(
            $this->getMinimalCreatePaymentRequest(),
            $callContext
        );
        $idempotenceRequestTimestamp = $callContext->getIdempotenceRequestTimestamp();
        $this->assertNotEmpty($idempotenceRequestTimestamp);
        $this->assertEquals($createPaymentResponse1->payment->id, $createPaymentResponse2->payment->id);
        /** @var CreatePaymentResponse $createPaymentResponse3 */
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
        $callContext = new CallContext();
        $dateTimeWitMicroseconds = DateTime::createFromFormat('U.u', microtime(true));
        $callContext->setIdempotenceKey(__FUNCTION__ . '::' . $dateTimeWitMicroseconds->format('Ymd-His-u'));
        $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());

        try {
            $client->merchant($merchantId)->payments()->create(
                $this->getMinimalCreatePaymentRequest(false),
                $callContext
            );
            $this->fail('excepted exception');
        } catch (ValidationException $e) {
            $this->assertEmpty($callContext->getIdempotenceRequestTimestamp());
        }
        try {
            $client->merchant($merchantId)->payments()->create(
                $this->getMinimalCreatePaymentRequest(false),
                $callContext
            );
            $this->fail('excepted exception');
        } catch (ValidationException $e) {
            $idempotenceRequestTimestamp = $callContext->getIdempotenceRequestTimestamp();
            $this->assertNotEmpty($idempotenceRequestTimestamp);
        }
        try {
            $client->merchant($merchantId)->payments()->create(
                $this->getMinimalCreatePaymentRequest(false),
                $callContext
            );
            $this->fail('excepted exception');
        } catch (ValidationException $e) {
            $this->assertEquals($idempotenceRequestTimestamp, $callContext->getIdempotenceRequestTimestamp());
        }
    }
}
