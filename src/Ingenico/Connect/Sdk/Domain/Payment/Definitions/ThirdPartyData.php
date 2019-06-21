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
 */
class ThirdPartyData extends DataObject
{
    /**
     * @var PaymentProduct863ThirdPartyData
     */
    public $paymentProduct863 = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->paymentProduct863)) {
            $object->paymentProduct863 = $this->paymentProduct863->toObject();
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
        if (property_exists($object, 'paymentProduct863')) {
            if (!is_object($object->paymentProduct863)) {
                throw new UnexpectedValueException('value \'' . print_r($object->paymentProduct863, true) . '\' is not an object');
            }
            $value = new PaymentProduct863ThirdPartyData();
            $this->paymentProduct863 = $value->fromObject($object->paymentProduct863);
        }
        return $this;
    }
}
