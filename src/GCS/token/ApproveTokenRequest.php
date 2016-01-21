<?php
/**
 * class ApproveTokenRequest
 */
class GCS_token_ApproveTokenRequest extends GCS_token_definitions_MandateApproval
{
    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        return $this;
    }
}
