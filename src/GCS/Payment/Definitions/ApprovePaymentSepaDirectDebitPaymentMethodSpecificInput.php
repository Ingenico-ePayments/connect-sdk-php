<?php
namespace GCS\Payment\Definitions;

/**
 * Class ApprovePaymentSepaDirectDebitPaymentMethodSpecificInput
 *
 * @package GCS\Payment\Definitions
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
