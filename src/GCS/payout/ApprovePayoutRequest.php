<?php
namespace GCS\payout;

use GCS\DataObject;

/**
 * Class ApprovePayoutRequest
 *
 * @package GCS\payout
 */
class ApprovePayoutRequest extends DataObject
{
    /**
     * @var string
     */
    public $datePayout = null;

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
        if (property_exists($object, 'datePayout')) {
            $this->datePayout = $object->datePayout;
        }
        return $this;
    }
}
