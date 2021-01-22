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
class DecryptedPaymentData extends DataObject
{
    /**
     * @var string
     * @deprecated Use decryptedPaymentData.paymentMethod instead
     */
    public $authMethod = null;

    /**
     * @var string
     */
    public $cardholderName = null;

    /**
     * @var string
     */
    public $cryptogram = null;

    /**
     * @var string
     */
    public $dpan = null;

    /**
     * @var int
     */
    public $eci = null;

    /**
     * @var string
     */
    public $expiryDate = null;

    /**
     * @var string
     */
    public $pan = null;

    /**
     * @var string
     */
    public $paymentMethod = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->authMethod)) {
            $object->authMethod = $this->authMethod;
        }
        if (!is_null($this->cardholderName)) {
            $object->cardholderName = $this->cardholderName;
        }
        if (!is_null($this->cryptogram)) {
            $object->cryptogram = $this->cryptogram;
        }
        if (!is_null($this->dpan)) {
            $object->dpan = $this->dpan;
        }
        if (!is_null($this->eci)) {
            $object->eci = $this->eci;
        }
        if (!is_null($this->expiryDate)) {
            $object->expiryDate = $this->expiryDate;
        }
        if (!is_null($this->pan)) {
            $object->pan = $this->pan;
        }
        if (!is_null($this->paymentMethod)) {
            $object->paymentMethod = $this->paymentMethod;
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
        if (property_exists($object, 'authMethod')) {
            $this->authMethod = $object->authMethod;
        }
        if (property_exists($object, 'cardholderName')) {
            $this->cardholderName = $object->cardholderName;
        }
        if (property_exists($object, 'cryptogram')) {
            $this->cryptogram = $object->cryptogram;
        }
        if (property_exists($object, 'dpan')) {
            $this->dpan = $object->dpan;
        }
        if (property_exists($object, 'eci')) {
            $this->eci = $object->eci;
        }
        if (property_exists($object, 'expiryDate')) {
            $this->expiryDate = $object->expiryDate;
        }
        if (property_exists($object, 'pan')) {
            $this->pan = $object->pan;
        }
        if (property_exists($object, 'paymentMethod')) {
            $this->paymentMethod = $object->paymentMethod;
        }
        return $this;
    }
}
