<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class ResponseBuilder
 *
 * @package Ingenico\Connect\Sdk
 */
class ResponseBuilder
{
    /** @var int */
    private $httpStatusCode;

    /** @var array */
    private $headers;

    /** @var string */
    private $body = '';

    /**
     * @param int $httpStatusCode
     */
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param string $data
     */
    public function appendBody($data)
    {
        $this->body .= $data;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return ConnectionResponse
     */
    public function getResponse()
    {
        return new DefaultConnectionResponse($this->httpStatusCode, $this->headers, $this->body);
    }
}
