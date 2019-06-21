<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Product\Definitions;

use Ingenico\Connect\Sdk\Domain\Definitions\KeyValuePair;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Product\Definitions
 */
class AccountOnFileAttribute extends KeyValuePair
{
    /**
     * @var string
     */
    public $mustWriteReason = null;

    /**
     * @var string
     */
    public $status = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->mustWriteReason)) {
            $object->mustWriteReason = $this->mustWriteReason;
        }
        if (!is_null($this->status)) {
            $object->status = $this->status;
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
        if (property_exists($object, 'mustWriteReason')) {
            $this->mustWriteReason = $object->mustWriteReason;
        }
        if (property_exists($object, 'status')) {
            $this->status = $object->status;
        }
        return $this;
    }
}
