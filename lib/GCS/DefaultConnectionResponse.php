<?php

class GCS_DefaultConnectionResponse implements GCS_ConnectionResponse
{
    /** @var int */
    protected $httpStatusCode;

    /** @var string */
    protected $headers = '';

    /** @var string */
    protected $body = '';

    /**
     * @param int $httpStatusCode
     * @param array $headers
     * @param string $body
     */
    public function __construct($httpStatusCode, array $headers, $body)
    {
        $this->httpStatusCode = $httpStatusCode;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $name
     * @return string|array
     */
    public function getHeaderValue($name)
    {
        if (array_key_exists($name, $this->headers)) {
            return $this->headers[$name];
        }
        return '';
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
}
