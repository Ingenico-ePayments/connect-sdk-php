<?php
namespace GCS\Payment;

use GCS\DataObject;
use GCS\Fei\Definitions\FraudFields;

/**
 * Class CreatePaymentRequest
 *
 * @package GCS\Payment
 */
class CreatePaymentRequest extends DataObject
{
    /**
     * @var Definitions\BankTransferPaymentMethodSpecificInput
     */
    public $bankTransferPaymentMethodSpecificInput = null;

    /**
     * @var Definitions\CardPaymentMethodSpecificInput
     */
    public $cardPaymentMethodSpecificInput = null;

    /**
     * @var Definitions\CashPaymentMethodSpecificInput
     */
    public $cashPaymentMethodSpecificInput = null;

    /**
     * @var Definitions\CheckPaymentMethodSpecificInput
     */
    public $checkPaymentMethodSpecificInput = null;

    /**
     * @var Definitions\NonSepaDirectDebitPaymentMethodSpecificInput
     */
    public $directDebitPaymentMethodSpecificInput = null;

    /**
     * @var string
     */
    public $encryptedCustomerInput = null;

    /**
     * @var FraudFields
     */
    public $fraudFields = null;

    /**
     * @var Definitions\InvoicePaymentMethodSpecificInput
     */
    public $invoicePaymentMethodSpecificInput = null;

    /**
     * @var Definitions\Order
     */
    public $order = null;

    /**
     * @var Definitions\RedirectPaymentMethodSpecificInput
     */
    public $redirectPaymentMethodSpecificInput = null;

    /**
     * @var Definitions\SepaDirectDebitPaymentMethodSpecificInput
     */
    public $sepaDirectDebitPaymentMethodSpecificInput = null;

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
        if (property_exists($object, 'bankTransferPaymentMethodSpecificInput')) {
            if (!is_object($object->bankTransferPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankTransferPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\BankTransferPaymentMethodSpecificInput();
            $this->bankTransferPaymentMethodSpecificInput = $value->fromObject(
                $object->bankTransferPaymentMethodSpecificInput
            );
        }
        if (property_exists($object, 'cardPaymentMethodSpecificInput')) {
            if (!is_object($object->cardPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->cardPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\CardPaymentMethodSpecificInput();
            $this->cardPaymentMethodSpecificInput = $value->fromObject($object->cardPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificInput')) {
            if (!is_object($object->cashPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->cashPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\CashPaymentMethodSpecificInput();
            $this->cashPaymentMethodSpecificInput = $value->fromObject($object->cashPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'checkPaymentMethodSpecificInput')) {
            if (!is_object($object->checkPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->checkPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\CheckPaymentMethodSpecificInput();
            $this->checkPaymentMethodSpecificInput = $value->fromObject($object->checkPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->directDebitPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\NonSepaDirectDebitPaymentMethodSpecificInput();
            $this->directDebitPaymentMethodSpecificInput = $value->fromObject(
                $object->directDebitPaymentMethodSpecificInput
            );
        }
        if (property_exists($object, 'encryptedCustomerInput')) {
            $this->encryptedCustomerInput = $object->encryptedCustomerInput;
        }
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->fraudFields, true) . '\' is not an object'
                );
            }
            $value = new FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'invoicePaymentMethodSpecificInput')) {
            if (!is_object($object->invoicePaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->invoicePaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\InvoicePaymentMethodSpecificInput();
            $this->invoicePaymentMethodSpecificInput = $value->fromObject($object->invoicePaymentMethodSpecificInput);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->order, true) . '\' is not an object'
                );
            }
            $value = new Definitions\Order();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'redirectPaymentMethodSpecificInput')) {
            if (!is_object($object->redirectPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->redirectPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\RedirectPaymentMethodSpecificInput();
            $this->redirectPaymentMethodSpecificInput = $value->fromObject($object->redirectPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new Definitions\SepaDirectDebitPaymentMethodSpecificInput();
            $this->sepaDirectDebitPaymentMethodSpecificInput = $value->fromObject(
                $object->sepaDirectDebitPaymentMethodSpecificInput
            );
        }
        return $this;
    }
}
