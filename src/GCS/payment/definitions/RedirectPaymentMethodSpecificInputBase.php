<?php
class GCS_payment_definitions_RedirectPaymentMethodSpecificInputBase extends GCS_fei_definitions_AbstractPaymentMethodSpecificInput
{
    /**
     * @var string
     */
    public $recurringPaymentSequenceIndicator = null;

    /**
     * @var string
     */
    public $token = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'recurringPaymentSequenceIndicator')) {
            $this->recurringPaymentSequenceIndicator = $object->recurringPaymentSequenceIndicator;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
