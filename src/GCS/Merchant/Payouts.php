<?php

/**
 * Payouts client.
 * Create, cancel and approve payouts
 */
class GCS_Merchant_Payouts extends GCS_Resource
{
    /**
     * Resource /{merchantId}/payouts/{payoutId}/cancel
     * Cancel payout
     *
     * @param string $payoutId
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancel($payoutId, GCS_CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(402, 'GCS_errors_ErrorResponse');
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}/cancel'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts
     * Create payout
     *
     * @param GCS_payout_CreatePayoutRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_payout_PayoutResponse
     * 
     * @throws GCS_payout_PayoutErrorResponse
     * @throws GCS_errors_ErrorResponse
     */
    public function create($body, GCS_CallContext $callContext = null)
    {
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(400, 'GCS_payout_PayoutErrorResponse');
        $responseClassMap->addResponseClassName(201, 'GCS_payout_PayoutResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}/approve
     * Approve payout
     *
     * @param string $payoutId
     * @param GCS_payout_ApprovePayoutRequest $body
     * @param GCS_CallContext $callContext
     * @return GCS_payout_PayoutResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function approve($payoutId, $body, GCS_CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_payout_PayoutResponse');
        $responseClassMap->addResponseClassName(402, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}/approve'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}/cancelapproval
     * Undo approve payout
     *
     * @param string $payoutId
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancelapproval($payoutId, GCS_CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        $responseClassMap->addResponseClassName(405, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}/cancelapproval'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}
     * Retrieve payout
     *
     * @param string $payoutId
     * @param GCS_CallContext $callContext
     * @return GCS_payout_PayoutResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($payoutId, GCS_CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_payout_PayoutResponse');
        $responseClassMap->addResponseClassName(404, 'GCS_errors_ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }
}
