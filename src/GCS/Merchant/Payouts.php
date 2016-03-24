<?php
namespace GCS\Merchant;

use GCS\Errors\ErrorResponse;
use GCS\Payout\ApprovePayoutRequest;
use GCS\Payout\CreatePayoutRequest;
use GCS\Payout\PayoutErrorResponse;
use GCS\Payout\PayoutResponse;
use GCS\Resource;
use GCS\ResponseClassMap;

/**
 * Class Payouts
 *
 * Payouts client.
 * Create, cancel and approve payouts
 *
 * @package GCS\Merchant
 */
class Payouts extends Resource
{
    /**
     * Resource /{merchantId}/payouts/{payoutId}/cancel
     * Cancel payout
     *
     * @param string $payoutId
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function cancel($payoutId)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(402, '\GCS\Errors\ErrorResponse');
        $responseClassMap->addResponseClassName(204, '');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}/cancel'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/payouts
     * Create payout
     *
     * @param CreatePayoutRequest $body
     *
     * @return PayoutResponse
     *
     * @throws PayoutErrorResponse
     * @throws ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(400, '\GCS\Payout\PayoutErrorResponse');
        $responseClassMap->addResponseClassName(201, '\GCS\Payout\PayoutResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}/approve
     * Approve payout
     *
     * @param string $payoutId
     * @param ApprovePayoutRequest $body
     *
     * @return PayoutResponse
     *
     * @throws ErrorResponse
     */
    public function approve($payoutId, $body)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Payout\PayoutResponse');
        $responseClassMap->addResponseClassName(402, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}/approve'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}/cancelapproval
     * Undo approve payout
     *
     * @param string $payoutId
     *
     * @return null
     *
     * @throws ErrorResponse
     */
    public function cancelapproval($payoutId)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(204, '');
        $responseClassMap->addResponseClassName(405, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}/cancelapproval'),
            $this->getClientMetaInfo()
        );
    }

    /**
     * Resource /{merchantId}/payouts/{payoutId}
     * Retrieve payout
     *
     * @param string $payoutId
     *
     * @return PayoutResponse
     *
     * @throws ErrorResponse
     */
    public function get($payoutId)
    {
        $this->context['payoutId'] = $payoutId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\Payout\PayoutResponse');
        $responseClassMap->addResponseClassName(404, '\GCS\Errors\ErrorResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/payouts/{payoutId}'),
            $this->getClientMetaInfo()
        );
    }
}
