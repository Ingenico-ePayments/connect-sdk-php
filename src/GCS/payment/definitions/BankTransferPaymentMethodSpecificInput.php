<?php
namespace GCS\payment\definitions;

/**
 * Class BankTransferPaymentMethodSpecificInput
 *
 * @package GCS\payment\definitions
 */
class BankTransferPaymentMethodSpecificInput extends BankTransferPaymentMethodSpecificInputBase
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
