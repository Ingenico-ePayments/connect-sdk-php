<?php
class GCS_fei_definitions_OrderStatusOutput extends GCS_DataObject
{
    /**
     * @var GCS_errors_definitions_APIError[]
     */
    public $errors = null;

    /**
     * @var bool
     */
    public $isCancellable = null;

    /**
     * @var int
     */
    public $statusCode = null;

    /**
     * @var string
     */
    public $statusCodeChangeDateTime = null;

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
            foreach ($object->errors as $errorsElementObject) {
                $errorsElement = new GCS_errors_definitions_APIError();
                $this->errors[] = $errorsElement->fromObject($errorsElementObject);
            }
        }
        if (property_exists($object, 'isCancellable')) {
            $this->isCancellable = $object->isCancellable;
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
