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
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->additionalData)) {
            $object->additionalData = $this->additionalData;
        }
        if (!is_null($this->invoiceDate)) {
            $object->invoiceDate = $this->invoiceDate;
        }
        if (!is_null($this->invoiceNumber)) {
            $object->invoiceNumber = $this->invoiceNumber;
        }
        if (!is_null($this->textQualifiers)) {
            $object->textQualifiers = [];
            foreach ($this->textQualifiers as $element) {
                if (!is_null($element)) {
                    $object->textQualifiers[] = $element;
                }
            }
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
            foreach ($object->textQualifiers as $element) {
                $this->textQualifiers[] = $element;
            }
        }
        return $this;
    }
}
