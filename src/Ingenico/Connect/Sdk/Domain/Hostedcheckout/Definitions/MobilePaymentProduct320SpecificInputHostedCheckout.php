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
