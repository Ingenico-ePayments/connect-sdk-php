<?php
class GCS_payment_definitions_Payment extends GCS_fei_definitions_AbstractOrderStatus
{
    /**
     * @var GCS_payment_definitions_PaymentOutput
     */
    public $paymentOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @var GCS_payment_definitions_PaymentStatusOutput
     */
    public $statusOutput = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'paymentOutput')) {
            if (!is_object($object->paymentOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PaymentOutput();
            $this->paymentOutput = $value->fromObject($object->paymentOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        if (property_exists($object, 'statusOutput')) {
            if (!is_object($object->statusOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->statusOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PaymentStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
