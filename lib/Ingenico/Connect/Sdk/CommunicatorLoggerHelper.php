<?php
namespace Ingenico\Connect\Sdk;

use Exception;

/**
 * Class CommunicatorLoggerHelper
 *
 * @package Ingenico\Connect\Sdk
 */
class CommunicatorLoggerHelper
{
    /** @var HttpObfuscator|null */
    private $httpObfuscator = null;

    /**
     * @param CommunicatorLogger $communicatorLogger
     * @param string $requestId
     * @param string $requestMethod
     * @param string $requestUri
     * @param array $requestHeaders
     * @param string $requestBody
     */
    public function logRequest(
        CommunicatorLogger $communicatorLogger,
        $requestId,
        $requestMethod,
        $requestUri,
        array $requestHeaders,
        $requestBody = ''
    ) {
        if ($communicatorLogger) {
            $communicatorLogger->log(sprintf(
                "Outgoing request to %s (requestId='%s')\n%s",
                $this->getEndpoint($requestUri),
                $requestId,
                $this->getHttpObfuscator()->getRawObfuscatedRequest(
                    $requestMethod,
                    $this->getRelativeUriPathWithRequestParameters($requestUri),
                    $requestHeaders,
                    $requestBody
                )
            ));
        }
    }

    /**
     * @param CommunicatorLogger $communicatorLogger
     * @param string $requestId
     * @param string $requestUri
     * @param ConnectionResponse $response
     */
    public function logResponse(CommunicatorLogger $communicatorLogger, $requestId, $requestUri, ConnectionResponse $response)
    {
        if ($communicatorLogger) {
            $communicatorLogger->log(sprintf(
                "Incoming response from %s (requestId='%s')\n%s",
                $this->getEndpoint($requestUri),
                $requestId,
                $this->getHttpObfuscator()->getRawObfuscatedResponse($response)
            ));
        }
    }

    /**
     * @param CommunicatorLogger $communicatorLogger
     * @param string $requestId
     * @param string $requestUri
     * @param Exception $exception
     */
    public function logException(CommunicatorLogger $communicatorLogger, $requestId, $requestUri, Exception $exception)
    {
        if ($communicatorLogger) {
            $communicatorLogger->logException(sprintf(
                "Error occurred while executing request to %s (requestId='%s')",
                $this->getEndpoint($requestUri),
                $requestId
            ), $exception);
        }
    }

    /** @return HttpObfuscator */
    protected function getHttpObfuscator()
    {
        if (is_null($this->httpObfuscator)) {
            $this->httpObfuscator = new HttpObfuscator();
        }
        return $this->httpObfuscator;
    }

    /**
     * @param string $requestUri
     * @return string
     */
    public function getEndpoint($requestUri)
    {
        $index = strpos($requestUri, '://');
        if ($index != FALSE) {
            $index = strpos($requestUri, '/', $index + 3);
            // $index === FALSE means there's no / after the host; there is no relative URI
            return $index !== FALSE ? substr($requestUri, 0, $index) : $requestUri;
        } else {
            // not an absolute URI
            return '';
        }
    }

    /**
     * @param string $requestUri
     * @return string
     */
    public function getRelativeUriPathWithRequestParameters($requestUri)
    {
        $index = strpos($requestUri, '://');
        if ($index !== FALSE) {
            $index = strpos($requestUri, '/', $index + 3);
            // $index === FALSE means there's no / after the host; there is no relative URI
            return $index !== FALSE ? substr($requestUri, $index) : '';
        } else {
            // not an absolute URI
            return $requestUri;
        }
    }
}
