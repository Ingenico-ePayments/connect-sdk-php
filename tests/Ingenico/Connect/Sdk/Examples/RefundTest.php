<?php
namespace Ingenico\Connect\Sdk\Examples;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\ClientTestCase;
use Ingenico\Connect\Sdk\Domain\Definitions\AmountOfMoney;
use Ingenico\Connect\Sdk\Domain\Definitions\BankAccountIban;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\AddressPersonal;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\PersonalName;
use Ingenico\Connect\Sdk\Domain\Refund\ApproveRefundRequest;
use Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse;
use Ingenico\Connect\Sdk\Domain\Refund\RefundRequest;
use Ingenico\Connect\Sdk\Domain\Refund\RefundResponse;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\BankRefundMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundCustomer;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundReferences;

/**
 * @group examples
 *
 */
class RefundTest extends ClientTestCase
{
    const MERCHANT_ID = "1701";

    /**
     * @throws ApiException
     * @return RefundErrorResponse
     * @return string
     */
    public function testCreateRefund()
    {
        $this->markTestSkipped('No refundable payment is available at this time');

        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $paymentId = "000000170110001962280000100001";

        $refundRequest = new RefundRequest();

        $customerName = new PersonalName();
        $customerName->surname = "X";
        $customerAddress = new AddressPersonal();
        $customerAddress->name = $customerName;
        $customer = new RefundCustomer();
        $customer->address = $customerAddress;
        $refundRequest->customer = $customer;

        $refundReferences = new RefundReferences();
        $refundReferences->merchantReference = "850000568099";
        $refundRequest->refundReferences = $refundReferences;

        $amountOfMoney = new AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 1;
        $refundRequest->amountOfMoney = $amountOfMoney;

        $bankRefundMethodSpecificInput = new BankRefundMethodSpecificInput();
        $bankAccountIban = new BankAccountIban();
        $bankAccountIban->iban = "NL53INGB0000000036";
        $bankRefundMethodSpecificInput->bankAccountIban = $bankAccountIban;
        $bankRefundMethodSpecificInput->countryCode = "DE";
        $refundRequest->bankRefundMethodSpecificInput = $bankRefundMethodSpecificInput;

        /** @var RefundResponse $refundResponse * */
        $refundResponse = $client->merchant($merchantId)->payments()->refund($paymentId, $refundRequest);
        return $refundResponse->id;
    }

    /**
     * @depends testCreateRefund
     * @param string $refundId
     * @return string
     * @throws ApiException
     */
    public function testRetrieveRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var RefundResponse $refundResponse */
        $refundResponse = $client->merchant($merchantId)->refunds()->get($refundId);
        return $refundResponse->id;
    }

    /**
     * @depends testRetrieveRefund
     * @param string $refundId
     * @throws ApiException
     * @return string
     */
    public function testApproveRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $approveRefundRequest = new ApproveRefundRequest();

        $approveRefundRequest->amount = 1;

        $client->merchant($merchantId)->refunds()->approve($refundId, $approveRefundRequest);
        return $refundId;
    }

    /**
     * @depends testApproveRefund
     * @param string $refundId
     * @throws ApiException
     * @return string
     */
    public function testUndoApproveRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $client->merchant($merchantId)->refunds()->cancelapproval($refundId);
        return $refundId;
    }

    /**
     * @depends testUndoApproveRefund
     * @param string $refundId
     * @return string
     * @throws ApiException
     */
    public function testCancelRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $client->merchant($merchantId)->refunds()->cancel($refundId);
        return $refundId;
    }
}
