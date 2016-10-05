<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Errors\Definitions\APIError;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult;
use UnexpectedValueException;

/**
 * Class PaymentErrorResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentErrorResponse PaymentErrorResponse
 */
class PaymentErrorResponse extends DataObject
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
     * @var CreatePaymentResult
     */
    public $paymentResult = null;

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
        if (property_exists($object, 'paymentResult')) {
            if (!is_object($object->paymentResult)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentResult, true) . '\' is not an object');
            }
            $value = new CreatePaymentResult();
            $this->paymentResult = $value->fromObject($object->paymentResult);
        }
        return $this;
    }
}
