<?php
namespace Ingenico\Connect\Sdk;

use stdClass;
use Exception;
use UnexpectedValueException;

/**
 * Class DataObject
 *
 * @package Ingenico\Connect\Sdk
 */
abstract class DataObject
{
    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toObject());
    }

    /**
     * @param string $value
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromJson($value)
    {
        $object = json_decode($value);
        if (json_last_error()) {
            throw new UnexpectedValueException('Invalid JSON value: '. $this->getLastJsonDecodeErrorString());
        }
        return $this->fromObject($object);
    }

    /**
     * @return string
     */
    protected function getLastJsonDecodeErrorString()
    {
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return 'No errors';
                break;
            case JSON_ERROR_DEPTH:
                return 'Maximum stack depth exceeded';
                break;
            case JSON_ERROR_STATE_MISMATCH:
                return 'Underflow or the modes mismatch';
                break;
            case JSON_ERROR_CTRL_CHAR:
                return 'Unexpected control character found';
                break;
            case JSON_ERROR_SYNTAX:
                return 'Syntax error. Malformed JSON';
                break;
            case JSON_ERROR_UTF8:
                return 'Malformed UTF-8 characters. Incorrect encoding';
                break;
            default:
                return 'Unknown error';
                break;
        }
    }

    /**
     * @return object
     */
    public function toObject()
    {
        $object = new stdClass();
        foreach ($this as $propertyName => $propertyValue) {
            if (is_null($propertyValue)) {
                continue;
            }
            if ($propertyValue instanceof DataObject) {
                $object->$propertyName = $propertyValue->toObject();
            } else {
                $object->$propertyName = $propertyValue;
            }
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
        if (!is_object($object)) {
            throw new UnexpectedValueException('Expected object, got ' . gettype($object));
        }
        return $this;
    }

    public function __set($name, $value)
    {
        throw new Exception('Cannot add new property ' . $name . ' to instances of class ' . get_class($this));
    }
}
