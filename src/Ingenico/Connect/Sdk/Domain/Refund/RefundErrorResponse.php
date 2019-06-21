<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Refund
 */
class RefundErrorResponse extends DataObject
{
    /**
     * @var string
     */
    public $errorId = null;

    /**
     * @var APIError[]
     */
    public $errors = null;

    /**
     * @var RefundResult
     */
    public $refundResult = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->errorId)) {
            $object->errorId = $this->errorId;
        }
        if (!is_null($this->errors)) {
            $object->errors = [];
            foreach ($this->errors as $element) {
                if (!is_null($element)) {
                    $object->errors[] = $element->toObject();
                }
            }
        }
        if (!is_null($this->refundResult)) {
            $object->refundResult = $this->refundResult->toObject();
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
        if (property_exists($object, 'errorId')) {
            $this->errorId = $object->errorId;
        }
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
        if (property_exists($object, 'refundResult')) {
            if (!is_object($object->refundResult)) {
                throw new UnexpectedValueException('value \'' . print_r($object->refundResult, true) . '\' is not an object');
            }
            $value = new RefundResult();
            $this->refundResult = $value->fromObject($object->refundResult);
        }
        return $this;
    }
}
