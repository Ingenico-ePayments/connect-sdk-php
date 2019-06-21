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
class PaymentCreationReferences extends DataObject
{
    /**
     * @var string
     */
    public $additionalReference = null;

    /**
     * @var string
     */
    public $externalReference = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->additionalReference)) {
            $object->additionalReference = $this->additionalReference;
        }
        if (!is_null($this->externalReference)) {
            $object->externalReference = $this->externalReference;
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
        if (property_exists($object, 'additionalReference')) {
            $this->additionalReference = $object->additionalReference;
        }
        if (property_exists($object, 'externalReference')) {
            $this->externalReference = $object->externalReference;
        }
        return $this;
    }
}
