<?php
namespace GCS\payment;

use GCS\DataObject;
use GCS\errors\definitions\APIError;

/**
 * Class PaymentErrorResponse
 *
 * @package GCS\payment
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
     * @var definitions\CreatePaymentResult
     */
    public $paymentResult = null;

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
        if (property_exists($object, 'errorId')) {
            $this->errorId = $object->errorId;
        }
        if (property_exists($object, 'errors')) {
            if (!is_array($object->errors) && !is_object($object->errors)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->errors, true) . '\' is not an array or object'
                );
            }
            $this->errors = [];
            foreach ($object->errors as $errorsElementObject) {
                $errorsElement = new APIError();
                $this->errors[] = $errorsElement->fromObject($errorsElementObject);
            }
        }
        if (property_exists($object, 'paymentResult')) {
            if (!is_object($object->paymentResult)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentResult, true) . '\' is not an object'
                );
            }
            $value = new definitions\CreatePaymentResult();
            $this->paymentResult = $value->fromObject($object->paymentResult);
        }
        return $this;
    }
}
