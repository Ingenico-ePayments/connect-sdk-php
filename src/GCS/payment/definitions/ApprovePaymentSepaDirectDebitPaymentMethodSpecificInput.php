<?php
namespace GCS\payment\definitions;

/**
 * Class ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput
 *
 * @package GCS\payment\definitions
 */
class ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput extends ApprovePaymentPaymentMethodSpecificInput
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
