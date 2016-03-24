<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\AbstractOrderStatus;

/**
 * Class Payment
 *
 * @package GCS\payment\definitions
 */
class Payment extends AbstractOrderStatus
{
    /**
     * @var PaymentOutput
     */
    public $paymentOutput = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @var PaymentStatusOutput
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
        if (property_exists($object, 'paymentOutput')) {
            if (!is_object($object->paymentOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentOutput, true) . '\' is not an object'
                );
            }
            $value = new PaymentOutput();
            $this->paymentOutput = $value->fromObject($object->paymentOutput);
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
            $value = new PaymentStatusOutput();
            $this->statusOutput = $value->fromObject($object->statusOutput);
        }
        return $this;
    }
}
