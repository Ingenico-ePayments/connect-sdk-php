<?php
class GCS_product_definitions_PaymentProductField extends GCS_DataObject
{
    /**
     * @var GCS_product_definitions_PaymentProductFieldDataRestrictions
     */
    public $dataRestrictions = null;

    /**
     * @var GCS_product_definitions_PaymentProductFieldDisplayHints
     */
    public $displayHints = null;

    /**
     * @var string
     */
    public $id = null;

    /**
     * @var string
     */
    public $type = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'dataRestrictions')) {
            if (!is_object($object->dataRestrictions)) {
                throw new UnexpectedValueException('value \'' . print_r($object->dataRestrictions, true) . '\' is not an object');
            }
            $value = new GCS_product_definitions_PaymentProductFieldDataRestrictions();
            $this->dataRestrictions = $value->fromObject($object->dataRestrictions);
        }
        if (property_exists($object, 'displayHints')) {
            if (!is_object($object->displayHints)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayHints, true) . '\' is not an object');
            }
            $value = new GCS_product_definitions_PaymentProductFieldDisplayHints();
            $this->displayHints = $value->fromObject($object->displayHints);
        }
        if (property_exists($object, 'id')) {
            $this->id = $object->id;
        }
        if (property_exists($object, 'type')) {
            $this->type = $object->type;
        }
        return $this;
    }
}
