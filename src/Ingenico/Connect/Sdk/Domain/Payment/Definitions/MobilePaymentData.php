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
class MobilePaymentData extends DataObject
{
    /**
     * @var string
     */
    public $dpan = null;

    /**
     * @var string
     */
    public $expiryDate = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->dpan)) {
            $object->dpan = $this->dpan;
        }
        if (!is_null($this->expiryDate)) {
            $object->expiryDate = $this->expiryDate;
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
        if (property_exists($object, 'dpan')) {
            $this->dpan = $object->dpan;
        }
        if (property_exists($object, 'expiryDate')) {
            $this->expiryDate = $object->expiryDate;
        }
        return $this;
    }
}
