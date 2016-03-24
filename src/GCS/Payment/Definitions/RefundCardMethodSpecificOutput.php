<?php
namespace GCS\Payment\Definitions;

/**
 * Class RefundCardMethodSpecificOutput
 *
 * @package GCS\Payment\Definitions
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
