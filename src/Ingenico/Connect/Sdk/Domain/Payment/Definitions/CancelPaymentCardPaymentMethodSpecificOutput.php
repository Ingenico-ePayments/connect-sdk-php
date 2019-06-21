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
class CancelPaymentCardPaymentMethodSpecificOutput extends DataObject
{
    /**
     * @var string
     */
    public $voidResponseId = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->voidResponseId)) {
            $object->voidResponseId = $this->voidResponseId;
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
        if (property_exists($object, 'voidResponseId')) {
            $this->voidResponseId = $object->voidResponseId;
        }
        return $this;
    }
}
