<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Product;

use Ingenico\Connect\Sdk\Domain\Product\Definitions\PaymentProductGroup;
use UnexpectedValueException;

/**
 * Class PaymentProductGroupResponse
 *
 * @package Ingenico\Connect\Sdk\Domain\Product
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_PaymentProductGroupResponse PaymentProductGroupResponse
 */
class PaymentProductGroupResponse extends PaymentProductGroup
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
