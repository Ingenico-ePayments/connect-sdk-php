<?php
namespace GCS\payment\definitions;

use GCS\fei\definitions\OrderStatusOutput;

/**
 * Class PaymentStatusOutput
 *
 * @package GCS\payment\definitions
 */
class PaymentStatusOutput extends OrderStatusOutput
{
    /**
     * @var bool
     */
    public $isAuthorized = null;

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
        if (property_exists($object, 'isAuthorized')) {
            $this->isAuthorized = $object->isAuthorized;
        }
        return $this;
    }
}
