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
    /** @var SecretKeyStore */
    protected $secretKeyStore;

    /** @var ResponseFactory|null */
    private $responseFactory = null;

    /**
     * @param SecretKeyStore $secretKeyStore
     */
    public function __construct(SecretKeyStore $secretKeyStore)
    {
        $this->secretKeyStore = $secretKeyStore;
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
        $this->validateBody($body, $requestHeaders);
    }

    // validation utility methods

    private function validateBody($body, $requestHeaders)
    {
        $signature = $this->getHeaderValue($requestHeaders, 'X-GCS-Signature');
        $keyId = $this->getHeaderValue($requestHeaders, 'X-GCS-KeyId');
        $secretKey = $this->secretKeyStore->getSecretKey($keyId);

        $expectedSignature = base64_encode(hash_hmac("sha256", $body, $secretKey, true));

        $isValid = $this->areEqualSignatures($signature, $expectedSignature);
        if (!$isValid) {
            throw new SignatureValidationException("failed to validate signature '$signature'");
        }
    }

    private function areEqualSignatures($signature, $expectedSignature) {
        if (function_exists('hash_equals')) {
            return hash_equals($expectedSignature, $signature);
        } else {
            // copied from http://php.net/manual/en/function.hash-equals.php#115635
            if(strlen($expectedSignature) != strlen($signature)) {
                return false;
            } else {
                $res = $expectedSignature ^ $signature;
                $ret = 0;
                for($i = strlen($res) - 1; $i >= 0; $i--) $ret |= ord($res[$i]);
                return !$ret;
            }
        }
    }

    // general utility methods

    private function validateApiVersion($event)
    {
        if (Client::API_VERSION !== $event->apiVersion) {
            throw new ApiVersionMismatchException($event->apiVersion, Client::API_VERSION);
        }
    }

    private function getHeaderValue($requestHeaders, $headerName) {
        $lowerCaseHeaderName = strtolower($headerName);
        foreach ($requestHeaders as $name => $value) {
            if ($lowerCaseHeaderName === strtolower($name)) {
                return $value;
            }
        }
        throw new SignatureValidationException("could not find header '$headerName'");
    }
}
