<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\AbstractOrderStatus;
use Ingenico\Connect\Sdk\Domain\Definitions\OrderStatusOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RefundOutput;
use UnexpectedValueException;

/**
 * Class RefundResult
 *
 * @package Ingenico\Connect\Sdk\Domain\Refund\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RefundResult RefundResult
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
            $value = new RefundOutput();
            $this->refundOutput = $value->fromObject($object->refundOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        if (property_exists($object, 'statusOutput')) {
            if (!is_object($object->statusOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->statusOutput, true) . '\' is not an object');
            }
            $value = new OrderStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
