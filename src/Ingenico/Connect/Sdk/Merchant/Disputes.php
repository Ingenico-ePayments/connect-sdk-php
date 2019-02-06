<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Dispute\DisputeResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Disputes client.
 */
class Disputes extends Resource
{
    /**
     * Resource /{merchantId}/disputes/{disputeId} - Get dispute
     *
     * @param string $disputeId
     * @param CallContext $callContext
     * @return DisputeResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/disputes/get.html Get dispute
     */
    public function get($disputeId, CallContext $callContext = null)
    {
        $this->context['disputeId'] = $disputeId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Dispute\DisputeResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/disputes/{disputeId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/disputes/{disputeId}/submit - Submit dispute
     *
     * @param string $disputeId
     * @param CallContext $callContext
     * @return DisputeResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/disputes/submit.html Submit dispute
     */
    public function submit($disputeId, CallContext $callContext = null)
    {
        $this->context['disputeId'] = $disputeId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Dispute\DisputeResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{apiVersion}/{merchantId}/disputes/{disputeId}/submit'),
            $this->getClientMetaInfo(),
            null,
            null,
            $callContext
        );
    }
}
