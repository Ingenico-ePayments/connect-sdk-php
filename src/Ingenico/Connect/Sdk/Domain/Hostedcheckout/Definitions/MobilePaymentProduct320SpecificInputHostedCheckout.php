<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions
 */
class MobilePaymentProduct320SpecificInputHostedCheckout extends DataObject
{
    /**
     * @var string
     */
    public $merchantName = null;

    /**
     * @var string
     */
    public $merchantOrigin = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->merchantName)) {
            $object->merchantName = $this->merchantName;
        }
        if (!is_null($this->merchantOrigin)) {
            $object->merchantOrigin = $this->merchantOrigin;
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
        if (property_exists($object, 'merchantName')) {
            $this->merchantName = $object->merchantName;
        }
        if (property_exists($object, 'merchantOrigin')) {
            $this->merchantOrigin = $object->merchantOrigin;
        }
        return $this;
    }
}
