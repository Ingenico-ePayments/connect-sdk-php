<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;
use Ingenico\Connect\Sdk\Domain\Refund\Definitions\RefundResult;
use UnexpectedValueException;

/**
 * Class RefundErrorResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Refund
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RefundErrorResponse RefundErrorResponse
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
            foreach ($object->errors as $errorsElementObject) {
                $errorsElement = new APIError();
                $this->errors[] = $errorsElement->fromObject($errorsElementObject);
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
