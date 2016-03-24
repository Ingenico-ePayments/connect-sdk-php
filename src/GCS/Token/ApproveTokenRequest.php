<?php
namespace GCS\Token;

/**
 * Class ApproveTokenRequest
 *
 * @package GCS\Token
 */
class ApproveTokenRequest extends Definitions\MandateApproval
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
