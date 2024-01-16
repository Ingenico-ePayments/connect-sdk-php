<?php
namespace Ingenico\Connect\Sdk\Webhooks;

use Ingenico\Connect\Sdk\Client;
use Ingenico\Connect\Sdk\DefaultConnectionResponse;
use Ingenico\Connect\Sdk\Domain\Webhooks\WebhooksEvent;
use Ingenico\Connect\Sdk\ResponseClassMap;
use Ingenico\Connect\Sdk\ResponseFactory;

/**
 * Class WebhooksHelper
 *
 * @package Ingenico\Connect\Sdk\Webhooks
 */
class WebhooksHelper
{
    /**
     * @var SecretKeyStore
     * @deprecated Will be removed in a future version
     */
    protected $secretKeyStore;

    /** @var SignatureValidator */
    private $signatureValidator;

    /** @var ResponseFactory|null */
    private $responseFactory = null;

    /**
     * @param SecretKeyStore $secretKeyStore
     */
    public function __construct(SecretKeyStore $secretKeyStore)
    {
        $this->secretKeyStore = $secretKeyStore;
        $this->signatureValidator = new SignatureValidator($secretKeyStore);
    }

    /** @return ResponseFactory */
    protected function getResponseFactory()
    {
        if (is_null($this->responseFactory)) {
            $this->responseFactory = new ResponseFactory();
        }
        return $this->responseFactory;
    }

    /**
     * Unmarshals the given input stream that contains the body,
     * while also validating its contents using the given request headers.
     * @param string $body
     * @param array $requestHeaders
     * @return WebhooksEvent
     * @throws SignatureValidationException
     * @throws ApiVersionMismatchException
     */
    public function unmarshal($body, $requestHeaders)
    {
        $this->validate($body, $requestHeaders);

        $response = new DefaultConnectionResponse(200, array('Content-Type' => 'application/json'), $body);
        $responseClassMap = new ResponseClassMap();
        $responseClassMap->addResponseClassName(200, '\Ingenico\Connect\Sdk\Domain\Webhooks\WebhooksEvent');

        $event = $this->getResponseFactory()->createResponse($response, $responseClassMap);
        $this->validateApiVersion($event);
        return $event;
    }

    /**
     * Validates the given body using the given request headers.
     * @param string $body
     * @param array $requestHeaders
     * @throws SignatureValidationException
     */
    protected function validate($body, $requestHeaders)
    {
        $this->signatureValidator->validate($body, $requestHeaders);
    }

    // general utility methods

    private function validateApiVersion($event)
    {
        if (Client::API_VERSION !== $event->apiVersion) {
            throw new ApiVersionMismatchException($event->apiVersion, Client::API_VERSION);
        }
    }
}
