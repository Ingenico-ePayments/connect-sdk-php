<?php

class GCS_DefaultConnectionResponse implements GCS_ConnectionResponse
{
    /** @var int */
    protected $httpStatusCode;

    /** @var array */
    protected $headers;

    /** @var array */
    protected $lowerCasedHeaderKeyMap;

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
        $this->lowerCasedHeaderKeyMap = array();
        foreach (array_keys($headers) as $headerKey) {
            $this->lowerCasedHeaderKeyMap[strtolower($headerKey)] = $headerKey;
        }
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
        $lowerCasedName = strtolower($name);
        if (array_key_exists($lowerCasedName, $this->lowerCasedHeaderKeyMap)) {
            return $this->headers[$this->lowerCasedHeaderKeyMap[$lowerCasedName]];
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
