<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Errors\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Errors\Definitions
 */
class APIError extends DataObject
{
    /**
     * @var string
     */
    public $category = null;

    /**
     * @var string
     */
    public $code = null;

    /**
     * @var int
     */
    public $httpStatusCode = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $message = null;

    /**
     * @var string
     */
    public $propertyName = null;

    /**
     * @var string
     */
    public $requestId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->category)) {
            $object->category = $this->category;
        }
        if (!is_null($this->code)) {
            $object->code = $this->code;
        }
        if (!is_null($this->httpStatusCode)) {
            $object->httpStatusCode = $this->httpStatusCode;
        }
        if (!is_null($this->id)) {
            $object->id = $this->id;
        }
        if (!is_null($this->message)) {
            $object->message = $this->message;
        }
        if (!is_null($this->propertyName)) {
            $object->propertyName = $this->propertyName;
        }
        if (!is_null($this->requestId)) {
            $object->requestId = $this->requestId;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'category')) {
            $this->category = $object->category;
        }
        if (property_exists($object, 'code')) {
            $this->code = $object->code;
        }
        if (property_exists($object, 'httpStatusCode')) {
            $this->httpStatusCode = $object->httpStatusCode;
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'message')) {
            $this->message = $object->message;
        }
        if (property_exists($object, 'propertyName')) {
            $this->propertyName = $object->propertyName;
        }
        if (property_exists($object, 'requestId')) {
            $this->requestId = $object->requestId;
        }
        return $this;
    }
}
