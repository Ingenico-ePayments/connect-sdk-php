<?php
class GCS_payment_definitions_OrderApprovePayment extends GCS_DataObject
{
    /**
     * @var GCS_fei_definitions_AdditionalOrderInputAirlineData
     */
    public $additionalInput = null;

    /**
     * @var GCS_payment_definitions_OrderReferencesApprovePayment
     */
    public $references = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalInput')) {
            if (!is_object($object->additionalInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->additionalInput, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_AdditionalOrderInputAirlineData();
            $this->additionalInput = $value->fromObject($object->additionalInput);
        }
        if (property_exists($object, 'references')) {
            if (!is_object($object->references)) {
                throw new UnexpectedValueException('value \'' . print_r($object->references, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_OrderReferencesApprovePayment();
            $this->references = $value->fromObject($object->references);
        }
        return $this;
    }
}
