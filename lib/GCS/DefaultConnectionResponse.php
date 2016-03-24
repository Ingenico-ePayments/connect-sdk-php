<?php
namespace GCS;

/**
 * Class DefaultConnectionResponse
 *
 * @package GCS
 */
class DefaultConnectionResponse implements ConnectionResponse
{
    protected $contentType = '';

    protected $content = '';

    protected $httpStatusCode = '';

    /**
     * @param string $content
     * @param string[] $contentInfo
     */
    public function __construct($content, $contentInfo)
    {
        if (array_key_exists('content_type', $contentInfo)) {
            $this->contentType = $contentInfo['content_type'];
        }
        $this->content = $content;
        if (array_key_exists('http_code', $contentInfo)) {
            $this->httpStatusCode = $contentInfo['http_code'];
        }
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}
