<?php
/**
 * class CancelApprovalPaymentResponse
 */
class GCS_payment_CancelApprovalPaymentResponse extends GCS_DataObject
{
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
