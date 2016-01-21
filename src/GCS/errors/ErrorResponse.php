<?php
/**
 * class ErrorResponse
 */
class GCS_errors_ErrorResponse extends GCS_DataObject
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
        return $this;
    }
}
