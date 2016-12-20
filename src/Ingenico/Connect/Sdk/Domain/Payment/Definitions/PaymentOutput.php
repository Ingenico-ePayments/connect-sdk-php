<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Payment\Definitions\BankTransferPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CardPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CashPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\InvoicePaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\MobilePaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\NonSepaDirectDebitPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectPaymentMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\SepaDirectDebitPaymentMethodSpecificOutput;
use UnexpectedValueException;

/**
 * Class PaymentOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentOutput PaymentOutput
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
     * @var NonSepaDirectDebitPaymentMethodSpecificOutput
     */
    public $directDebitPaymentMethodSpecificOutput = null;

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
     * @var SepaDirectDebitPaymentMethodSpecificOutput
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
