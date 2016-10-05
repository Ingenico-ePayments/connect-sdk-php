<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Services;

use Ingenico\Connect\Sdk\Domain\Services\Definitions\BankDetails;
use UnexpectedValueException;

/**
 * Class BankDetailsRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Services
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_BankDetailsRequest BankDetailsRequest
 */
class BankDetailsRequest extends BankDetails
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
