<?php
namespace GCS\HostedCheckout;

use GCS\DataObject;

/**
 *
 * class GetHostedCheckoutResponse
 */
class GetHostedCheckoutResponse extends DataObject
{
    /**
     * @var Definitions\CreatedPaymentOutput
     */
    public $createdPaymentOutput = null;

    /**
     * @var string
     */
    public $status = null;

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
        if (property_exists($object, 'createdPaymentOutput')) {
            if (!is_object($object->createdPaymentOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->createdPaymentOutput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\CreatedPaymentOutput();
            $this->createdPaymentOutput = $value->fromObject($object->createdPaymentOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        return $this;
    }
}
