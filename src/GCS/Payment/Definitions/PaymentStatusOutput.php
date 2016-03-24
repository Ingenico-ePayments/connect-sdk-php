<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\OrderStatusOutput;

/**
 * Class PaymentStatusOutput
 *
 * @package GCS\Payment\Definitions
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
