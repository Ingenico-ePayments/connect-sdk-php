<?php
class GCS_hostedcheckout_definitions_CreatedPaymentOutput extends GCS_DataObject
{
    /**
     * @var GCS_hostedcheckout_definitions_DisplayedData
     */
    public $displayedData = null;

    /**
     * @var GCS_payment_definitions_Payment
     */
    public $payment = null;

    /**
     * @var GCS_payment_definitions_PaymentCreationReferences
     */
    public $paymentCreationReferences = null;

    /**
     * @var string
     */
    public $paymentStatusCategory = null;

    /**
     * @var string
     */
    public $tokens = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'displayedData')) {
            if (!is_object($object->displayedData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->displayedData, true) . '\' is not an object');
            }
            $value = new GCS_hostedcheckout_definitions_DisplayedData();
            $this->displayedData = $value->fromObject($object->displayedData);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        if (property_exists($object, 'paymentCreationReferences')) {
            if (!is_object($object->paymentCreationReferences)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentCreationReferences, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PaymentCreationReferences();
            $this->paymentCreationReferences = $value->fromObject($object->paymentCreationReferences);
        }
        if (property_exists($object, 'paymentStatusCategory')) {
            $this->paymentStatusCategory = $object->paymentStatusCategory;
        }
        if (property_exists($object, 'tokens')) {
            $this->tokens = $object->tokens;
        }
        return $this;
    }
}
