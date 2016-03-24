<?php
namespace GCS\hostedcheckout;

use GCS\DataObject;

/**
 *
 * class GetHostedCheckoutResponse
 */
class GetHostedCheckoutResponse extends DataObject
{
    /**
     * @var definitions\CreatedPaymentOutput
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
            $value = new definitions\CreatedPaymentOutput();
            $this->createdPaymentOutput = $value->fromObject($object->createdPaymentOutput);
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        return $this;
    }
}
