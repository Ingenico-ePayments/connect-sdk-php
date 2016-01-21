<?php
class GCS_payout_definitions_PayoutResult extends GCS_fei_definitions_AbstractOrderStatus
{
    /**
     * @var GCS_payment_definitions_OrderOutput
     */
    public $payoutOutput = null;

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
        if (property_exists($object, 'payoutOutput')) {
            if (!is_object($object->payoutOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payoutOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_OrderOutput();
            $this->payoutOutput = $value->fromObject($object->payoutOutput);
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
