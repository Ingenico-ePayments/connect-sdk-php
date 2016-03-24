<?php
namespace GCS\Payout\Definitions;

use GCS\Fei\Definitions\AbstractOrderStatus;
use GCS\Fei\Definitions\OrderStatusOutput;
use GCS\Payment\Definitions\OrderOutput;

/**
 * Class PayoutResult
 *
 * @package GCS\Payout\Definitions
 */
class PayoutResult extends AbstractOrderStatus
{
    /**
     * @var OrderOutput
     */
    public $payoutOutput = null;

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
        if (property_exists($object, 'payoutOutput')) {
            if (!is_object($object->payoutOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->payoutOutput, true) . '\' is not an object'
                );
            }
            $value = new OrderOutput();
            $this->payoutOutput = $value->fromObject($object->payoutOutput);
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
