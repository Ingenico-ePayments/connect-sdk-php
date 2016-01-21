<?php
/**
 * class CreateHostedCheckoutRequest
 */
class GCS_hostedcheckout_CreateHostedCheckoutRequest extends GCS_DataObject
{
    /**
     * @var GCS_payment_definitions_BankTransferPaymentMethodSpecificInputBase
     */
    public $bankTransferPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_CardPaymentMethodSpecificInputBase
     */
    public $cardPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_CashPaymentMethodSpecificInputBase
     */
    public $cashPaymentMethodSpecificInput = null;

    /**
     * @var GCS_payment_definitions_CheckPaymentMethodSpecificInput
     */
    public $checkPaymentMethodSpecificInput = null;

    /**
     * @var GCS_fei_definitions_FraudFields
     */
    public $fraudFields = null;

    /**
     * @var GCS_hostedcheckout_definitions_HostedCheckoutSpecificInput
     */
    public $hostedCheckoutSpecificInput = null;

    /**
     * @var GCS_payment_definitions_Order
     */
    public $order = null;

    /**
     * @var GCS_payment_definitions_RedirectPaymentMethodSpecificInputBase
     */
    public $redirectPaymentMethodSpecificInput = null;

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
            $value = new GCS_payment_definitions_BankTransferPaymentMethodSpecificInputBase();
            $this->bankTransferPaymentMethodSpecificInput = $value->fromObject($object->bankTransferPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cardPaymentMethodSpecificInput')) {
            if (!is_object($object->cardPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CardPaymentMethodSpecificInputBase();
            $this->cardPaymentMethodSpecificInput = $value->fromObject($object->cardPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'cashPaymentMethodSpecificInput')) {
            if (!is_object($object->cashPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cashPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CashPaymentMethodSpecificInputBase();
            $this->cashPaymentMethodSpecificInput = $value->fromObject($object->cashPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'checkPaymentMethodSpecificInput')) {
            if (!is_object($object->checkPaymentMethodSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->checkPaymentMethodSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_payment_definitions_CheckPaymentMethodSpecificInput();
            $this->checkPaymentMethodSpecificInput = $value->fromObject($object->checkPaymentMethodSpecificInput);
        }
        if (property_exists($object, 'fraudFields')) {
            if (!is_object($object->fraudFields)) {
                throw new UnexpectedValueException('value \'' . print_r($object->fraudFields, true) . '\' is not an object');
            }
            $value = new GCS_fei_definitions_FraudFields();
            $this->fraudFields = $value->fromObject($object->fraudFields);
        }
        if (property_exists($object, 'hostedCheckoutSpecificInput')) {
            if (!is_object($object->hostedCheckoutSpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->hostedCheckoutSpecificInput, true) . '\' is not an object');
            }
            $value = new GCS_hostedcheckout_definitions_HostedCheckoutSpecificInput();
            $this->hostedCheckoutSpecificInput = $value->fromObject($object->hostedCheckoutSpecificInput);
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
            $value = new GCS_payment_definitions_RedirectPaymentMethodSpecificInputBase();
            $this->redirectPaymentMethodSpecificInput = $value->fromObject($object->redirectPaymentMethodSpecificInput);
        }
        return $this;
    }
}
