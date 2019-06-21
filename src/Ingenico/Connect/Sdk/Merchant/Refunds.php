<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Refund\ApproveRefundRequest;
use Ingenico\Connect\Sdk\Domain\Refund\FindRefundsResponse;
use Ingenico\Connect\Sdk\Domain\Refund\RefundResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\Merchant\Refunds\FindRefundsParams;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Refunds client.
 */
class Refunds extends Resource
{
    /**
     * Resource /{merchantId}/refunds - Find refunds
     *
     * @param FindRefundsParams $query
     * @param CallContext $callContext
     * @return FindRefundsResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/refunds/find.html Find refunds
     */
    public function find(FindRefundsParams $query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Refund\FindRefundsResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/refunds'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId} - Get refund
     *
     * @param string $refundId
     * @param CallContext $callContext
     * @return RefundResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/refunds/get.html Get refund
     */
    public function get($refundId, CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Refund\RefundResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/refunds/{refundId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}/approve - Approve refund
     *
     * @param string $refundId
     * @param ApproveRefundRequest $body
     * @param CallContext $callContext
     * @return null
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/refunds/approve.html Approve refund
     */
    public function approve($refundId, ApproveRefundRequest $body, CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/refunds/{refundId}/approve'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}/cancel - Cancel refund
     *
     * @param string $refundId
     * @param CallContext $callContext
     * @return null
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/refunds/cancel.html Cancel refund
     */
    public function cancel($refundId, CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/refunds/{refundId}/cancel'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/refunds/{refundId}/cancelapproval - Undo approve refund
     *
     * @param string $refundId
     * @param CallContext $callContext
     * @return null
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/refunds/cancelapproval.html Undo approve refund
     */
    public function cancelapproval($refundId, CallContext $callContext = null)
    {
        $this->context['refundId'] = $refundId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/refunds/{refundId}/cancelapproval'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }
}
