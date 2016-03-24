<?php
namespace GCS\payment\definitions;

/**
 * Class ApprovePaymentNonSepaDirectDebitPaymentMethodSpecificInput
 *
 * @package GCS\payment\definitions
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
