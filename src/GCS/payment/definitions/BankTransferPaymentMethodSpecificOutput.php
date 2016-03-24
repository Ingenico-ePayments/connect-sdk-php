<?php
namespace GCS\payment\definitions;

/**
 * Class BankTransferPaymentMethodSpecificOutput
 *
 * @package GCS\payment\definitions
 */
class BankTransferPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
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
