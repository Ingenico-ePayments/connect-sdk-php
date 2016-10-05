<?php
/*
 * This class was auto-generated from the API references found at
 * https://developer.globalcollect.com/documentation/api/server/
 */
namespace Ingenico\Connect\Sdk\Domain\Definitions;

use Ingenico\Connect\Sdk\DataObject;
use UnexpectedValueException;

/**
 * Class ValidationBankAccountCheck
 *
 * @package Ingenico\Connect\Sdk\Domain\Definitions
 * @link https://developer.globalcollect.com/documentation/api/server/#schema_ValidationBankAccountCheck ValidationBankAccountCheck
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
