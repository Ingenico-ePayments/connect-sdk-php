<?php
namespace GCS\Merchant;

use GCS\errors\ErrorResponse;
use GCS\refund\ApproveRefundRequest;
use GCS\refund\RefundResponse;
use GCS\Resource;
use GCS\ResponseClassMap;

/**
 * Class Refunds
 *
 * Refunds client.
 * Create, cancel and approve refunds
 *
 * @package GCS\Merchant
 */
class Refunds extends Resource
{
    /**
     * Resource /{merchantId}/refunds/{refundId}/cancel
     * Cancel refund
     *
     * @param string $refundId
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function cancel($refundId)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
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
     * @param ApproveRefundRequest $body
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function approve($refundId, $body)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
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
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function cancelapproval($refundId)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
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
     *
     * @return RefundResponse
     *
     * @throws ErrorResponse
     */
    public function get($refundId)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\refund\RefundResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/refunds/{refundId}'),
            $this->getClientMetaInfo()
        );
    }
}
