<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\Domain\Payment\Definitions\CreatePaymentResult;
use UnexpectedValueException;

/**
 * Class CreatePaymentResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_CreatePaymentResponse CreatePaymentResponse
 */
class CreatePaymentResponse extends CreatePaymentResult
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
