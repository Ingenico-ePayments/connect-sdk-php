<?php
/**
 * class CreatePaymentRequest
 */
class GCS_payment_CreatePaymentRequest extends GCS_DataObject
{
    /**
     * @var GCS_payment_definitions_BankTransferPaymentMethodSpecificInput
     */
    public $bankTransferPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_CardPaymentMethodSpecificInput
     */
    public $cardPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_CashPaymentMethodSpecificInput
     */
    public $cashPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_CheckPaymentMethodSpecificInput
     */
    public $checkPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_NonSepaDirectDebitPaymentMethodSpecificInput
     */
    public $directDebitPaymentMethodSpecificInput = null;

    /**
     * @var string
     */
    public $encryptedCustomerInput = null;

    /**
     * @var GCS_fei_definitions_FraudFields
     */
    public $fraudFields = null;

    /**
     * @var GCS_payment_definitions_InvoicePaymentMethodSpecificInput
     */
    public $invoicePaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_Order
     */
    public $order = null;

    /**
     * @var GCS_payment_definitions_RedirectPaymentMethodSpecificInput
     */
    public $redirectPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_SepaDirectDebitPaymentMethodSpecificInput
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
        if (property_exists($object, 'bankTransferPaymentMethodSpecificInput')) {
            if (!is_object($object->bankTransferPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankTransferPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_BankTransferPaymentMethodSpecificInput();
            $this->bankTransferPaymentMethodSpecificInput = $value->fromObject($object->bankTransferPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cardPaymentMethodSpecificInput')) {
            if (!is_object($object->cardPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CardPaymentMethodSpecificInput();
            $this->cardPaymentMethodSpecificInput = $value->fromObject($object->cardPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificInput')) {
            if (!is_object($object->cashPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cashPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CashPaymentMethodSpecificInput();
            $this->cashPaymentMethodSpecificInput = $value->fromObject($object->cashPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'checkPaymentMethodSpecificInput')) {
            if (!is_object($object->checkPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->checkPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CheckPaymentMethodSpecificInput();
            $this->checkPaymentMethodSpecificInput = $value->fromObject($object->checkPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->directDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_NonSepaDirectDebitPaymentMethodSpecificInput();
            $this->directDebitPaymentMethodSpecificInput = $value->fromObject($object->directDebitPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'encryptedCustomerInput')) {
            $this->encryptedCustomerInput = $object->encryptedCustomerInput;
        }
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudFields, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'invoicePaymentMethodSpecificInput')) {
            if (!is_object($object->invoicePaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invoicePaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_InvoicePaymentMethodSpecificInput();
            $this->invoicePaymentMethodSpecificInput = $value->fromObject($object->invoicePaymentMethodSpecificInput);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_Order();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'redirectPaymentMethodSpecificInput')) {
            if (!is_object($object->redirectPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_RedirectPaymentMethodSpecificInput();
            $this->redirectPaymentMethodSpecificInput = $value->fromObject($object->redirectPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_SepaDirectDebitPaymentMethodSpecificInput();
            $this->sepaDirectDebitPaymentMethodSpecificInput = $value->fromObject($object->sepaDirectDebitPaymentMethodSpecificInput);
        }
        return $this;
    }
}
