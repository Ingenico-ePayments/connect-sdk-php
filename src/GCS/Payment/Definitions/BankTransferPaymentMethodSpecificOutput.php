<?php
namespace GCS\Payment\Definitions;

/**
 * Class BankTransferPaymentMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
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
