<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\DeclinedRefundException;
use Ingenico\Connect\Sdk\Domain\Capture\CaptureResponse;
use Ingenico\Connect\Sdk\Domain\Refund\RefundRequest;
use Ingenico\Connect\Sdk\Domain\Refund\RefundResponse;
use Ingenico\Connect\Sdk\GlobalCollectException;
use Ingenico\Connect\Sdk\IdempotenceException;
use Ingenico\Connect\Sdk\InvalidResponseException;
use Ingenico\Connect\Sdk\ReferenceException;
use Ingenico\Connect\Sdk\Resource;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ValidationException;

/**
 * Captures client.
 */
class Captures extends Resource
{
    /**
     * Resource /{merchantId}/captures/{captureId} - Get capture
     *
     * @param string $captureId
     * @param CallContext $callContext
     * @return CaptureResponse
     *
     * @throws ValidationException
     * @throws AuthorizationException
     * @throws IdempotenceException
     * @throws ReferenceException
     * @throws GlobalCollectException
     * @throws ApiException
     * @throws InvalidResponseException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/captures/get.html Get capture
     */
    public function get($captureId, CallContext $callContext = null)
    {
        $this->context['captureId'] = $captureId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Capture\CaptureResponse';
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/captures/{captureId}'),
            $this->getClientMetaInfo(),
            null,
            $callContext
        );
    }

    /**
     * Resource /{merchantId}/captures/{captureId}/refund - Create Refund
     *
     * @param string $captureId
     * @param RefundRequest $body
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
     * @throws DeclinedRefundException
     * @link https://epayments-api.developer-ingenico.com/s2sapi/v1/en_US/php/captures/refund.html Create Refund
     */
    public function refund($captureId, RefundRequest $body, CallContext $callContext = null)
    {
        $this->context['captureId'] = $captureId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->defaultSuccessResponseClassName = '\Ingenico\Connect\Sdk\Domain\Refund\RefundResponse';
        $responseClassMap->defaultErrorResponseClassName = '\Ingenico\Connect\Sdk\Domain\Refund\RefundErrorResponse';
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/v1/{merchantId}/captures/{captureId}/refund'),
            $this->getClientMetaInfo(),
            $body,
            null,
            $callContext
        );
    }
}
