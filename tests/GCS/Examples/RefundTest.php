<?php

/**
 * @group examples
 *
 */
class GCS_Client_RefundTest extends GCS_ClientTestCase
{
    const MERCHANT_ID = "1701";

    /**
     * @throws GCS_ApiException
     * @return GCS_refund_RefundErrorResponse
     * @return string
     */
    public function testCreateRefund()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $paymentId = "000000170110001805450000100001";

        $refundRequest = new GCS_refund_RefundRequest();

        $customerName = new GCS_payment_definitions_PersonalName();
        $customerName->surname = "X";
        $customerAddress = new GCS_payment_definitions_AddressPersonal();
        $customerAddress->name = $customerName;
        $customer = new GCS_refund_definitions_RefundCustomer();
        $customer->address = $customerAddress;
        $refundRequest->customer = $customer;

        $refundReferences = new GCS_refund_definitions_RefundReferences();
        $refundReferences->merchantReference = "850000568099";
        $refundRequest->refundReferences = $refundReferences;

        $amountOfMoney = new GCS_fei_definitions_AmountOfMoney();
        $amountOfMoney->currencyCode = "EUR";
        $amountOfMoney->amount = 1;
        $refundRequest->amountOfMoney = $amountOfMoney;

        $bankRefundMethodSpecificInput = new GCS_refund_definitions_BankRefundMethodSpecificInput();
        $bankAccountIban = new GCS_fei_definitions_BankAccountIban();
        $bankAccountIban->iban = "NL53INGB0000000036";
        $bankRefundMethodSpecificInput->bankAccountIban = $bankAccountIban;
        $refundRequest->bankRefundMethodSpecificInput = $bankRefundMethodSpecificInput;

        /** @var GCS_refund_RefundResponse $refundResponse * */
        $refundResponse = $client->merchant($merchantId)->payments()->refund($paymentId, $refundRequest);
        return $refundResponse->id;
    }

    /**
     * @depends testCreateRefund
     * @param string $refundId
     * @return string
     * @throws GCS_ApiException
     */
    public function testRetrieveRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        /** @var GCS_refund_RefundResponse $refundResponse */
        $refundResponse = $client->merchant($merchantId)->refunds()->get($refundId);
        return $refundResponse->id;
    }

    /**
     * @depends testRetrieveRefund
     * @param string $refundId
     * @throws GCS_ApiException
     * @return string
     */
    public function testApproveRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;

        $approveRefundRequest = new GCS_refund_ApproveRefundRequest();

        $approveRefundRequest->amount = 1;

        $client->merchant($merchantId)->refunds()->approve($refundId, $approveRefundRequest);
        return $refundId;
    }

    /**
     * @depends testApproveRefund
     * @param string $refundId
     * @throws GCS_ApiException
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
     * @throws GCS_ApiException
     */
    public function testCancelRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $client->merchant($merchantId)->refunds()->cancel($refundId);
        return $refundId;
    }
}
