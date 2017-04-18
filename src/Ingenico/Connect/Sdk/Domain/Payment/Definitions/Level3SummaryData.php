<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class Level3SummaryData
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_Level3SummaryData Level3SummaryData
 * @deprecated Use ShoppingCart instead
 */
class Level3SummaryData extends DataObject
{
    /**
     * @var int
     * @deprecated Use ShoppingCart.discountAmount instead
     */
    public $discountAmount = null;

    /**
     * @var int
     * @deprecated Use ShoppingCart.dutyAmount instead
     */
    public $dutyAmount = null;

    /**
     * @var int
     * @deprecated Use ShoppingCart.shippingAmount instead
     */
    public $shippingAmount = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
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
