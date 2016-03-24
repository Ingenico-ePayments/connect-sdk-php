<?php
namespace GCS\hostedcheckout;

use GCS\DataObject;
use GCS\fei\definitions\FraudFields;
use GCS\payment\definitions\BankTransferPaymentMethodSpecificInputBase;
use GCS\payment\definitions\CardPaymentMethodSpecificInputBase;
use GCS\payment\definitions\CashPaymentMethodSpecificInputBase;
use GCS\payment\definitions\CheckPaymentMethodSpecificInput;
use GCS\payment\definitions\Order;
use GCS\payment\definitions\RedirectPaymentMethodSpecificInputBase;

/**
 * Class CreateHostedCheckoutRequest
 *
 * @package GCS\hostedcheckout
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
     * @var CheckPaymentMethodSpecificInput
     */
    public $checkPaymentMethodSpecificInput = null;

    /**
     * @var FraudFields
     */
    public $fraudFields = null;

    /**
     * @var definitions\HostedCheckoutSpecificInput
     */
    public $hostedCheckoutSpecificInput = null;

    /**
     * @var Order
     */
    public $order = null;

    /**
     * @var RedirectPaymentMethodSpecificInputBase
     */
    public $redirectPaymentMethodSpecificInput = null;

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
            $value = new BankTransferPaymentMethodSpecificInputBase();
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
            $value = new CardPaymentMethodSpecificInputBase();
            $this->cardPaymentMethodSpecificInput = $value->fromObject($object->cardPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificInput')) {
            if (!is_object($object->cashPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->cashPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new CashPaymentMethodSpecificInputBase();
            $this->cashPaymentMethodSpecificInput = $value->fromObject($object->cashPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'checkPaymentMethodSpecificInput')) {
            if (!is_object($object->checkPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->checkPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new CheckPaymentMethodSpecificInput();
            $this->checkPaymentMethodSpecificInput = $value->fromObject($object->checkPaymentMethodSpecificInput);
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
        if (property_exists($object, 'hostedCheckoutSpecificInput')) {
            if (!is_object($object->hostedCheckoutSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->hostedCheckoutSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new definitions\HostedCheckoutSpecificInput();
            $this->hostedCheckoutSpecificInput = $value->fromObject($object->hostedCheckoutSpecificInput);
        }
        if (property_exists($object, 'order')) {
            if (!is_object($object->order)) {
                throw new \UnexpectedValueException('value \'' . print_r($object->order, true) . '\' is not an object');
            }
            $value = new Order();
            $this->order = $value->fromObject($object->order);
        }
        if (property_exists($object, 'redirectPaymentMethodSpecificInput')) {
            if (!is_object($object->redirectPaymentMethodSpecificInput)) {
                throw new \UnexpectedValueException(
                    'value \'' . print_r($object->redirectPaymentMethodSpecificInput, true) . '\' is not an object'
                );
            }
            $value = new RedirectPaymentMethodSpecificInputBase();
            $this->redirectPaymentMethodSpecificInput = $value->fromObject($object->redirectPaymentMethodSpecificInput);
        }
        return $this;
    }
}
