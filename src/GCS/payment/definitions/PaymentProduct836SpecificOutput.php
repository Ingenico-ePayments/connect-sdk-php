<?php
class GCS_payment_definitions_PaymentProduct836SpecificOutput extends GCS_DataObject
{
    /**
     * @var string
     */
    public $securityIndicator = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'securityIndicator')) {
            $this->securityIndicator = $object->securityIndicator;
        }
        return $this;
    }
}
