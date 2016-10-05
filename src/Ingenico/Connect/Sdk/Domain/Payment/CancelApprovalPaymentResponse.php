<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Payment;
use UnexpectedValueException;

/**
 * Class CancelApprovalPaymentResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CancelApprovalPaymentResponse CancelApprovalPaymentResponse
 */
class CancelApprovalPaymentResponse extends DataObject
{
    /**
     * @var Payment
     */
    public $payment = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'payment')) {
            if (!is_object($object->payment)) {
                throw new UnexpectedValueException('value \'' . print_r($object->payment, true) . '\' is not an object');
            }
            $value = new Payment();
            $this->payment = $value->fromObject($object->payment);
        }
        return $this;
    }
}
