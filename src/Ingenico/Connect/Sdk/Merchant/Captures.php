<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Merchant;

use Ingenico\Connect\Sdk\ApiException;
use Ingenico\Connect\Sdk\AuthorizationException;
use Ingenico\Connect\Sdk\CallContext;
use Ingenico\Connect\Sdk\Domain\Capture\CaptureResponse;
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
}
