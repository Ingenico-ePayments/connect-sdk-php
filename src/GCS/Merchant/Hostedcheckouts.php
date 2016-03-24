<?php
namespace GCS\Merchant;

use GCS\errors\ErrorResponse;
use GCS\hostedcheckout\CreateHostedCheckoutRequest;
use GCS\hostedcheckout\CreateHostedCheckoutResponse;
use GCS\hostedcheckout\GetHostedCheckoutResponse;
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
        $responseClassMap->addResponseClassName(201, '\GCS\hostedcheckout\CreateHostedCheckoutResponse');
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
        $responseClassMap->addResponseClassName(200, '\GCS\hostedcheckout\GetHostedCheckoutResponse');
        return $this->getCommunicator()->get(
            $responseClassMap,
            $this->instantiateUri('/{merchantId}/hostedcheckouts/{hostedCheckoutId}'),
            $this->getClientMetaInfo()
        );
    }
}
