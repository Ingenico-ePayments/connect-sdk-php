<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class PaymentOutput extends OrderOutput
{
    /**
     * @var int
     */
    public $amountPaid = null;

    /**
     * @var int
     */
    public $amountReversed = null;

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
     * @var NonSepaDirectDebitPaymentMethodSpecificOutput
     */
    public $directDebitPaymentMethodSpecificOutput = null;

    /**
     * @var EInvoicePaymentMethodSpecificOutput
     */
    public $eInvoicePaymentMethodSpecificOutput = null;

    /**
     * @var InvoicePaymentMethodSpecificOutput
     */
    public $invoicePaymentMethodSpecificOutput = null;

    /**
     * @var MobilePaymentMethodSpecificOutput
     */
    public $mobilePaymentMethodSpecificOutput = null;

    /**
     * @var string
     */
    public $paymentMethod = null;

    /**
     * @var RedirectPaymentMethodSpecificOutput
     */
    public $redirectPaymentMethodSpecificOutput = null;

    /**
     * @var string
     */
    public $reversalReason = null;

    /**
     * @var SepaDirectDebitPaymentMethodSpecificOutput
     */
    public $sepaDirectDebitPaymentMethodSpecificOutput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amountPaid)) {
            $object->amountPaid = $this->amountPaid;
        }
        if (!is_null($this->amountReversed)) {
            $object->amountReversed = $this->amountReversed;
        }
        if (!is_null($this->bankTransferPaymentMethodSpecificOutput)) {
            $object->bankTransferPaymentMethodSpecificOutput = $this->bankTransferPaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->cardPaymentMethodSpecificOutput)) {
            $object->cardPaymentMethodSpecificOutput = $this->cardPaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->cashPaymentMethodSpecificOutput)) {
            $object->cashPaymentMethodSpecificOutput = $this->cashPaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->directDebitPaymentMethodSpecificOutput)) {
            $object->directDebitPaymentMethodSpecificOutput = $this->directDebitPaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->eInvoicePaymentMethodSpecificOutput)) {
            $object->eInvoicePaymentMethodSpecificOutput = $this->eInvoicePaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->invoicePaymentMethodSpecificOutput)) {
            $object->invoicePaymentMethodSpecificOutput = $this->invoicePaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->mobilePaymentMethodSpecificOutput)) {
            $object->mobilePaymentMethodSpecificOutput = $this->mobilePaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->paymentMethod)) {
            $object->paymentMethod = $this->paymentMethod;
        }
        if (!is_null($this->redirectPaymentMethodSpecificOutput)) {
            $object->redirectPaymentMethodSpecificOutput = $this->redirectPaymentMethodSpecificOutput->toObject();
        }
        if (!is_null($this->reversalReason)) {
            $object->reversalReason = $this->reversalReason;
        }
        if (!is_null($this->sepaDirectDebitPaymentMethodSpecificOutput)) {
            $object->sepaDirectDebitPaymentMethodSpecificOutput = $this->sepaDirectDebitPaymentMethodSpecificOutput->toObject();
        }
        return $object;
    }

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
        if (property_exists($object, 'amountReversed')) {
            $this->amountReversed = $object->amountReversed;
        }
        if (property_exists($object, 'bankTransferPaymentMethodSpecificOutput')) {
            if (!is_object($object->bankTransferPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankTransferPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new BankTransferPaymentMethodSpecificOutput();
            $this->bankTransferPaymentMethodSpecificOutput = $value->fromObject($object->bankTransferPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'cardPaymentMethodSpecificOutput')) {
            if (!is_object($object->cardPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new CardPaymentMethodSpecificOutput();
            $this->cardPaymentMethodSpecificOutput = $value->fromObject($object->cardPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificOutput')) {
            if (!is_object($object->cashPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cashPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new CashPaymentMethodSpecificOutput();
            $this->cashPaymentMethodSpecificOutput = $value->fromObject($object->cashPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificOutput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->directDebitPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new NonSepaDirectDebitPaymentMethodSpecificOutput();
            $this->directDebitPaymentMethodSpecificOutput = $value->fromObject($object->directDebitPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'eInvoicePaymentMethodSpecificOutput')) {
            if (!is_object($object->eInvoicePaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->eInvoicePaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new EInvoicePaymentMethodSpecificOutput();
            $this->eInvoicePaymentMethodSpecificOutput = $value->fromObject($object->eInvoicePaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'invoicePaymentMethodSpecificOutput')) {
            if (!is_object($object->invoicePaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invoicePaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new InvoicePaymentMethodSpecificOutput();
            $this->invoicePaymentMethodSpecificOutput = $value->fromObject($object->invoicePaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'mobilePaymentMethodSpecificOutput')) {
            if (!is_object($object->mobilePaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mobilePaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new MobilePaymentMethodSpecificOutput();
            $this->mobilePaymentMethodSpecificOutput = $value->fromObject($object->mobilePaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'paymentMethod')) {
            $this->paymentMethod = $object->paymentMethod;
        }
        if (property_exists($object, 'redirectPaymentMethodSpecificOutput')) {
            if (!is_object($object->redirectPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentMethodSpecificOutput();
            $this->redirectPaymentMethodSpecificOutput = $value->fromObject($object->redirectPaymentMethodSpecificOutput);
        }
        if (property_exists($object, 'reversalReason')) {
            $this->reversalReason = $object->reversalReason;
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificOutput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new SepaDirectDebitPaymentMethodSpecificOutput();
            $this->sepaDirectDebitPaymentMethodSpecificOutput = $value->fromObject($object->sepaDirectDebitPaymentMethodSpecificOutput);
        }
        return $this;
    }
}
