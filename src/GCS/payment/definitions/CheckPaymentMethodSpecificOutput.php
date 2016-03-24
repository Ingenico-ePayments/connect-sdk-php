<?php
namespace GCS\payment\definitions;

/**
 * Class CheckPaymentMethodSpecificOutput
 *
 * @package GCS\payment\definitions
 */
class CheckPaymentMethodSpecificOutput extends AbstractPaymentMethodSpecificOutput
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
