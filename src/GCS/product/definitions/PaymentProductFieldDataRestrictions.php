<?php
class GCS_product_definitions_PaymentProductFieldDataRestrictions extends GCS_DataObject
{
    /**
     * @var bool
     */
    public $isRequired = null;

    /**
     * @var GCS_product_definitions_PaymentProductFieldValidators
     */
    public $validators = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'isRequired')) {
            $this->isRequired = $object->isRequired;
        }
        if (property_exists($object, 'validators')) {
            if (!is_object($object->validators)) {
                throw new UnexpectedValueException('value \'' . print_r($object->validators, true) . '\' is not an object');
            }
            $value = new GCS_product_definitions_PaymentProductFieldValidators();
            $this->validators = $value->fromObject($object->validators);
        }
        return $this;
    }
}
