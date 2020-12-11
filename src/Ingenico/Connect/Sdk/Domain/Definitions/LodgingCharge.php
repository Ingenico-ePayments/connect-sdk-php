<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class LodgingCharge extends DataObject
{
    /**
     * @var int
     */
    public $chargeAmount = null;

    /**
     * @var string
     */
    public $chargeAmountCurrencyCode = null;

    /**
     * @var string
     */
    public $chargeType = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->chargeAmount)) {
            $object->chargeAmount = $this->chargeAmount;
        }
        if (!is_null($this->chargeAmountCurrencyCode)) {
            $object->chargeAmountCurrencyCode = $this->chargeAmountCurrencyCode;
        }
        if (!is_null($this->chargeType)) {
            $object->chargeType = $this->chargeType;
        }
        return $object;
    }

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'chargeAmount')) {
            $this->chargeAmount = $object->chargeAmount;
        }
        if (property_exists($object, 'chargeAmountCurrencyCode')) {
            $this->chargeAmountCurrencyCode = $object->chargeAmountCurrencyCode;
        }
        if (property_exists($object, 'chargeType')) {
            $this->chargeType = $object->chargeType;
        }
        return $this;
    }
}
