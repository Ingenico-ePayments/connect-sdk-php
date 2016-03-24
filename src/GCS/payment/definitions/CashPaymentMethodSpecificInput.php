<?php
namespace GCS\payment\definitions;

/**
 * Class CashPaymentMethodSpecificInput
 *
 * @package GCS\payment\definitions
 */
class CashPaymentMethodSpecificInput extends CashPaymentMethodSpecificInputBase
{
    /**
     * @var CashPaymentProduct1503SpecificInput
     */
    public $paymentProduct1503SpecificInput = null;

    /**
     * @var CashPaymentProduct1504SpecificInput
     */
    public $paymentProduct1504SpecificInput = null;

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
        if (property_exists($object, 'paymentProduct1503SpecificInput')) {
            if (!is_object($object->paymentProduct1503SpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct1503SpecificInput, true) . '\' is not an object'
                );
            }
            $value = new CashPaymentProduct1503SpecificInput();
            $this->paymentProduct1503SpecificInput = $value->fromObject($object->paymentProduct1503SpecificInput);
        }
        if (property_exists($object, 'paymentProduct1504SpecificInput')) {
            if (!is_object($object->paymentProduct1504SpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->paymentProduct1504SpecificInput, true) . '\' is not an object'
                );
            }
            $value = new CashPaymentProduct1504SpecificInput();
            $this->paymentProduct1504SpecificInput = $value->fromObject($object->paymentProduct1504SpecificInput);
        }
        return $this;
    }
}
