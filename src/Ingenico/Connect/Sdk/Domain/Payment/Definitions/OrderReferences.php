<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 */
class OrderReferences extends DataObject
{
    /**
     * @var string
     */
    public $descriptor = null;

    /**
     * @var OrderInvoiceData
     */
    public $invoiceData = null;

    /**
     * @var int
     */
    public $merchantOrderId = null;

    /**
     * @var string
     */
    public $merchantReference = null;

    /**
     * @var string
     */
    public $providerId = null;

    /**
     * @var string
     */
    public $providerMerchantId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->descriptor)) {
            $object->descriptor = $this->descriptor;
        }
        if (!is_null($this->invoiceData)) {
            $object->invoiceData = $this->invoiceData->toObject();
        }
        if (!is_null($this->merchantOrderId)) {
            $object->merchantOrderId = $this->merchantOrderId;
        }
        if (!is_null($this->merchantReference)) {
            $object->merchantReference = $this->merchantReference;
        }
        if (!is_null($this->providerId)) {
            $object->providerId = $this->providerId;
        }
        if (!is_null($this->providerMerchantId)) {
            $object->providerMerchantId = $this->providerMerchantId;
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
        if (property_exists($object, 'descriptor')) {
            $this->descriptor = $object->descriptor;
        }
        if (property_exists($object, 'invoiceData')) {
            if (!is_object($object->invoiceData)) {
                throw new UnexpectedValueException('value \'' . print_r($object->invoiceData, true) . '\' is not an object');
            }
            $value = new OrderInvoiceData();
            $this->invoiceData = $value->fromObject($object->invoiceData);
        }
        if (property_exists($object, 'merchantOrderId')) {
            $this->merchantOrderId = $object->merchantOrderId;
        }
        if (property_exists($object, 'merchantReference')) {
            $this->merchantReference = $object->merchantReference;
        }
        if (property_exists($object, 'providerId')) {
            $this->providerId = $object->providerId;
        }
        if (property_exists($object, 'providerMerchantId')) {
            $this->providerMerchantId = $object->providerMerchantId;
        }
        return $this;
    }
}
