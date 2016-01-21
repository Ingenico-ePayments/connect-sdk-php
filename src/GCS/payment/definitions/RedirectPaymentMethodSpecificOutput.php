<?php
class GCS_payment_definitions_RedirectPaymentMethodSpecificOutput extends GCS_payment_definitions_AbstractPaymentMethodSpecificOutput
{
    /**
     * @var GCS_fei_definitions_BankAccountIban
     */
    public $bankAccountIban = null;

    /**
     * @var GCS_payment_definitions_PaymentProduct836SpecificOutput
     */
    public $paymentProduct836SpecificOutput = null;

    /**
     * @var GCS_payment_definitions_PaymentProduct840SpecificOutput
     */
    public $paymentProduct840SpecificOutput = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'bankAccountIban')) {
            if (!is_object($object->bankAccountIban)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankAccountIban, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_BankAccountIban();
            $this->bankAccountIban = $value->fromObject($object->bankAccountIban);
        }
        if (property_exists($object, 'paymentProduct836SpecificOutput')) {
            if (!is_object($object->paymentProduct836SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct836SpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PaymentProduct836SpecificOutput();
            $this->paymentProduct836SpecificOutput = $value->fromObject($object->paymentProduct836SpecificOutput);
        }
        if (property_exists($object, 'paymentProduct840SpecificOutput')) {
            if (!is_object($object->paymentProduct840SpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct840SpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_PaymentProduct840SpecificOutput();
            $this->paymentProduct840SpecificOutput = $value->fromObject($object->paymentProduct840SpecificOutput);
        }
        return $this;
    }
}
