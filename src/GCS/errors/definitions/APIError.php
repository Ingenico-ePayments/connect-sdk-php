<?php
namespace GCS\errors\definitions;

use GCS\DataObject;

/**
 * Class APIError
 *
 * @package GCS\errors\definitions
 */
class APIError extends DataObject
{
    /**
     * @var string
     */
    public $code = null;

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
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'code')) {
            $this->code = $object->code;
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
