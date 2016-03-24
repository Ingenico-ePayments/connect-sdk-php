<?php
namespace GCS\Payment\Definitions;

/**
 * Class ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput
 *
 * @package GCS\Payment\Definitions
 */
class ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput extends ApprovePaymentPaymentMethodSpecificInput
{
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
        return $this;
    }
}
