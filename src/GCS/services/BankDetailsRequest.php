<?php
/**
 * class BankDetailsRequest
 */
class GCS_services_BankDetailsRequest extends GCS_services_definitions_BankDetails
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
