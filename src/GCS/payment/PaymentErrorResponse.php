<?php
/**
 * class PaymentErrorResponse
 */
class GCS_payment_PaymentErrorResponse extends GCS_DataObject
{
    /**
     * @var string
     */
    public $errorId = null;

    /**
     * @var GCS_errors_definitions_APIError[]
     */
    public $errors = null;

    /**
     * @var GCS_payment_definitions_CreatePaymentResult
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
                $errorsElement = new GCS_errors_definitions_APIError();
                $this->errors[] = $errorsElement->fromObject($errorsElementObject);
            }
        }
        if (property_exists($object, 'paymentResult')) {
            if (!is_object($object->paymentResult)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentResult, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CreatePaymentResult();
            $this->paymentResult = $value->fromObject($object->paymentResult);
        }
        return $this;
    }
}
