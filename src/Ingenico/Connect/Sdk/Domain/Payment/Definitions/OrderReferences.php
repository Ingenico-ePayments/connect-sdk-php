<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use Ingenico\Connect\Sdk\Domain\Payment\Definitions\OrderInvoiceData;
use UnexpectedValueException;

/**
 * Class OrderReferences
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_OrderReferences OrderReferences
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
        return $this;
    }
}
