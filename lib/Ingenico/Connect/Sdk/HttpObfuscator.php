<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class HttpObfuscator
 *
 * @package Ingenico\Connect\Sdk
 */
class HttpObfuscator
{
    const HTTP_VERSION = 'HTTP/1.1';

    /** @var HttpHeaderHelper */
    protected $httpHeaderHelper;

    /** @var HeaderObfuscator */
    protected $headerObfuscator;

    /** @var BodyObfuscator */
    protected $bodyObfuscator;

    public function __construct()
    {
        $this->httpHeaderHelper = new HttpHeaderHelper();
        $this->headerObfuscator = new HeaderObfuscator();
        $this->bodyObfuscator = new BodyObfuscator();
    }

    /**
     * @param string $requestMethod
     * @param string $relativeRequestUri
     * @param array $requestHeaders
     * @param string $requestBody
     * @return string
     */
    public function getRawObfuscatedRequest(
        $requestMethod,
        $relativeRequestUri,
        array $requestHeaders,
        $requestBody = ''
    ) {
        $rawObfuscatedRequest = $requestMethod . ' ' . $relativeRequestUri . ' ' . static::HTTP_VERSION;
        if ($requestHeaders) {
            $rawObfuscatedRequest .= PHP_EOL . implode(PHP_EOL, $this->httpHeaderHelper->generateRawHeaders(
                $this->headerObfuscator->obfuscateHeaders($requestHeaders)
            ));
        }
        if (strlen($requestBody) > 0) {
            $rawObfuscatedRequest .= PHP_EOL . PHP_EOL . $this->bodyObfuscator->obfuscateBody(
                array_key_exists('Content-Type', $requestHeaders) ? $requestHeaders['Content-Type'] : '',
                $requestBody
            );
        }
        return $rawObfuscatedRequest;
    }

    /**
     * @param ConnectionResponse $response
     * @return string
     */
    public function getRawObfuscatedResponse(ConnectionResponse $response)
    {
        $rawObfuscatedResponse = '';
        $responseHeaders = $response->getHeaders();
        if ($responseHeaders) {
            $rawObfuscatedResponse .= implode(PHP_EOL, $this->httpHeaderHelper->generateRawHeaders(
                $this->headerObfuscator->obfuscateHeaders($responseHeaders)
            ));
        }
        $responseBody = $response->getBody();
        if (strlen($responseBody) > 0) {
            $rawObfuscatedResponse .= PHP_EOL . PHP_EOL . $this->bodyObfuscator->obfuscateBody(
                $response->getHeaderValue('Content-Type'),
                $responseBody
            );
        }
        return $rawObfuscatedResponse;
    }
}
