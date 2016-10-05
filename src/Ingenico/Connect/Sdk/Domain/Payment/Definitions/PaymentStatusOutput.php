<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\OrderStatusOutput;
use UnexpectedValueException;

/**
 * Class PaymentStatusOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentStatusOutput PaymentStatusOutput
 */
class PaymentStatusOutput extends OrderStatusOutput
{
    /**
     * @var bool
     */
    public $isAuthorized = null;

    /**
     * @var bool
     */
    public $isRefundable = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'isAuthorized')) {
            $this->isAuthorized = $object->isAuthorized;
        }
        if (property_exists($object, 'isRefundable')) {
            $this->isRefundable = $object->isRefundable;
        }
        return $this;
    }
}
