<?php
namespace GCS\payment\definitions;

/**
 * Class RefundCardMethodSpecificOutput
 *
 * @package GCS\payment\definitions
 */
class RefundCardMethodSpecificOutput extends RefundMethodSpecificOutput
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
