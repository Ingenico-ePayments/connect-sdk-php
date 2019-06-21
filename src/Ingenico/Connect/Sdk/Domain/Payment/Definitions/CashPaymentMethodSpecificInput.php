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
class CashPaymentMethodSpecificInput extends AbstractCashPaymentMethodSpecificInput
{
    /**
     * @var CashPaymentProduct1503SpecificInput
     * @deprecated No replacement
     */
    public $paymentProduct1503SpecificInput = null;

    /**
     * @var CashPaymentProduct1504SpecificInput
     */
    public $paymentProduct1504SpecificInput = null;

    /**
     * @var CashPaymentProduct1521SpecificInput
     */
    public $paymentProduct1521SpecificInput = null;

    /**
     * @var CashPaymentProduct1522SpecificInput
     */
    public $paymentProduct1522SpecificInput = null;

    /**
     * @var CashPaymentProduct1523SpecificInput
     */
    public $paymentProduct1523SpecificInput = null;

    /**
     * @var CashPaymentProduct1524SpecificInput
     */
    public $paymentProduct1524SpecificInput = null;

    /**
     * @var CashPaymentProduct1526SpecificInput
     */
    public $paymentProduct1526SpecificInput = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProduct1503SpecificInput)) {
            $object->paymentProduct1503SpecificInput = $this->paymentProduct1503SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct1504SpecificInput)) {
            $object->paymentProduct1504SpecificInput = $this->paymentProduct1504SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct1521SpecificInput)) {
            $object->paymentProduct1521SpecificInput = $this->paymentProduct1521SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct1522SpecificInput)) {
            $object->paymentProduct1522SpecificInput = $this->paymentProduct1522SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct1523SpecificInput)) {
            $object->paymentProduct1523SpecificInput = $this->paymentProduct1523SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct1524SpecificInput)) {
            $object->paymentProduct1524SpecificInput = $this->paymentProduct1524SpecificInput->toObject();
        }
        if (!is_null($this->paymentProduct1526SpecificInput)) {
            $object->paymentProduct1526SpecificInput = $this->paymentProduct1526SpecificInput->toObject();
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
        if (property_exists($object, 'paymentProduct1503SpecificInput')) {
            if (!is_object($object->paymentProduct1503SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct1503SpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentProduct1503SpecificInput();
            $this->paymentProduct1503SpecificInput = $value->fromObject($object->paymentProduct1503SpecificInput);
        }
        if (property_exists($object, 'paymentProduct1504SpecificInput')) {
            if (!is_object($object->paymentProduct1504SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct1504SpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentProduct1504SpecificInput();
            $this->paymentProduct1504SpecificInput = $value->fromObject($object->paymentProduct1504SpecificInput);
        }
        if (property_exists($object, 'paymentProduct1521SpecificInput')) {
            if (!is_object($object->paymentProduct1521SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct1521SpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentProduct1521SpecificInput();
            $this->paymentProduct1521SpecificInput = $value->fromObject($object->paymentProduct1521SpecificInput);
        }
        if (property_exists($object, 'paymentProduct1522SpecificInput')) {
            if (!is_object($object->paymentProduct1522SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct1522SpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentProduct1522SpecificInput();
            $this->paymentProduct1522SpecificInput = $value->fromObject($object->paymentProduct1522SpecificInput);
        }
        if (property_exists($object, 'paymentProduct1523SpecificInput')) {
            if (!is_object($object->paymentProduct1523SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct1523SpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentProduct1523SpecificInput();
            $this->paymentProduct1523SpecificInput = $value->fromObject($object->paymentProduct1523SpecificInput);
        }
        if (property_exists($object, 'paymentProduct1524SpecificInput')) {
            if (!is_object($object->paymentProduct1524SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct1524SpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentProduct1524SpecificInput();
            $this->paymentProduct1524SpecificInput = $value->fromObject($object->paymentProduct1524SpecificInput);
        }
        if (property_exists($object, 'paymentProduct1526SpecificInput')) {
            if (!is_object($object->paymentProduct1526SpecificInput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct1526SpecificInput, true) . '\' is not an object');
            }
            $value = new CashPaymentProduct1526SpecificInput();
            $this->paymentProduct1526SpecificInput = $value->fromObject($object->paymentProduct1526SpecificInput);
        }
        return $this;
    }
}
