<?php
namespace GCS\Merchant;

use GCS\Errors\ErrorResponse;
use GCS\HostedCheckout\CreateHostedCheckoutRequest;
use GCS\HostedCheckout\CreateHostedCheckoutResponse;
use GCS\HostedCheckout\GetHostedCheckoutResponse;
use GCS\Resource;
use GCS\ResponseClassMap;

/**
 * Class Hostedcheckouts
 *
 * HostedCheckouts client.
 * Create new hosted checkout
 *
 * @package GCS\Merchant
 */
class Hostedcheckouts extends Resource
{
    /**
     * Resource /{merchantId}/hostedcheckouts
     * Create hosted checkout
     *
     * @param CreateHostedCheckoutRequest $body
     *
     * @return CreateHostedCheckoutResponse
     *
     * @throws ErrorResponse
     */
    public function create($body)
    {
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(201, '\GCS\HostedCheckout\CreateHostedCheckoutResponse');
        return $this->getCommunicator()->post(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/hostedcheckouts'),
            $this->getClientMetaInfo(),
            $body
        );
    }

    /**
     * Resource /{merchantId}/hostedcheckouts/{hostedCheckoutId}
     * Get hosted checkout status
     *
     * @param string $hostedCheckoutId
     *
     * @return GetHostedCheckoutResponse
     *
     * @throws ErrorResponse
     */
    public function get($hostedCheckoutId)
    {
        $this->context['hostedCheckoutId'] = $hostedCheckoutId;
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\GCS\HostedCheckout\GetHostedCheckoutResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/hostedcheckouts/{hostedCheckoutId}'),
            $this->getClientMetaInfo()
        );
    }
}
