<?php

/**
 * Refunds client.
 * Create, cancel and approve refunds
 */
class GCS_Merchant_Refunds extends GCS_Resource
{
    /**
     * Resource /{merchantId}/refunds/{refundId}/cancel
     * Cancel refund
     *
     * @param string $refundId
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancel($refundId, GCS_CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/refunds/{refundId}/cancel'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}/approve
     * Approve refund
     *
     * @param string $refundId
     * @param GCS_refund_ApproveRefundRequest $body
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function approve($refundId, $body, GCS_CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/refunds/{refundId}/approve'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}/cancelapproval
     * Undo approve refund
     *
     * @param string $refundId
     * @param GCS_CallContext $callContext
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancelapproval($refundId, GCS_CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/refunds/{refundId}/cancelapproval'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}
     * Get refund
     *
     * @param string $refundId
     * @param GCS_CallContext $callContext
     * @return GCS_refund_RefundResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($refundId, GCS_CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_refund_RefundResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/refunds/{refundId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }
}
