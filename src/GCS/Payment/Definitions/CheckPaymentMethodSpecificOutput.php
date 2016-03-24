<?php
namespace GCS\Payment\Definitions;

/**
 * Class CheckPaymentMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
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
