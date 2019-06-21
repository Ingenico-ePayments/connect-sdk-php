<?php
namespace Ingenico\Connect\Sdk;

/**
 * Class ResponseHeaderBuilder
 *
 * @package Ingenico\Connect\Sdk
 */
class ResponseHeaderBuilder
{
    /** @var string */
    public $headerString = '';

    /** @var array|null */
    private $headers = null;

    /** @var string|null */
    private $contentType = null;

    /**
     * @param string $data
     */
    public function append($data)
    {
        $this->headerString .= $data;
        $this->headers = null;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        if (is_null($this->headers)) {
            $httpHeaderHelper = new HttpHeaderHelper();
            $this->headers = $httpHeaderHelper->parseRawHeaders(explode("\r\n", $this->headerString));
        }
        return $this->headers;
    }

    /**
     * @return string|null
     */
    public function getContentType()
    {
        if (is_null($this->contentType)) {
            $headers = $this->getHeaders();
            foreach ($headers as $headerKey => $headerValue) {
                if (strtolower($headerKey) === 'content-type') {
                    $this->contentType = $headerValue;
                    break;
                }
            }
        }
        return $this->contentType;
    }
}
