<?php
namespace GCS\payment\definitions;

/**
 * Class InvoicePaymentMethodSpecificOutput
 *
 * @package GCS\payment\definitions
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
