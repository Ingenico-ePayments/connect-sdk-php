<?php
/**
 * class PayoutErrorResponse
 */
class GCS_payout_PayoutErrorResponse extends GCS_DataObject
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
     * @var GCS_payout_definitions_PayoutResult
     */
    public $payoutResult = null;

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
        if (property_exists($object, 'payoutResult')) {
            if (!is_object($object->payoutResult)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payoutResult, true) . '\' is not an object');
            }
            $value = new GCS_payout_definitions_PayoutResult();
            $this->payoutResult = $value->fromObject($object->payoutResult);
        }
        return $this;
    }
}
