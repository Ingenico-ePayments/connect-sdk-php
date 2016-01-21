<?php
/**
 * class TokenizePaymentRequest
 */
class GCS_payment_TokenizePaymentRequest extends GCS_DataObject
{
    /**
     * @var string
     */
    public $alias = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'alias')) {
            $this->alias = $object->alias;
        }
        return $this;
    }
}
