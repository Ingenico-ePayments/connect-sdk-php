<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\FraudFields;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\BankTransferPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CardPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CashPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\InvoicePaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\MobilePaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\NonSepaDirectDebitPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectPaymentMethodSpecificInput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\SepaDirectDebitPaymentMethodSpecificInput;
use UnexpectedValueException;

/**
 * Class CreatePaymentRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CreatePaymentRequest CreatePaymentRequest
 */
class CreatePaymentRequest extends DataObject
{
    /**
     * @var BankTransferPaymentMethodSpecificInput
     */
    public $bankTransferPaymentMethodSpecificInput = null;

    /**
     * @var CardPaymentMethodSpecificInput
     */
    public $cardPaymentMethodSpecificInput = null;

    /**
     * @var CashPaymentMethodSpecificInput
     */
    public $cashPaymentMethodSpecificInput = null;

    /**
     * @var NonSepaDirectDebitPaymentMethodSpecificInput
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
     * @var InvoicePaymentMethodSpecificInput
     */
    public $invoicePaymentMethodSpecificInput = null;

    /**
     * @var MobilePaymentMethodSpecificInput
     */
    public $mobilePaymentMethodSpecificInput = null;

    /**
     * @var Order
     */
    public $order = null;

    /**
     * @var RedirectPaymentMethodSpecificInput
     */
    public $redirectPaymentMethodSpecificInput = null;

    /**
     * @var SepaDirectDebitPaymentMethodSpecificInput
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
            $value = new BankTransferPaymentMethodSpecificInput();
            $this->bankTransferPaymentMethodSpecificInput = $value->fromObject($object->bankTransferPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cardPaymentMethodSpecificInput')) {
            if (!is_object($object->cardPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new CardPaymentMethodSpecificInput();
            $this->cardPaymentMethodSpecificInput = $value->fromObject($object->cardPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificInput')) {
            if (!is_object($object->cashPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cashPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentMethodSpecificInput();
            $this->cashPaymentMethodSpecificInput = $value->fromObject($object->cashPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'directDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->directDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->directDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new NonSepaDirectDebitPaymentMethodSpecificInput();
            $this->directDebitPaymentMethodSpecificInput = $value->fromObject($object->directDebitPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'encryptedCustomerInput')) {
            $this->encryptedCustomerInput = $object->encryptedCustomerInput;
        }
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudFields, true) . '\' is not an object');
            }
            $value = new FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'invoicePaymentMethodSpecificInput')) {
            if (!is_object($object->invoicePaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invoicePaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new InvoicePaymentMethodSpecificInput();
            $this->invoicePaymentMethodSpecificInput = $value->fromObject($object->invoicePaymentMethodSpecificInput);
        }
        if (property_exists($object, 'mobilePaymentMethodSpecificInput')) {
            if (!is_object($object->mobilePaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mobilePaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new MobilePaymentMethodSpecificInput();
            $this->mobilePaymentMethodSpecificInput = $value->fromObject($object->mobilePaymentMethodSpecificInput);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new Order();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'redirectPaymentMethodSpecificInput')) {
            if (!is_object($object->redirectPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->redirectPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new RedirectPaymentMethodSpecificInput();
            $this->redirectPaymentMethodSpecificInput = $value->fromObject($object->redirectPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new SepaDirectDebitPaymentMethodSpecificInput();
            $this->sepaDirectDebitPaymentMethodSpecificInput = $value->fromObject($object->sepaDirectDebitPaymentMethodSpecificInput);
        }
        return $this;
    }
}
