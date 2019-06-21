<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Definitions\FraudFields;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions\HostedCheckoutSpecificInput;
use Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions\MobilePaymentMethodSpecificInputHostedCheckout;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\BankTransferPaymentMethodSpecificInputBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CardPaymentMethodSpecificInputBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CashPaymentMethodSpecificInputBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\EInvoicePaymentMethodSpecificInputBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Merchant;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\Order;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RedirectPaymentMethodSpecificInputBase;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\SepaDirectDebitPaymentMethodSpecificInputBase;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout
 */
class CreateHostedCheckoutRequest extends DataObject
{
    /**
     * @var BankTransferPaymentMethodSpecificInputBase
     */
    public $bankTransferPaymentMethodSpecificInput = null;

    /**
     * @var CardPaymentMethodSpecificInputBase
     */
    public $cardPaymentMethodSpecificInput = null;

    /**
     * @var CashPaymentMethodSpecificInputBase
     */
    public $cashPaymentMethodSpecificInput = null;

    /**
     * @var EInvoicePaymentMethodSpecificInputBase
     */
    public $eInvoicePaymentMethodSpecificInput = null;

    /**
     * @var FraudFields
     */
    public $fraudFields = null;

    /**
     * @var HostedCheckoutSpecificInput
     */
    public $hostedCheckoutSpecificInput = null;

    /**
     * @var Merchant
     */
    public $merchant = null;

    /**
     * @var MobilePaymentMethodSpecificInputHostedCheckout
     */
    public $mobilePaymentMethodSpecificInput = null;

    /**
     * @var Order
     */
    public $order = null;

    /**
     * @var RedirectPaymentMethodSpecificInputBase
     */
    public $redirectPaymentMethodSpecificInput = null;

    /**
     * @var SepaDirectDebitPaymentMethodSpecificInputBase
     */
    public $sepaDirectDebitPaymentMethodSpecificInput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->bankTransferPaymentMethodSpecificInput)) {
            $object->bankTransferPaymentMethodSpecificInput = $this->bankTransferPaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->cardPaymentMethodSpecificInput)) {
            $object->cardPaymentMethodSpecificInput = $this->cardPaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->cashPaymentMethodSpecificInput)) {
            $object->cashPaymentMethodSpecificInput = $this->cashPaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->eInvoicePaymentMethodSpecificInput)) {
            $object->eInvoicePaymentMethodSpecificInput = $this->eInvoicePaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->fraudFields)) {
            $object->fraudFields = $this->fraudFields->toObject();
        }
        if (!is_null($this->hostedCheckoutSpecificInput)) {
            $object->hostedCheckoutSpecificInput = $this->hostedCheckoutSpecificInput->toObject();
        }
        if (!is_null($this->merchant)) {
            $object->merchant = $this->merchant->toObject();
        }
        if (!is_null($this->mobilePaymentMethodSpecificInput)) {
            $object->mobilePaymentMethodSpecificInput = $this->mobilePaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->order)) {
            $object->order = $this->order->toObject();
        }
        if (!is_null($this->redirectPaymentMethodSpecificInput)) {
            $object->redirectPaymentMethodSpecificInput = $this->redirectPaymentMethodSpecificInput->toObject();
        }
        if (!is_null($this->sepaDirectDebitPaymentMethodSpecificInput)) {
            $object->sepaDirectDebitPaymentMethodSpecificInput = $this->sepaDirectDebitPaymentMethodSpecificInput->toObject();
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
        if (property_exists($object, 'bankTransferPaymentMethodSpecificInput')) {
            if (!is_object($object->bankTransferPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankTransferPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new BankTransferPaymentMethodSpecificInputBase();
            $this->bankTransferPaymentMethodSpecificInput = $value->fromObject($object->bankTransferPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cardPaymentMethodSpecificInput')) {
            if (!is_object($object->cardPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new CardPaymentMethodSpecificInputBase();
            $this->cardPaymentMethodSpecificInput = $value->fromObject($object->cardPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificInput')) {
            if (!is_object($object->cashPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cashPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentMethodSpecificInputBase();
            $this->cashPaymentMethodSpecificInput = $value->fromObject($object->cashPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'eInvoicePaymentMethodSpecificInput')) {
            if (!is_object($object->eInvoicePaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->eInvoicePaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new EInvoicePaymentMethodSpecificInputBase();
            $this->eInvoicePaymentMethodSpecificInput = $value->fromObject($object->eInvoicePaymentMethodSpecificInput);
        }
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudFields, true) . '\' is not an object');
            }
            $value = new FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'hostedCheckoutSpecificInput')) {
            if (!is_object($object->hostedCheckoutSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->hostedCheckoutSpecificInput, true) . '\' is not an object');
            }
            $value = new HostedCheckoutSpecificInput();
            $this->hostedCheckoutSpecificInput = $value->fromObject($object->hostedCheckoutSpecificInput);
        }
        if (property_exists($object, 'merchant')) {
            if (!is_object($object->merchant)) {
                throw new UnexpectedValueException('value \'' . print_r($object->merchant, true) . '\' is not an object');
            }
            $value = new Merchant();
            $this->merchant = $value->fromObject($object->merchant);
        }
        if (property_exists($object, 'mobilePaymentMethodSpecificInput')) {
            if (!is_object($object->mobilePaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mobilePaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new MobilePaymentMethodSpecificInputHostedCheckout();
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
            $value = new RedirectPaymentMethodSpecificInputBase();
            $this->redirectPaymentMethodSpecificInput = $value->fromObject($object->redirectPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'sepaDirectDebitPaymentMethodSpecificInput')) {
            if (!is_object($object->sepaDirectDebitPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->sepaDirectDebitPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new SepaDirectDebitPaymentMethodSpecificInputBase();
            $this->sepaDirectDebitPaymentMethodSpecificInput = $value->fromObject($object->sepaDirectDebitPaymentMethodSpecificInput);
        }
        return $this;
    }
}
