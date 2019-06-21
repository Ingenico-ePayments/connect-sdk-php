<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment
 */
class ThirdPartyStatusResponse extends DataObject
{
    /**
     * @var string
     */
    public $thirdPartyStatus = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->thirdPartyStatus)) {
            $object->thirdPartyStatus = $this->thirdPartyStatus;
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
        if (property_exists($object, 'thirdPartyStatus')) {
            $this->thirdPartyStatus = $object->thirdPartyStatus;
        }
        return $this;
    }
}
