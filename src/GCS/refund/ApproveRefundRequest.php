<?php
namespace GCS\refund;

use GCS\DataObject;

/**
 * Class ApproveRefundRequest
 *
 * @package GCS\refund
 */
class ApproveRefundRequest extends DataObject
{
    /**
     * @var int
     */
    public $amount = null;

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
        if (property_exists($object, 'amount')) {
            $this->amount = $object->amount;
        }
        return $this;
    }
}
