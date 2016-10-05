<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Refund;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ApproveRefundRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Refund
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ApproveRefundRequest ApproveRefundRequest
 */
class ApproveRefundRequest extends DataObject
{
    /**
     * @var int
     */
    public $amount = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        return $this;
    }
}
