<?php
class GCS_payment_definitions_InvoicePaymentMethodSpecificInput extends GCS_fei_definitions_AbstractPaymentMethodSpecificInput
{
    /**
     * @var string
     */
    public $additionalReference = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalReference')) {
            $this->additionalReference = $object->additionalReference;
        }
        return $this;
    }
}
