<?php
class GCS_refund_definitions_RefundResult extends GCS_fei_definitions_AbstractOrderStatus
{
    /**
     * @var GCS_payment_definitions_RefundOutput
     */
    public $refundOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @var GCS_fei_definitions_OrderStatusOutput
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
        if (property_exists($object, 'refundOutput')) {
            if (!is_object($object->refundOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->refundOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_RefundOutput();
            $this->refundOutput = $value->fromObject($object->refundOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        if (property_exists($object, 'statusOutput')) {
            if (!is_object($object->statusOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->statusOutput, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_OrderStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
