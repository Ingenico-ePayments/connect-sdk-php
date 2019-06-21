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
class OrderTypeInformation extends DataObject
{
    /**
     * @var string
     */
    public $purchaseType = null;

    /**
     * @var string
     */
    public $transactionType = null;

    /**
     * @var string
     */
    public $usageType = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->purchaseType)) {
            $object->purchaseType = $this->purchaseType;
        }
        if (!is_null($this->transactionType)) {
            $object->transactionType = $this->transactionType;
        }
        if (!is_null($this->usageType)) {
            $object->usageType = $this->usageType;
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
        if (property_exists($object, 'purchaseType')) {
            $this->purchaseType = $object->purchaseType;
        }
        if (property_exists($object, 'transactionType')) {
            $this->transactionType = $object->transactionType;
        }
        if (property_exists($object, 'usageType')) {
            $this->usageType = $object->usageType;
        }
        return $this;
    }
}
