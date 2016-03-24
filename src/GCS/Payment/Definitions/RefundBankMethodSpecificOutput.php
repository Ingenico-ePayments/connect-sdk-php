<?php
namespace GCS\Payment\Definitions;

/**
 * Class RefundBankMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
 */
class RefundBankMethodSpecificOutput extends RefundMethodSpecificOutput
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
