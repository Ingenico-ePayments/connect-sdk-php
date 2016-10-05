<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payout;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ApprovePayoutRequest
 *
 * @package Ingenico\Connect\Sdk\Domain\Payout
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ApprovePayoutRequest ApprovePayoutRequest
 */
class ApprovePayoutRequest extends DataObject
{
    /**
     * @var string
     */
    public $datePayout = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'datePayout')) {
            $this->datePayout = $object->datePayout;
        }
        return $this;
    }
}
