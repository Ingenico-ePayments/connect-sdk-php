<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\DeclinedPayoutException;
use Ingenico\Connect\Sdk\Domain\Payout\ApprovePayoutRequest;
use Ingenico\Connect\Sdk\Domain\Payout\CreatePayoutRequest;
use Ingenico\Connect\Sdk\Domain\Payout\FindPayoutsResponse;
use Ingenico\Connect\Sdk\Domain\Payout\PayoutResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\Merchant\Payouts\FindPayoutsParams;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Payouts client.
 */
class Payouts extends Resource
{
    /**
     * Resource /{merchantId}/payouts - Create payout
     *
     * @param CreatePayoutRequest $body
     * @param CallContext $callContext
     * @return PayoutResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @throws DeclinedPayoutException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payouts/create.html Create payout
     */
    public function create(CreatePayoutRequest $body, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Payout\PayoutResponse';
        $responseClassMap->defaultErrorResponseClassName = '\Ingenico\Connect\Sdk\Domain\Payout\PayoutErrorResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/payouts'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts - Find payouts
     *
     * @param FindPayoutsParams $query
     * @param CallContext $callContext
     * @return FindPayoutsResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payouts/find.html Find payouts
     */
    public function find(FindPayoutsParams $query, CallContext $callContext = null)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Payout\FindPayoutsResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/payouts'),
            $this->getClientMetaInfo(),
            $query,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId} - Get payout
     *
     * @param string $payoutId
     * @param CallContext $callContext
     * @return PayoutResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payouts/get.html Get payout
     */
    public function get($payoutId, CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Payout\PayoutResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/payouts/{payoutId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}/approve - Approve payout
     *
     * @param string $payoutId
     * @param ApprovePayoutRequest $body
     * @param CallContext $callContext
     * @return PayoutResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payouts/approve.html Approve payout
     */
    public function approve($payoutId, ApprovePayoutRequest $body, CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Payout\PayoutResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/payouts/{payoutId}/approve'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}/cancel - Cancel payout
     *
     * @param string $payoutId
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
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payouts/cancel.html Cancel payout
     */
    public function cancel($payoutId, CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/payouts/{payoutId}/cancel'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}/cancelapproval - Undo approve payout
     *
     * @param string $payoutId
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
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/payouts/cancelapproval.html Undo approve payout
     */
    public function cancelapproval($payoutId, CallContext $callContext = null)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/payouts/{payoutId}/cancelapproval'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }
}
