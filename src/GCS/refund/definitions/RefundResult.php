<?php
namespace GCS\refund\definitions;

use GCS\fei\definitions\AbstractOrderStatus;
use GCS\fei\definitions\OrderStatusOutput;
use GCS\payment\definitions\RefundOutput;

/**
 * Class RefundResult
 *
 * @package GCS\refund\definitions
 */
class RefundResult extends AbstractOrderStatus
{
    /**
     * @var RefundOutput
     */
    public $refundOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @var OrderStatusOutput
     */
    public $statusOutput = null;

    /**
     * @param object $object
     *
     * @return $this
     *
     * @throws \UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'refundOutput')) {
            if (!is_object($object->refundOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->refundOutput, true) . '\' is not an object'
                );
            }
            $value = new RefundOutput();
            $this->refundOutput = $value->fromObject($object->refundOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        if (property_exists($object, 'statusOutput')) {
            if (!is_object($object->statusOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->statusOutput, true) . '\' is not an object'
                );
            }
            $value = new OrderStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
