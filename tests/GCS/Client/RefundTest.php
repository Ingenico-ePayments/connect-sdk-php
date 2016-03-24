<?php
namespace GCS\Client;

use GCS\ApiException;
use GCS\ClientTestCase;
use GCS\Fei\Definitions\AmountOfMoney;
use GCS\Fei\Definitions\BankAccountIban;
use GCS\Refund\ApproveRefundRequest;
use GCS\Refund\Definitions\BankRefundMethodSpecificInput;
use GCS\Refund\Definitions\RefundReferences;
use GCS\Refund\RefundErrorResponse;
use GCS\Refund\RefundRequest;
use GCS\Refund\RefundResponse;

/**
 * Class RefundTest
 *
 * @package GCS\Client
 * @group   examples
 */
class RefundTest extends ClientTestCase
{
    const MERCHANT_ID = "9991";

    /**
     * @return string|RefundErrorResponse
     *
     * @throws ApiException
     */
    public function testCreateRefund()
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $paymentId = "000000999100000429790000100001";

        $refundRequest = new RefundRequest();

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
        $refundRequest->bankRefundMethodSpecificInput = $bankRefundMethodSpecificInput;

        /** @var RefundResponse $refundResponse * */
        $refundResponse = $client->merchant($merchantId)->payments()->refund($paymentId, $refundRequest);
        return $refundResponse->id;
    }

    /**
     * @param string $refundId
     *
     * @return string
     *
     * @throws ApiException
     *
     * @depends testCreateRefund
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
     * @param string $refundId
     *
     * @return string
     *
     * @throws ApiException
     *
     * @depends testRetrieveRefund
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
     * @param string $refundId
     *
     * @return string
     *
     * @throws ApiException
     *
     * @depends testApproveRefund
     */
    public function testUndoApproveRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $client->merchant($merchantId)->refunds()->cancelapproval($refundId);
        return $refundId;
    }

    /**
     * @param string $refundId
     *
     * @return string
     *
     * @throws ApiException
     *
     * @depends testUndoApproveRefund
     */
    public function testCancelRefund($refundId)
    {
        $client = $this->getClient();
        $merchantId = self::MERCHANT_ID;
        $client->merchant($merchantId)->refunds()->cancel($refundId);
        return $refundId;
    }
}
