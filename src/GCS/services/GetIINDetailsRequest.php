<?php
/**
 * class GetIINDetailsRequest
 */
class GCS_services_GetIINDetailsRequest extends GCS_DataObject
{
    /**
     * @var string
     */
    public $bin = null;

    /**
     * @var GCS_services_definitions_PaymentContext
     */
    public $paymentContext = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bin')) {
            $this->bin = $object->bin;
        }
        if (property_exists($object, 'paymentContext')) {
            if (!is_object($object->paymentContext)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentContext, true) . '\' is not an object');
            }
            $value = new GCS_services_definitions_PaymentContext();
            $this->paymentContext = $value->fromObject($object->paymentContext);
        }
        return $this;
    }
}
