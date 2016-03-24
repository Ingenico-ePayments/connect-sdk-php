<?php
namespace GCS\payment\definitions;

/**
 * Class CashPaymentMethodSpecificOutput
 *
 * @package GCS\payment\definitions
 */
class CashPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
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
