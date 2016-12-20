<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RefundBankMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RefundCardMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RefundEWalletMethodSpecificOutput;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\RefundMobileMethodSpecificOutput;
use UnexpectedValueException;

/**
 * Class RefundOutput
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_RefundOutput RefundOutput
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
