<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\File\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\File\Definitions
 */
class HostedFile extends DataObject
{
    /**
     * @var string
     */
    public $fileName = null;

    /**
     * @var string
     */
    public $fileSize = null;

    /**
     * @var string
     */
    public $fileType = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'fileName')) {
            $this->fileName = $object->fileName;
        }
        if (property_exists($object, 'fileSize')) {
            $this->fileSize = $object->fileSize;
        }
        if (property_exists($object, 'fileType')) {
            $this->fileType = $object->fileType;
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        return $this;
    }
}
