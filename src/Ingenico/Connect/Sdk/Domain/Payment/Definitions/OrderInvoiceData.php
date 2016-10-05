<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Payment\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class OrderInvoiceData
 *
 * @package Ingenico\Connect\Sdk\Domain\Payment\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_OrderInvoiceData OrderInvoiceData
 */
class OrderInvoiceData extends DataObject
{
    /**
     * @var string
     */
    public $additionalData = null;

    /**
     * @var string
     */
    public $invoiceDate = null;

    /**
     * @var string
     */
    public $invoiceNumber = null;

    /**
     * @var string[]
     */
    public $textQualifiers = null;

    /**
     * @param object $object
     * @return $this
     * @throws UnexpectedValueException
     */
    public function fromObject($object)
    {
        parent::fromObject($object);
        if (property_exists($object, 'additionalData')) {
            $this->additionalData = $object->additionalData;
        }
        if (property_exists($object, 'invoiceDate')) {
            $this->invoiceDate = $object->invoiceDate;
        }
        if (property_exists($object, 'invoiceNumber')) {
            $this->invoiceNumber = $object->invoiceNumber;
        }
        if (property_exists($object, 'textQualifiers')) {
            if (!is_array($object->textQualifiers) && !is_object($object->textQualifiers)) {
                throw new UnexpectedValueException('value \'' . print_r($object->textQualifiers, true) . '\' is not an array or object');
            }
            $this->textQualifiers = [];
            foreach ($object->textQualifiers as $textQualifiersElementObject) {
                $this->textQualifiers[] = $textQualifiersElementObject;
            }
        }
        return $this;
    }
}
