<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Payout\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payout\Definitions
 */
class PayoutReferences extends DataObject
{
    /**
     * @var string
     */
    public $invoiceNumber = null;

    /**
     * @var int
     */
    public $merchantOrderId = null;

    /**
     * @var string
     */
    public $merchantReference = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->invoiceNumber)) {
            $object->invoiceNumber = $this->invoiceNumber;
        }
        if (!is_null($this->merchantOrderId)) {
            $object->merchantOrderId = $this->merchantOrderId;
        }
        if (!is_null($this->merchantReference)) {
            $object->merchantReference = $this->merchantReference;
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
        if (property_exists($object, 'invoiceNumber')) {
            $this->invoiceNumber = $object->invoiceNumber;
        }
        if (property_exists($object, 'merchantOrderId')) {
            $this->merchantOrderId = $object->merchantOrderId;
        }
        if (property_exists($object, 'merchantReference')) {
            $this->merchantReference = $object->merchantReference;
        }
        return $this;
    }
}
