<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Token\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Token\Definitions
 */
class MandateApproval extends DataObject
{
    /**
     * @var string
     */
    public $mandateSignatureDate = null;

    /**
     * @var string
     */
    public $mandateSignaturePlace = null;

    /**
     * @var bool
     */
    public $mandateSigned = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->mandateSignatureDate)) {
            $object->mandateSignatureDate = $this->mandateSignatureDate;
        }
        if (!is_null($this->mandateSignaturePlace)) {
            $object->mandateSignaturePlace = $this->mandateSignaturePlace;
        }
        if (!is_null($this->mandateSigned)) {
            $object->mandateSigned = $this->mandateSigned;
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
        if (property_exists($object, 'mandateSignatureDate')) {
            $this->mandateSignatureDate = $object->mandateSignatureDate;
        }
        if (property_exists($object, 'mandateSignaturePlace')) {
            $this->mandateSignaturePlace = $object->mandateSignaturePlace;
        }
        if (property_exists($object, 'mandateSigned')) {
            $this->mandateSigned = $object->mandateSigned;
        }
        return $this;
    }
}
