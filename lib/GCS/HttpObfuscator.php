<?php

class GCS_HttpObfuscator
{
    const HTTP_VERSION = 'HTTP/1.1';

    /** @var GCS_HttpHeaderHelper */
    protected $httpHeaderHelper;

    /** @var GCS_HeaderObfuscator */
    protected $headerObfuscator;

    /** @var GCS_BodyObfuscator */
    protected $bodyObfuscator;

    public function __construct()
    {
        $this->httpHeaderHelper = new GCS_HttpHeaderHelper();
        $this->headerObfuscator = new GCS_HeaderObfuscator();
        $this->bodyObfuscator = new GCS_BodyObfuscator();
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
     * @param GCS_ConnectionResponse $response
     * @return string
     */
    public function getRawObfuscatedResponse(GCS_ConnectionResponse $response)
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
