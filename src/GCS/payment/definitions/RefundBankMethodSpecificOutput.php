<?php
namespace GCS\payment\definitions;

/**
 * Class RefundBankMethodSpecificOutput
 *
 * @package GCS\payment\definitions
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
