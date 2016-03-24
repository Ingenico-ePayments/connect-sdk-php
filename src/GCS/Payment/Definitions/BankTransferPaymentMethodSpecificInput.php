<?php
namespace GCS\Payment\Definitions;

/**
 * Class BankTransferPaymentMethodSpecificInput
 *
 * @package GCS\Payment\Definitions
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
