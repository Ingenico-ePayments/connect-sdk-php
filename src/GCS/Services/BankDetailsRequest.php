<?php
namespace GCS\Services;

/**
 * Class BankDetailsRequest
 *
 * @package GCS\Services
 */
class BankDetailsRequest extends Definitions\BankDetails
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
