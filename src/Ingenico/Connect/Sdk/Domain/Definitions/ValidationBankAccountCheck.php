<?php
/*
 * This class was auto-generated from the API references found at
 * https://epayments-api.developer-ingenico.com/s2sapi/v1/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 */
class ValidationBankAccountCheck extends DataObject
{
    /**
     * @var string
     */
    public $code = null;

    /**
     * @var string
     */
    public $description = null;

    /**
     * @var string
     */
    public $result = null;

    /**
     * @return object
     */
    public function toObject()
    {
        $object = parent::toObject();
        if (!is_null($this->code)) {
            $object->code = $this->code;
        }
        if (!is_null($this->description)) {
            $object->description = $this->description;
        }
        if (!is_null($this->result)) {
            $object->result = $this->result;
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
        if (property_exists($object, 'code')) {
            $this->code = $object->code;
        }
        if (property_exists($object, 'description')) {
            $this->description = $object->description;
        }
        if (property_exists($object, 'result')) {
            $this->result = $object->result;
        }
        return $this;
    }
}
