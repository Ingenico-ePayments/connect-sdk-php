<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @deprecated Use Order.shoppingCart instead
 */
class Level3SummaryData extends DataObject
{
    /**
     * @var int
     * @deprecated Use ShoppingCart.amountbreakdown with type DISCOUNT instead
     */
    public $discountAmount = null;

    /**
     * @var int
     * @deprecated Use ShoppingCart.amountbreakdown with type DUTY instead
     */
    public $dutyAmount = null;

    /**
     * @var int
     * @deprecated Use ShoppingCart.amountbreakdown with type SHIPPING instead
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
