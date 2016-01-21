<?php
class GCS_payment_definitions_CreatePaymentResult extends GCS_DataObject
{
    /**
     * @var GCS_payment_definitions_PaymentCreationOutput
     */
    public $creationOutput = null;

    /**
     * @var GCS_payment_definitions_MerchantAction
     */
    public $merchantAction = null;

    /**
     * @var GCS_payment_definitions_Payment
     */
    public $payment = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'creationOutput')) {
            if (!is_object($object->creationOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->creationOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PaymentCreationOutput();
            $this->creationOutput = $value->fromObject($object->creationOutput);
        }
        if (property_exists($object, 'merchantAction')) {
            if (!is_object($object->merchantAction)) {
                throw new UnexpectedValueException('value \'' . print_r($object->merchantAction, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_MerchantAction();
            $this->merchantAction = $value->fromObject($object->merchantAction);
        }
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        return $this;
    }
}
