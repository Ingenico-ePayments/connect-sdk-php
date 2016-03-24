<?php
namespace GCS\token;

/**
 * Class ApproveTokenRequest
 *
 * @package GCS\token
 */
class ApproveTokenRequest extends definitions\MandateApproval
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
