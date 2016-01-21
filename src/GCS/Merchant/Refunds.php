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
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancel($refundId)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/refunds/{refundId}/cancel'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}/approve
     * Approve refund
     *
     * @param string $refundId
     * @param GCS_refund_ApproveRefundRequest $body
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function approve($refundId, $body)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/refunds/{refundId}/approve'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}/cancelapproval
     * Undo approve refund
     *
     * @param string $refundId
     * @return null
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function cancelapproval($refundId)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/refunds/{refundId}/cancelapproval'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}
     * Retrieve refund
     *
     * @param string $refundId
     * @return GCS_refund_RefundResponse
     * 
     * @throws GCS_errors_ErrorResponse
     */
    public function get($refundId)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new GCS_ResponseClassMap();
        $responseClassMap->addResponseClassName(200, 'GCS_refund_RefundResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/refunds/{refundId}'),
            $this->getClientMetaInfo()
        );
    }
}
