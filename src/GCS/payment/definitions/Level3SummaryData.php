<?php
namespace GCS\payment\definitions;

use GCS\DataObject;

/**
 * Class Level3SummaryData
 *
 * @package GCS\payment\definitions
 */
class Level3SummaryData extends DataObject
{
    /**
     * @var int
     */
    public $discountAmount = null;

    /**
     * @var int
     */
    public $dutyAmount = null;

    /**
     * @var int
     */
    public $shippingAmount = null;

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
        if (property_exists($object, 'discountAmount')) {
            $this->discountAmount = $object->discountAmount;
        }
        if (property_exists($object, 'dutyAmount')) {
            $this->dutyAmount = $object->dutyAmount;
        }
        if (property_exists($object, 'shippingAmount')) {
            $this->shippingAmount = $object->shippingAmount;
        }
        return $this;
    }
}
