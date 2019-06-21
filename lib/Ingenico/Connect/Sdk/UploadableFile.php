<?php
namespace Ingenico\Connect\Sdk;

use \UnexpectedValueException;

/**
 * Class UploadableFile
 *
 * @package Ingenico\Connect\Sdk
 */
class UploadableFile
{
    /** @var string */
    private $fileName;

    /** @var resource|string|callable */
    private $content;

    /** @var string */
    private $contentType;

    /** @var int */
    private $contentLength;

    /**
     * @param string $fileName
     * @param resource|string|callable $content
     *        If it's a callable it should take a length argument and return a string that is not larger than the input.
     * @param string $contentType
     * @param int $contentLength
     */
    public function __construct($fileName, $content, $contentType, $contentLength = -1)
    {
        if (is_null($fileName) || strlen(trim($fileName)) == 0) {
            throw new UnexpectedValueException("fileName is required");
        }
        if (!is_resource($content) && !is_string($content) && !is_callable($content)) {
            throw new UnexpectedValueException('content is required as resource, string or callable');
        }
        if (is_null($contentType) || strlen(trim($contentType)) == 0) {
            throw new UnexpectedValueException("contentType is required");
        }
        $this->fileName = $fileName;
        $this->content = $content;
        $this->contentType = $contentType;
        $this->contentLength = max($contentLength, -1);
        if ($this->contentLength == -1 && is_string($content)) {
            $this->contentLength = strlen($content);
        }
    }

    /**
     * @return string The name of the file.
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @return resource|string|callable A resource, string or callable with the file's content.
     *         If it's a callable it should take a length argument and return a string that is not larger than the input.
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string The file's content type.
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return int The file's content length, or -1 if not known.
     */
    public function getContentLength()
    {
        return $this->contentLength;
    }
}
