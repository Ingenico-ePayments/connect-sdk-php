<?php
namespace GCS\Payment\Definitions;

use GCS\Fei\Definitions\AbstractPaymentMethodSpecificInput;

/**
 * Class NonSepaDirectDebitPaymentMethodSpecificInput
 *
 * @package GCS\Payment\Definitions
 */
class NonSepaDirectDebitPaymentMethodSpecificInput extends AbstractPaymentMethodSpecificInput
{
    /**
     * @var string
     */
    public $dateCollect = null;

    /**
     * @var string
     */
    public $directDebitText = null;

    /**
     * @var bool
     */
    public $isRecurring = null;

    /**
     * @var NonSepaDirectDebitPaymentProduct705SpecificInput
     */
    public $paymentProduct705SpecificInput = null;

    /**
     * @var NonSepaDirectDebitPaymentProduct707SpecificInput
     */
    public $paymentProduct707SpecificInput = null;

    /**
     * @var string
     */
    public $recurringPaymentSequenceIndicator = null;

    /**
     * @var string
     */
    public $token = null;

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
        if (property_exists($object, 'dateCollect')) {
            $this->dateCollect = $object->dateCollect;
        }
        if (property_exists($object, 'directDebitText')) {
            $this->directDebitText = $object->directDebitText;
        }
        if (property_exists($object, 'isRecurring')) {
            $this->isRecurring = $object->isRecurring;
        }
        if (property_exists($object, 'paymentProduct705SpecificInput')) {
            if (!is_object($object->paymentProduct705SpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct705SpecificInput, true) . '\' is not an object'
                );
            }
            $value = new NonSepaDirectDebitPaymentProduct705SpecificInput();
            $this->paymentProduct705SpecificInput = $value->fromObject($object->paymentProduct705SpecificInput);
        }
        if (property_exists($object, 'paymentProduct707SpecificInput')) {
            if (!is_object($object->paymentProduct707SpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct707SpecificInput, true) . '\' is not an object'
                );
            }
            $value = new NonSepaDirectDebitPaymentProduct707SpecificInput();
            $this->paymentProduct707SpecificInput = $value->fromObject($object->paymentProduct707SpecificInput);
        }
        if (property_exists($object, 'recurringPaymentSequenceIndicator')) {
            $this->recurringPaymentSequenceIndicator = $object->recurringPaymentSequenceIndicator;
        }
        if (property_exists($object, 'token')) {
            $this->token = $object->token;
        }
        return $this;
    }
}
