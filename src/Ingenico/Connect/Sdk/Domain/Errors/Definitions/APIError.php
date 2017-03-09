<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Errors\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class APIError
 *
 * @package Ingenico\Connect\Sdk\Domain\Errors\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_APIError APIError
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
