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
class RedirectPaymentProduct4101SpecificInput extends DataObject
{
    /**
     * @var string
     */
    public $integrationType = null;

    /**
     * @var string
     */
    public $merchantName = null;

    /**
     * @var string
     */
    public $transactionNote = null;

    /**
     * @var string
     */
    public $vpa = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->integrationType)) {
            $object->integrationType = $this->integrationType;
        }
        if (!is_null($this->merchantName)) {
            $object->merchantName = $this->merchantName;
        }
        if (!is_null($this->transactionNote)) {
            $object->transactionNote = $this->transactionNote;
        }
        if (!is_null($this->vpa)) {
            $object->vpa = $this->vpa;
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
        if (property_exists($object, 'integrationType')) {
            $this->integrationType = $object->integrationType;
        }
        if (property_exists($object, 'merchantName')) {
            $this->merchantName = $object->merchantName;
        }
        if (property_exists($object, 'transactionNote')) {
            $this->transactionNote = $object->transactionNote;
        }
        if (property_exists($object, 'vpa')) {
            $this->vpa = $object->vpa;
        }
        return $this;
    }
}
