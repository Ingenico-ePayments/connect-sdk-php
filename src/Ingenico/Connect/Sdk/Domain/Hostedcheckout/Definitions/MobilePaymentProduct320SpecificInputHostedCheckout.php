<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Hostedcheckout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\GPayThreeDSecure;
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
     * @var GPayThreeDSecure
     */
    public $threeDSecure = null;

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
        if (!is_null($this->threeDSecure)) {
            $object->threeDSecure = $this->threeDSecure->toObject();
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
        if (property_exists($object, 'threeDSecure')) {
            if (!is_object($object->threeDSecure)) {
                throw new UnexpectedValueException('value \'' . print_r($object->threeDSecure, true) . '\' is not an object');
            }
            $value = new GPayThreeDSecure();
            $this->threeDSecure = $value->fromObject($object->threeDSecure);
        }
        return $this;
    }
}
