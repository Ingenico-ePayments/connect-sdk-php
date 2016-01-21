<?php
class GCS_payment_definitions_CancelPaymentCardPaymentMethodSpecificOutput extends GCS_DataObject
{
    /**
     * @var string
     */
    public $voidResponseId = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'voidResponseId')) {
            $this->voidResponseId = $object->voidResponseId;
        }
        return $this;
    }
}
