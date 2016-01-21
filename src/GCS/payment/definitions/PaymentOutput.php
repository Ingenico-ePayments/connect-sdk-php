<?php
class GCS_payment_definitions_PaymentOutput extends GCS_payment_definitions_OrderOutput
{
    /**
     * @var int
     */
    public $amountPaid = null;

    /**
     * @var GCS_payment_definitions_BankTransferPaymentMethodSpecificOutput
     */
    public $bankTransferPaymentMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_CardPaymentMethodSpecificOutput
     */
    public $cardPaymentMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_CashPaymentMethodSpecificOutput
     */
    public $cashPaymentMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_CheckPaymentMethodSpecificOutput
     */
    public $checkPaymentMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_NonSepaDirectDebitPaymentMethodSpecificOutput
     */
    public $directDebitPaymentMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_InvoicePaymentMethodSpecificOutput
     */
    public $invoicePaymentMethodSpecificOutput = null;

    /**
     * @var string
     */
    public $paymentMethod = null;

    /**
     * @var GCS_payment_definitions_RedirectPaymentMethodSpecificOutput
     */
    public $redirectPaymentMethodSpecificOutput = null;

    /**
     * @var GCS_payment_definitions_SepaDirectDebitPaymentMethodSpecificOutput
     */
    public $sepaDirectDebitPaymentMethodSpecificOutput = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amountPaid')) {
            $this->amountPaid = $object->amountPaid;
        }
        if (property_exists($object, 'bankTransferPaymentMethodSpecificOutput')) {
            if (!is_object($object->bankTransferPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankTransferPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_BankTransferPaymentMethodSpecificOutput();
            $this->bankTransferPaymentMethodSpecificOutput = $value->fromObject($object->bankTransferPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'cardPaymentMethodSpecificOutput')) {
            if (!is_object($object->cardPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CardPaymentMethodSpecificOutput();
            $this->cardPaymentMethodSpecificOutput = $value->fromObject($object->cardPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificOutput')) {
            if (!is_object($object->cashPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cashPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CashPaymentMethodSpecificOutput();
            $this->cashPaymentMethodSpecificOutput = $value->fromObject($object->cashPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'checkPaymentMethodSpecificOutput')) {
            if (!is_object($object->checkPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->checkPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CheckPaymentMethodSpecificOutput();
            $this->checkPaymentMethodSpecificOutput = $value->fromObject($object->checkPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificOutput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->directDebitPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_NonSepaDirectDebitPaymentMethodSpecificOutput();
            $this->directDebitPaymentMethodSpecificOutput = $value->fromObject($object->directDebitPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'invoicePaymentMethodSpecificOutput')) {
            if (!is_object($object->invoicePaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invoicePaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_InvoicePaymentMethodSpecificOutput();
            $this->invoicePaymentMethodSpecificOutput = $value->fromObject($object->invoicePaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'paymentMethod')) {
            $this->paymentMethod = $object->paymentMethod;
        }
        if (property_exists($object, 'redirectPaymentMethodSpecificOutput')) {
            if (!is_object($object->redirectPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_RedirectPaymentMethodSpecificOutput();
            $this->redirectPaymentMethodSpecificOutput = $value->fromObject($object->redirectPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificOutput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_SepaDirectDebitPaymentMethodSpecificOutput();
            $this->sepaDirectDebitPaymentMethodSpecificOutput = $value->fromObject($object->sepaDirectDebitPaymentMethodSpecificOutput);
        }
        return $this;
    }
}
