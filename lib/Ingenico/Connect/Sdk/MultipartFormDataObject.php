<?php
namespace Ingenico\Connect\Sdk;

use UnexpectedValueException;

/**
 * Class MultipartFormDataObject
 *
 * @package Ingenico\Connect\Sdk
 */
class MultipartFormDataObject
{
    /** @var string */
    private $boundary;

    /** @var string */
    private $contentType;

    /** @var array */
    private $values;

    /** @var array */
    private $files;

    public function __construct()
    {
        $this->boundary = UuidGenerator::generatedUuid();
        $this->contentType = 'multipart/form-data; boundary=' . $this->boundary;
        $this->values = [];
        $this->files = [];
    }

    /**
     * @return string
     */
    public function getBoundary()
    {
        return $this->boundary;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param string $parameterName
     * @param string value
     */
    public function addValue($parameterName, $value)
    {
        if (is_null($parameterName) || strlen(trim($parameterName)) == 0) {
            throw new UnexpectedValueException("boundary is required");
        }
        if (is_null($value)) {
            throw new UnexpectedValueException("value is required");
        }
        if (array_key_exists($parameterName, $this->values) || array_key_exists($parameterName, $this->files)) {
            throw new UnexpectedValueException('Duplicate parameter name: ' . $parameterName);
        }
        $this->values[$parameterName] = $value;
    }

    /**
     * @param string $parameterName
     * @param UploadableFile $file
     */
    public function addFile($parameterName, UploadableFile $file)
    {
        if (is_null($parameterName) || strlen(trim($parameterName)) == 0) {
            throw new UnexpectedValueException("boundary is required");
        }
        if (is_null($file)) {
            throw new UnexpectedValueException("file is required");
        }
        if (array_key_exists($parameterName, $this->values) || array_key_exists($parameterName, $this->files)) {
            throw new UnexpectedValueException('Duplicate parameter name: ' . $parameterName);
        }
        $this->files[$parameterName] = $file;
    }
}
