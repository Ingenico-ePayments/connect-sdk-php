<?php
namespace GCS\services;

/**
 * Class BankDetailsRequest
 *
 * @package GCS\services
 */
class BankDetailsRequest extends definitions\BankDetails
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
