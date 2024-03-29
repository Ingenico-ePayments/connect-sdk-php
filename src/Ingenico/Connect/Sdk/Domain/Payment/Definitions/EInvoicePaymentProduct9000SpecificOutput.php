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
class EInvoicePaymentProduct9000SpecificOutput extends DataObject
{
    /**
     * @var string
     */
    public $installmentId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->installmentId)) {
            $object->installmentId = $this->installmentId;
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
        if (property_exists($object, 'installmentId')) {
            $this->installmentId = $object->installmentId;
        }
        return $this;
    }
}
