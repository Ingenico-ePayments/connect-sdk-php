<?php
namespace GCS\payment\definitions;

/**
 * Class PaymentOutput
 *
 * @package GCS\payment\definitions
 */
class PaymentOutput extends OrderOutput
{
    /**
     * @var int
     */
    public $amountPaid = null;

    /**
     * @var BankTransferPaymentMethodSpecificOutput
     */
    public $bankTransferPaymentMethodSpecificOutput = null;

    /**
     * @var CardPaymentMethodSpecificOutput
     */
    public $cardPaymentMethodSpecificOutput = null;

    /**
     * @var CashPaymentMethodSpecificOutput
     */
    public $cashPaymentMethodSpecificOutput = null;

    /**
     * @var CheckPaymentMethodSpecificOutput
     */
    public $checkPaymentMethodSpecificOutput = null;

    /**
     * @var NonSepaDirectDebitPaymentMethodSpecificOutput
     */
    public $directDebitPaymentMethodSpecificOutput = null;

    /**
     * @var InvoicePaymentMethodSpecificOutput
     */
    public $invoicePaymentMethodSpecificOutput = null;

    /**
     * @var string
     */
    public $paymentMethod = null;

    /**
     * @var RedirectPaymentMethodSpecificOutput
     */
    public $redirectPaymentMethodSpecificOutput = null;

    /**
     * @var SepaDirectDebitPaymentMethodSpecificOutput
     */
    public $sepaDirectDebitPaymentMethodSpecificOutput = null;

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
        if (property_exists($object, 'amountPaid')) {
            $this->amountPaid = $object->amountPaid;
        }
        if (property_exists($object, 'bankTransferPaymentMethodSpecificOutput')) {
            if (!is_object($object->bankTransferPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->bankTransferPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new BankTransferPaymentMethodSpecificOutput();
            $this->bankTransferPaymentMethodSpecificOutput = $value->fromObject(
                $object->bankTransferPaymentMethodSpecificOutput
            );
        }
        if (property_exists($object, 'cardPaymentMethodSpecificOutput')) {
            if (!is_object($object->cardPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->cardPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new CardPaymentMethodSpecificOutput();
            $this->cardPaymentMethodSpecificOutput = $value->fromObject($object->cardPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificOutput')) {
            if (!is_object($object->cashPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->cashPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new CashPaymentMethodSpecificOutput();
            $this->cashPaymentMethodSpecificOutput = $value->fromObject($object->cashPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'checkPaymentMethodSpecificOutput')) {
            if (!is_object($object->checkPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->checkPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new CheckPaymentMethodSpecificOutput();
            $this->checkPaymentMethodSpecificOutput = $value->fromObject($object->checkPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificOutput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->directDebitPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new NonSepaDirectDebitPaymentMethodSpecificOutput();
            $this->directDebitPaymentMethodSpecificOutput = $value->fromObject(
                $object->directDebitPaymentMethodSpecificOutput
            );
        }
        if (property_exists($object, 'invoicePaymentMethodSpecificOutput')) {
            if (!is_object($object->invoicePaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->invoicePaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new InvoicePaymentMethodSpecificOutput();
            $this->invoicePaymentMethodSpecificOutput = $value->fromObject($object->invoicePaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'paymentMethod')) {
            $this->paymentMethod = $object->paymentMethod;
        }
        if (property_exists($object, 'redirectPaymentMethodSpecificOutput')) {
            if (!is_object($object->redirectPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->redirectPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new RedirectPaymentMethodSpecificOutput();
            $this->redirectPaymentMethodSpecificOutput = $value->fromObject(
                $object->redirectPaymentMethodSpecificOutput
            );
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificOutput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificOutput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificOutput, true) . '\' is not an object'
                );
            }
            $value = new SepaDirectDebitPaymentMethodSpecificOutput();
            $this->sepaDirectDebitPaymentMethodSpecificOutput = $value->fromObject(
                $object->sepaDirectDebitPaymentMethodSpecificOutput
            );
        }
        return $this;
    }
}
