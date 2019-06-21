<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class OrderStatusOutput extends DataObject
{
    /**
     * @var APIError[]
     */
    public $errors = null;

    /**
     * @var bool
     */
    public $isCancellable = null;

    /**
     * @var string
     */
    public $statusCategory = null;

    /**
     * @var int
     */
    public $statusCode = null;

    /**
     * @var string
     */
    public $statusCodeChangeDateTime = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->errors)) {
            $object->errors = [];
            foreach ($this->errors as $element) {
                if (!is_null($element)) {
                    $object->errors[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->isCancellable)) {
            $object->isCancellable = $this->isCancellable;
        }
        if (!is_null($this->statusCategory)) {
            $object->statusCategory = $this->statusCategory;
        }
        if (!is_null($this->statusCode)) {
            $object->statusCode = $this->statusCode;
        }
        if (!is_null($this->statusCodeChangeDateTime)) {
            $object->statusCodeChangeDateTime = $this->statusCodeChangeDateTime;
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
        if (property_exists($object, 'errors')) {
            if (!is_array($object->errors) && !is_object($object->errors)) {
                throw new UnexpectedValueException('value \'' . print_r($object->errors, true) . '\' is not an array or object');
            }
            $this->errors = [];
            foreach ($object->errors as $element) {
                $value = new APIError();
                $this->errors[] = $value->fromObject($element);
            }
        }
        if (property_exists($object, 'isCancellable')) {
            $this->isCancellable = $object->isCancellable;
        }
        if (property_exists($object, 'statusCategory')) {
            $this->statusCategory = $object->statusCategory;
        }
        if (property_exists($object, 'statusCode')) {
            $this->statusCode = $object->statusCode;
        }
        if (property_exists($object, 'statusCodeChangeDateTime')) {
            $this->statusCodeChangeDateTime = $object->statusCodeChangeDateTime;
        }
        return $this;
    }
}
