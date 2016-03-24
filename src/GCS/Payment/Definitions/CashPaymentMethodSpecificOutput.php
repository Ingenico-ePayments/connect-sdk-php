<?php
namespace GCS\Payment\Definitions;

/**
 * Class CashPaymentMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
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
