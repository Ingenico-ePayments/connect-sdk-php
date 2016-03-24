<?php
namespace GCS\Payment\Definitions;

/**
 * Class InvoicePaymentMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
 */
class InvoicePaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
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
