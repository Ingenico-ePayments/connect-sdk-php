<?php
class GCS_payment_definitions_RedirectPaymentProduct882SpecificInput extends GCS_DataObject
{
    /**
     * @var string
     */
    public $issuerId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'issuerId')) {
            $this->issuerId = $object->issuerId;
        }
        return $this;
    }
}
