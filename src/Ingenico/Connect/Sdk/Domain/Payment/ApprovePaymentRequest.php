<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderApprovePayment;
use UnexpectedValueException;

/**
 * Class ApprovePaymentRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ApprovePaymentRequest ApprovePaymentRequest
 */
class ApprovePaymentRequest extends DataObject
{
    /**
     * @var int
     */
    public $amount = null;

    /**
     * @var ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput
     */
    public $directDebitPaymentMethodSpecificInput = null;

    /**
     * @var OrderApprovePayment
     */
    public $order = null;

    /**
     * @var ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput
     */
    public $sepaDirectDebitPaymentMethodSpecificInput = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->directDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput();
            $this->directDebitPaymentMethodSpecificInput = $value->fromObject($object->directDebitPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new OrderApprovePayment();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput();
            $this->sepaDirectDebitPaymentMethodSpecificInput = $value->fromObject($object->sepaDirectDebitPaymentMethodSpecificInput);
        }
        return $this;
    }
}
