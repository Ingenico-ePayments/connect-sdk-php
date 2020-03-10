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
class RefundOutput extends OrderOutput
{
    /**
     * @var int
     */
    public $amountPaid = null;

    /**
     * @var RefundBankMethodSpecificOutput
     */
    public $bankRefundMethodSpecificOutput = null;

    /**
     * @var RefundCardMethodSpecificOutput
     */
    public $cardRefundMethodSpecificOutput = null;

    /**
     * @var RefundCashMethodSpecificOutput
     */
    public $cashRefundMethodSpecificOutput = null;

    /**
     * @var RefundEInvoiceMethodSpecificOutput
     */
    public $eInvoiceRefundMethodSpecificOutput = null;

    /**
     * @var RefundEWalletMethodSpecificOutput
     */
    public $eWalletRefundMethodSpecificOutput = null;

    /**
     * @var RefundMobileMethodSpecificOutput
     */
    public $mobileRefundMethodSpecificOutput = null;

    /**
     * @var string
     */
    public $paymentMethod = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->amountPaid)) {
            $object->amountPaid = $this->amountPaid;
        }
        if (!is_null($this->bankRefundMethodSpecificOutput)) {
            $object->bankRefundMethodSpecificOutput = $this->bankRefundMethodSpecificOutput->toObject();
        }
        if (!is_null($this->cardRefundMethodSpecificOutput)) {
            $object->cardRefundMethodSpecificOutput = $this->cardRefundMethodSpecificOutput->toObject();
        }
        if (!is_null($this->cashRefundMethodSpecificOutput)) {
            $object->cashRefundMethodSpecificOutput = $this->cashRefundMethodSpecificOutput->toObject();
        }
        if (!is_null($this->eInvoiceRefundMethodSpecificOutput)) {
            $object->eInvoiceRefundMethodSpecificOutput = $this->eInvoiceRefundMethodSpecificOutput->toObject();
        }
        if (!is_null($this->eWalletRefundMethodSpecificOutput)) {
            $object->eWalletRefundMethodSpecificOutput = $this->eWalletRefundMethodSpecificOutput->toObject();
        }
        if (!is_null($this->mobileRefundMethodSpecificOutput)) {
            $object->mobileRefundMethodSpecificOutput = $this->mobileRefundMethodSpecificOutput->toObject();
        }
        if (!is_null($this->paymentMethod)) {
            $object->paymentMethod = $this->paymentMethod;
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
        if (property_exists($object, 'bankRefundMethodSpecificOutput')) {
            if (!is_object($object->bankRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->bankRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new RefundBankMethodSpecificOutput();
            $this->bankRefundMethodSpecificOutput = $value->fromObject($object->bankRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'cardRefundMethodSpecificOutput')) {
            if (!is_object($object->cardRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cardRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new RefundCardMethodSpecificOutput();
            $this->cardRefundMethodSpecificOutput = $value->fromObject($object->cardRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'cashRefundMethodSpecificOutput')) {
            if (!is_object($object->cashRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->cashRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new RefundCashMethodSpecificOutput();
            $this->cashRefundMethodSpecificOutput = $value->fromObject($object->cashRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'eInvoiceRefundMethodSpecificOutput')) {
            if (!is_object($object->eInvoiceRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->eInvoiceRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new RefundEInvoiceMethodSpecificOutput();
            $this->eInvoiceRefundMethodSpecificOutput = $value->fromObject($object->eInvoiceRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'eWalletRefundMethodSpecificOutput')) {
            if (!is_object($object->eWalletRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->eWalletRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new RefundEWalletMethodSpecificOutput();
            $this->eWalletRefundMethodSpecificOutput = $value->fromObject($object->eWalletRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'mobileRefundMethodSpecificOutput')) {
            if (!is_object($object->mobileRefundMethodSpecificOutput)) {
                throw new UnexpectedValueException('value \'' . print_r($object->mobileRefundMethodSpecificOutput, true) . '\' is not an object');
            }
            $value = new RefundMobileMethodSpecificOutput();
            $this->mobileRefundMethodSpecificOutput = $value->fromObject($object->mobileRefundMethodSpecificOutput);
        }
        if (property_exists($object, 'paymentMethod')) {
            $this->paymentMethod = $object->paymentMethod;
        }
        return $this;
    }
}
